<?php

/**
 * MePatientDevices
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2020-01-13)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 *  ISPC-2432
 */
class MePatientDevices extends BaseMePatientDevices
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'mepatientdevices_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_mepatientdevices';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'MePatientDevices';
    const PATIENT_FILE_TITLE    = 'MePatientDevices PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'MePatientDevices PDF was created';
    const PATIENT_COURSE_TABNAME    = 'mepatientdevices';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    public static function sendPush2device($data = array()){
        
        $mePatient = new Pms_mePatient();
        if(empty($data) || empty($data['registration_id']) || empty($data['notification_text'])){
            return;
        }
        
 
        $mePatient->push_notification($data['registration_id'],$data['notification_text']);
        
        $response = array();
        // SEND TO DEVICE
        
        $response['message_ack'] = "message_received";
        $response['send_ok'] = "yes";
        
        
        return $response;
        
        
    }
    
    /**
     * @return string
     * @deprecated
     */
    public function generateDevicePassword(){
        
       
        $pass = bin2hex(openssl_random_pseudo_bytes(6));
        
        
        $devices_pass = Doctrine_Query::create()
        ->select('*')
        ->from('MePatientDevices')
        ->where("device_password =?", $pass)
        ->fetchArray();
        
        
        
        if(!empty($devices_pass))
        {
            return $this->generateDevicePassword();
        }
        else
        {
            return $pass;
        }
    }
    
   
    
    
    /**
     * 
     */
    public static function cronjob_mePatient_sendDevices_to_servers()
    {
        
        if ( ! Zend_Registry::isRegistered('mepatient')
            || ! ($mePatient_cfg = Zend_Registry::get("mepatient")) )
        {
            return;
        }
        
        // get all active devices, with change date / create date in the last 24 h
        $devices2send = array();
        
        // get devices that need to be sent 
        $devices2send  = MePatientDevicesTable::find_active_devices2send();

        
        // if no devices to send, return
        if(empty($devices2send)){
            return;
        }
        
        
            
        try {
            $externalManagerMePatient = Doctrine_Manager::getInstance();
            $externalConnection = $externalManagerMePatient->openConnection($mePatient_cfg['proxy']['doctrine']['dsn']);
            
            //Select existing
            $external_devices= Doctrine_Query::create($externalConnection)
            ->select('device_id,password,active,deleted')
            ->from('PpDevices')
            ->fetchArray();
            
            $external_devices_arr = array();
            foreach($external_devices as $k=>$exd){
                $external_devices_arr[$exd['device_id']]= $exd;
            }
            
            
            
            foreach($devices2send as $device_id=>$dev_data){
                
                // Check if device exists     
                if(!empty($external_devices_arr[$dev_data['device_internal_id']])){
                    //UPDATE
                    Doctrine_Query::create($externalConnection)
                    ->update('PpDevices')
                    ->set("password", "?", $dev_data['device_password'])
                    ->set("active", "?", $dev_data['active'])
                    ->set("deleted", "?", $dev_data['isdelete'] == 1 ? 'yes' : 'no')
                    ->where('device_id =?', $dev_data['device_internal_id'])
                    ->execute()
                    ;
                    
                } else{
                    // INSERT IF device does not exist 
                    $deleted = $dev_data['isdelete'] == 1 ? 'yes' : 'no';
                    $registration_id = $dev_data['device_internal_id'].'notifications_disabled'; 
                    
                    $sql = "INSERT INTO pp_devices (device_id, password,active,deleted, registration_id) VALUES ('".$dev_data['device_internal_id']."','".$dev_data['device_password']."','".$dev_data['active']."','".$deleted."','".$registration_id."') ";
                    $ins = $externalConnection ->prepare($sql);
                    $ins->execute();
                }
                
                
                // Update Our server - set devices as sent
                Doctrine_Query::create()
                ->update('MePatientDevices')
                ->set("device_sent", "?", "yes")
                ->where('id = ?', $dev_data['id'])
                ->andWhere('device_internal_id = ?', $dev_data['device_internal_id'])
                ->execute();
            }
            
            $externalConnection->close();
        } catch (Exception $e) {
            self::_log_error(__METHOD__ . " : " .$e->getMessage() . PHP_EOL . $e->getTraceAsString());
        }
        
        return true;
    }
    
    
    /**
     * ISPC-2432
     * Ancuta 03.02.2020
     * Get devices information from external servers
     * Get only devices with last_action in the last 48 h  
     * Update registration_id on our servers
     * @return void|boolean
     */
    public static function cronjob_mePatient_getDevices_from_servers()
    {
        
        if ( ! Zend_Registry::isRegistered('mepatient')
            || ! ($mePatient_cfg = Zend_Registry::get("mepatient")) )
        {
            return;
        }
            
        try {
            $externalManagerMePatient = Doctrine_Manager::getInstance();
            $externalConnection = $externalManagerMePatient->openConnection($mePatient_cfg['proxy']['doctrine']['dsn']);
            

            
            //get all devices with last_action in the last 48 h
            $external_devices = Doctrine_Query::create($externalConnection)
            ->select('device_id,password,registration_id,active,deleted,last_action,IF((last_action >= NOW() - INTERVAL 48 HOUR), true, false) AS actions_in_last_48h')
            ->from('PpDevices')
            ->having('actions_in_last_48h = 1')
            ->fetchArray();
            
            // if no devices were changed in the last 48 h - return
            if(empty($external_devices)){
                return;
            }
            
            foreach($external_devices as $k=>$ex_device_data){
                if(!empty($ex_device_data['device_id'])){
                    
                    // UPDATE DEVICE on our server - add registration key
                    $device_obj = Doctrine::getTable('MePatientDevices')->findOneBy('device_internal_id', $ex_device_data['device_id']);
                    if($device_obj){
                        $device_obj->registration_id = $ex_device_data['registration_id'];
                        $device_obj->save();
                    }
                }
            }
            
            $externalConnection->close();
        } catch (Exception $e) {
            self::_log_error(__METHOD__ . " : " .$e->getMessage() . PHP_EOL . $e->getTraceAsString());
        }
        
        return true;
    }
    
    
    /**
     * ISPC-2434
     * Ancuta
     * Send notifications
     * Changes: Date 12.02.2020
     * I) ISPC: add a verlauf entry for every PUSH sent in the same verlauf shortcut as "e"
     * I2) Verlauf entry for intervall PUSH 'A push message' message text" was sent" -> "Eine Interval-Push Nachricht mit dem Inhalt 'MESSAGE TEXT' wurde versendet."      
     */
    public static function cronjob_mePatient_sendPush_notifications()
    {
        $clientids = Client::get_all_clients_ids();
        
        $cleintids_with_module_213 = Modules::clients2modules(213, $clientids);
        
        $cleintids_with_module_215 = Modules::clients2modules(215, $clientids);
        
        
        foreach ($cleintids_with_module_213 as $id) {
            
            $pm_obj = new PatientMaster();
            // get all patients that have notifications to be sent today AND deives active that can receive notificatins
            $notification4today = $pm_obj->get_today_mePatient_pushNotifications_patients($id);
            
            if( empty($notification4today))
            {
                return; // No active patients with notifications  to be sent today 
            }

            
            if(in_array($id,$cleintids_with_module_215))//specific ligetis labels
            {
                $mePatient_labels = Pms_CommonData::mePatientIdentification('ligetis');
            }
            else
            {
                $mePatient_labels = Pms_CommonData::mePatientIdentification('default');
            }
            
            
            // get ipids
            $ipids= array();
            $ipids = array_keys($notification4today);
            
            // get all notifications sent today
            //dd9b2891056060f96027b7e7e696770b6c197d4f
            $notifications_sentToday = array();
            $notifications_sentToday = MePatientNotificationsHistoryTable::findNotificationSentToday($ipids);
            
            $notifications2ipids = array();
            $notifications2ipids = array_column($notifications_sentToday,'ipid');
            
            foreach($notification4today as $ipid => $notif)
            {
                if( (empty($notifications2ipids) ||  !in_array($ipid,$notifications2ipids)) && !empty($notif['EpidIpidMapping']['MePatientDevices']))
                {
                    foreach($notif['EpidIpidMapping']['MePatientDevices'] as $k=>$device_data){
                        
                         $device_data['notification_text']  = $notif['MePatientDevicesNotifications']['notification_text'];
                        
                         
                        // add to history
                        $notification_history = new MePatientNotificationsHistory();
                        $notification_history->ipid = $device_data['ipid'];
                        $notification_history->device_id = $device_data['id'];
                        $notification_history->notification_type = 'scheduled';
                        $notification_history->notification_text = $device_data['notification_text'] ;
                        $notification_history->save();
                        
                        // send to device
                        if($notification_history->id){
                            
                            //send to device
                            $device_data['notification_id'] = $notification_history->id;
                            
                            if(! empty($device_data['registration_id']) && ! empty($device_data['notification_text'])){
                                $mePatient = new Pms_mePatient();
                                // MEP-151 Ancuta 13.07.2020
                                //$device_response_json  = $mePatient->push_notification($device_data['registration_id'],$device_data['notification_text']);
                                $device_response_json  = $mePatient->push_notification($device_data['registration_id'],$device_data['notification_text'],null,$device_data['notification_id']);
                                //--
                                
                                // send notification to proxy
                                $pp_device_data = array();
                                $pp_device_data['device'] = $device_data['device_internal_id'];
                                $pp_device_data['type'] = 'scheduled';
                                $pp_device_data['text'] = $device_data['notification_text'];
                                $pp_device_data['date'] = date("Y-m-d H:i:s");
                                $pp_device_data['notification_id'] = $device_data['notification_id'];
                                MePatientDevicesNotifications::mePatient_sendNotification_to_servers($pp_device_data);
                                
                                //12.02.2020 Changes
                                //Add to verlauf
                                $comment = str_replace('%message%', $device_data['notification_text'], $mePatient_labels['notifications_interval']['course_entry']);

                                $custcourse = new PatientCourse();
                                $custcourse->ipid = $ipid;
                                $custcourse->course_date = date("Y-m-d H:i:s", time());
                                $custcourse->course_type = Pms_CommonData::aesEncrypt($mePatient_labels['notifications_interval']['course_shortcut']);
                                $custcourse->course_title = Pms_CommonData::aesEncrypt(addslashes($comment));
                                $custcourse->user_id = '-1';
                                $custcourse->recordid = $notification_history->id;
                                $custcourse->tabname = Pms_CommonData::aesEncrypt('mePatient_notification_interval');
                                $custcourse->save();
                                // --
                                
                            }
                            $device_response = array();
                            if(!empty($device_response_json)){
                                $device_response = json_decode($device_response_json,true);
                            }
                            
                            // update history
                            if($device_response ){
                                $NotificationsHistory_obj = Doctrine::getTable('MePatientNotificationsHistory')->findOneBy('id',$device_data['notification_id']);
                                if($NotificationsHistory_obj){
                                    $NotificationsHistory_obj->message_ack= $device_response_json;
                                    $NotificationsHistory_obj->send_ok = ($device_response['success'] == '1') ? 'yes' : 'no' ;
                                    $NotificationsHistory_obj->save();
                                }
                            }
                        }
                        
                    }
                    
                }
                
            }
            
        }
        
    }

}