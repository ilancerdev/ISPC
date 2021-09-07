<?php

/**
 * Hl7MessagesProcessed
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-07-02)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Hl7MessagesProcessed extends BaseHl7MessagesProcessed
{

    /**
     * @cla on 02.07.2017
     * TODO : return count of processed
     * 
     * !! this has a default $limit = 1000
     * 
     * @return void|boolean
     */
    public static function cronjob_hl7_process_messages( $limit = 1000 )
    {
        
        if (empty($limit) || ! is_numeric($limit)) {
            $limit = 1000;
        }
        
        if ( ! Zend_Registry::isRegistered('HL7')
            || ! ($hl7_cfg = Zend_Registry::get("HL7")) )
        {
            return;
        }
        
        $client_cfgs = array();
        
        foreach ($hl7_cfg as $port => $cfg) {
        
            $cfg['port'] = $port;
        
            $client_cfgs [$cfg['clientid']] = $cfg;
        }
        
        $internalCollection = Doctrine_Query::create()
//         ->select('*, AES_DECRYPT(message, :local_key) as message')
        ->select('*')
        ->from('Hl7MessagesReceived hl7_mr')
        ->leftJoin("hl7_mr.Hl7MessagesProcessed hl7_pm")
        ->where("fetched_by_master = :fetched")
        ->andWhere("hl7_pm.messages_processed_ID IS NULL")
        ->limit($limit)
        ->fetchArray(array(
            //"local_key" => Zend_Registry::get('salt'),
            "fetched" => "YES"
        ))
        ;
        
        foreach ($internalCollection as $row) {
        
            if ( ! empty($row['message']
                && isset($client_cfgs[$row['client_id']])))
            {
        
                $conf = $client_cfgs[$row['client_id']];
                
                $conf['messages_received_ID'] = $row['messages_received_ID'];
        
                $Hl7ProcessingClass = new $conf['class']($conf);
        
                $resultHl7 = $Hl7ProcessingClass->processHL7Msg($row['message']);
        
                if ($resultHl7 === true) {
        
                    $ipidProcessed = $Hl7ProcessingClass->getIpid();
                    /*
                    $messageType = $Hl7ProcessingClass->getMessageType();
                    */
                    $primaryKey = Doctrine_Core::getTable('Hl7MessagesReceived')->getIdentifier();
        
        
                    $hl_processed = new Hl7MessagesProcessed();
                    $hl_processed->$primaryKey = $row[$primaryKey];
                    $hl_processed->process_performed = 'YES';
                    
                    if ( ! empty($ipidProcessed)) {
                        $hl_processed->ipid = $ipidProcessed;
                    }
                    /*
                    if ( ! empty($messageType)) {
                        $hl_processed->message_type = $messageType;
                    }
                    */
                    $hl_processed->save();
        
        
                } else {
                     
                    $hl_processed = new Hl7MessagesProcessed();
                    $hl_processed->findOrCreateOneBy($primaryKey, $row[$primaryKey], array("process_performed" => "NO" , 'result' => $resultHl7));
        
        
                    $this->log_error("HL7 failed to process Hl7MessagesReceived->{$primaryKey}={$row[$primaryKey]}");
                }
            }
        }
        
        return true;
    }
    
}