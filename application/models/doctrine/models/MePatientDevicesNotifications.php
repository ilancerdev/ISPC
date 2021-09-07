<?php

/**
 * MePatientDevicesNotifications
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2020-01-22)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class MePatientDevicesNotifications extends BaseMePatientDevicesNotifications
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'mepatientdevicesnotifications_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_mepatientdevicesnotifications';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'MePatientDevicesNotifications';
    const PATIENT_FILE_TITLE    = 'MePatientDevicesNotifications PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'MePatientDevicesNotifications PDF was created';
    const PATIENT_COURSE_TABNAME    = 'mepatientdevicesnotifications';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    /**
     * @author Ancuta 
     * ISPC-2432
     * date: 12.02.2020
     * @param array $data
     * @return void|boolean
     */
    public static function mePatient_sendNotification_to_servers( $data = array())
    {
        
        if ( ! Zend_Registry::isRegistered('mepatient')
            || ! ($mePatient_cfg = Zend_Registry::get("mepatient")) )
        {
            return;
        }
        
       
        if(empty($data)){
            return;
        }
        
        //SAVE TO Proxy
        try {
            $externalManagerMePatient = Doctrine_Manager::getInstance();
            $externalConnection = $externalManagerMePatient->openConnection($mePatient_cfg['proxy']['doctrine']['dsn']);
            
            //Ancuta 28.02.2020 - encrypt notification text sent to proxypool
            $mePatient = new Pms_mePatient();
            $data['text']  = $mePatient->data_encrypt( $data['text']);
            //--
            
            $sql = "INSERT INTO pp_notifications (device, type, notification_id,text, create_date) VALUES ('".$data['device']."','".$data['type']."','".$data['notification_id']."','".$data['text']."','".$data['date']."')";
            $ins = $externalConnection ->prepare($sql);
            $ins->execute();
            
            $externalConnection->close();
            
        } catch (Exception $e) {
            echo $e->getMessage();
            self::_log_error(__METHOD__ . " : " .$e->getMessage() . PHP_EOL . $e->getTraceAsString());
        }
        
        return true;
    }
    

}