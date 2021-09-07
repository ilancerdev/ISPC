<?php

/**
 * PrintJobsBulkTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2020-08-27)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2609 Ancuta
 */
class PrintJobsBulkTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return PrintJobsBulkTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PrintJobsBulk');
    }
    
    
    
    
    /**
     * ISPC-2609 Ancuta
     * @param unknown $client
     * @param unknown $user
     * @param boolean $invoice_type
     * @param boolean $status
     * @param boolean $show_all_details
     * @return void|string|mixed|NULL|array|Doctrine_Collection
     * Edited on 07.09.2020
     */
    public static function _find_invoices_print_jobs($client,$user,$invoice_type = false,$status = false, $show_all_details = false )
    {
        if(empty($client) || empty($user)){
            return;
        }
        
        $q = self::getInstance()->createQuery()
        ->select('*')
        ->where('clientid =?', $client)
        ->andWhere('user =? ', $user)
        //->andWhere('DATE(create_date) = ? ', date('Y-m-d'))
        ;
        if ($invoice_type) {
            $q->andWhere('invoice_type =? ', $invoice_type);
        }
        if ($status) {
            $q->andWhere('status =? ', $status);
        }
        $q->orderBy('create_date DESC');
        $result = $q->fetchArray();
        
        
        
        $user = new User();
        $user_details = array();
        $user_details = $user->get_client_users($client,1,true);
        
        $resulted_data = array();
        $resulted_data[0]['column_nr'] = self::translate('Queue_nr');
        $resulted_data[0]['user'] = self::translate('user');
//         $resulted_data[0]['invoices2print'] = self::translate('invoices2print');
//         $resulted_data[0]['print_type'] = self::translate('print_type');
        $resulted_data[0]['print_status'] = self::translate('print_status');
        $resulted_data[0]['print_link'] = self::translate('print_link');
        $resulted_data[0]['print_date'] = self::translate('print_date');
        $resulted_data[0]['actions'] = self::translate('actions');
        
        
        $qs = self::getInstance()->createQuery()
        ->select('*');
        $qs->where('status =? ', "active");
        $qs->orderBy('create_date ASC');
        $act_result = $qs->fetchArray();
        $pnr = 0;
        foreach($act_result as $pk=>$pactive){
            $pnr++;
            $qnr[$pactive['id']] = $pnr;
        }
        foreach($result as $k=>$data){
            if($data['status'] == 'active'  ) {
                $resulted_data[$data['id']]['id'] = $qnr[$data['id']];
            } else{
                $resulted_data[$data['id']]['id'] = '--';
            }
            
            $resulted_data[$data['id']]['user'] = $user_details[$data['user']];
            $resulted_data[$data['id']]['print_status'] = self::translate('ps_'.$data['status']);
            
            $data['clientid_enc'] = Pms_Uuid::encrypt($data['clientid']);

            if($data['status'] == 'completed' && $data['client_file_id'] != 0){
                
                $resulted_data[$data['id']]['print_link'] = '<a href="'.APP_BASE.'misc/clientfile?doc_id='.$data['client_file_id'].'&cid='.$data['clientid_enc'].'">  <img border="0" src="'.RES_FILE_PATH.'/images/file_download.png" />  </a>';
                
            } else{
                $resulted_data[$data['id']]['print_link'] = '--';
            }
            $resulted_data[$data['id']]['print_date'] = date('d.m.Y H:i',strtotime($data['create_date']));
            
            if($show_all_details){
                $resulted_data[$data['id']]['all_details'] = $data;
            }
        }
        
        return $resulted_data;
        
    }
    
    
    
    /**
     * ISPC-2609 Ancuta 
     * @param unknown $client
     * @param unknown $user
     * @param boolean $print_controller
     * @param boolean $status
     * @param boolean $show_all_details
     * @return void|string|mixed|NULL|array|Doctrine_Collection
     */
    public static function _find_user_print_jobs($client,$user,$print_controller = false,$status = false, $show_all_details = false )
    {
        if(empty($client) || empty($user)){
            return;
        }
        
        $q = self::getInstance()->createQuery()
        ->select('*')
        ->where('clientid =?', $client)
        ->andWhere('user =? ', $user);
        if ($print_controller) {
            $q->andWhere('print_controller =? ', $print_controller);
        }
        if ($status) {
            $q->andWhere('status =? ', $status);
        }
        $q->orderBy('create_date DESC');
        $result = $q->fetchArray();
        
        
        
        $user = new User();
        $user_details = array();
        $user_details = $user->get_client_users($client,1,true);
        
        $resulted_data = array();
        $resulted_data[0]['column_nr'] = self::translate('Queue_nr');
        $resulted_data[0]['user'] = self::translate('user');
        $resulted_data[0]['print_status'] = self::translate('print_status');
        $resulted_data[0]['print_link'] = self::translate('print_link');
        $resulted_data[0]['print_date'] = self::translate('print_date');
        $resulted_data[0]['actions'] = self::translate('actions');
        
        
        $qs = self::getInstance()->createQuery()
        ->select('*');
        $qs->where('status =? ', "active");
        $qs->orderBy('create_date ASC');
        $act_result = $qs->fetchArray();
        $pnr = 0;
        foreach($act_result as $pk=>$pactive){
            $pnr++;
            $qnr[$pactive['id']] = $pnr;
        }
        foreach($result as $k=>$data){
            if($data['status'] == 'active'  ) {
                $resulted_data[$data['id']]['id'] = $qnr[$data['id']];
            } else{
                $resulted_data[$data['id']]['id'] = '--';
            }
            
            $resulted_data[$data['id']]['user'] = $user_details[$data['user']];
            $resulted_data[$data['id']]['print_status'] = self::translate('ps_'.$data['status']);
            
            $data['clientid_enc'] = Pms_Uuid::encrypt($data['clientid']);

            if($data['status'] == 'completed' && $data['client_file_id'] != 0){
                
                $resulted_data[$data['id']]['print_link'] = '<a href="'.APP_BASE.'misc/clientfile?doc_id='.$data['client_file_id'].'&cid='.$data['clientid_enc'].'">  <img border="0" src="'.RES_FILE_PATH.'/images/file_download.png" />  </a>';
                
            } else{
                $resulted_data[$data['id']]['print_link'] = '--';
            }
            $resulted_data[$data['id']]['print_date'] = date('d.m.Y H:i',strtotime($data['create_date']));
            
            if($show_all_details){
                $resulted_data[$data['id']]['all_details'] = $data;
            }
        }
        
        return $resulted_data;
        
    }
    
    /**
     * ISPC-2609 Ancuta 10.09.2020
     * @param number $item_id
     * @return boolean|array|Doctrine_Collection
     */
    public static function __get_item_info($item_id = 0)
    {
        if (empty($item_id)) {
            return false;
        }
        
        $poa = self::getInstance()->createQuery('pjb')
        ->select('pjb.*,pji.*');
        $poa->leftJoin('pjb.PrintJobsItems as pji');
        $poa->where('pji.id =?', $item_id);
        $result = $poa->fetchArray();
        
        return $result;
        
    }
}