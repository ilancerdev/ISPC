<?php

/**
 * Hl7MessagesReceived
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-07-02)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Hl7MessagesReceived extends BaseHl7MessagesReceived
{

    
    /**
     * @cla on 02.07.2017
     * TODO : return count of fetched
     *
     * @return void|boolean
     */
    public static function cronjob_hl7_fetch_from_servers()
    {
        if ( ! Zend_Registry::isRegistered('HL7')
            || ! ($hl7_cfg = Zend_Registry::get("HL7")) )
        {
            return;
        }
        
//         $managerDecrypt = Doctrine_Manager::getInstance();
//         $managerDecrypt->setCurrentConnection('SYSDAT');
//         $connDecrypt = $managerDecrypt->getCurrentConnection();
// //         $queryReEncrypt = $connDecrypt->prepare('SELECT AES_ENCRYPT(AES_DECRYPT(:value, :slave_key), :local_key) as message_reecrypted');
//         $queryReEncrypt = $connDecrypt->prepare('SELECT AES_DECRYPT(:value, :slave_key) as message_decrypted');
        $queryReEncrypt = null;
        
        $local_key = Zend_Registry::get('salt');
        
        foreach ($hl7_cfg as $port => $cfg) {
        
            try {
                $externalManagerHL7SocketServer = Doctrine_Manager::getInstance();
                $externalConnection = $externalManagerHL7SocketServer->openConnection($cfg['doctrine']['dsn']);
                //             $externalHL7SocketServer = Doctrine_Manager::connection($cfg['doctrine']['dsn'], 'HL7SocketServer');
            
                $externalCollection = Doctrine_Query::create($externalConnection)
                ->select('*, AES_DECRYPT(message, "' . $cfg['encrypt_key'] . '") as message_decrypted')
                ->from('Hl7MessagesReceived')
                ->where('port = ?', $port)
                //             ->where('client_id = ?', $cfg['clientid'])
                ->andWhere("fetched_by_master = ?", "NO")
                ->fetchArray()
                ;
            
            
                if ( ! empty($externalCollection)) {
            
                    $primaryKey = Doctrine_Core::getTable('Hl7MessagesReceived')->getIdentifier();
            
                    $externalCollectionIDS = array_column($externalCollection, $primaryKey);
            
                    array_walk($externalCollection, function(&$item) use ($primaryKey, $cfg, $queryReEncrypt, $local_key){
                        
                        $item['fetched_by_master'] = 'YES';
                        $item['external_messages_received_ID'] = $item[$primaryKey];
                        
                        unset($item[$primaryKey]);
                        
                        if (empty($item['client_id'])) {
                            $item['client_id'] = $cfg['clientid'];
                        }
            
//                         $queryReEncrypt->bindValue(":value", $item['message']);
//                         $queryReEncrypt->bindValue(":slave_key", $cfg['encrypt_key']);
//                         $queryReEncrypt->bindValue(":local_key", $local_key);
//                         $queryReEncrypt->execute();
//                         $encrypt = $queryReEncrypt->fetchAll();
            
//                         $item['message'] = $encrypt['0']['message_reecrypted'];
                        
//                         $queryReEncrypt->bindValue(":value", $item['message']);
//                         $queryReEncrypt->bindValue(":slave_key", $cfg['encrypt_key']);
//                         $queryReEncrypt->execute();
//                         $encrypt = $queryReEncrypt->fetchAll();
            
//                         $item['message'] = $encrypt['0']['message_decrypted'];
                        $item['message'] = $item['message_decrypted'];
            
                    });
            
                    //save on our master server
                    $collection = new Doctrine_Collection('Hl7MessagesReceived');
                    $collection->fromArray($externalCollection);
                    $collection->save();
                    if ($keys = $collection->getPrimaryKeys()) {
                        //saved OK, update slave socketServer db
                        Doctrine_Query::create($externalConnection)
                        ->update('Hl7MessagesReceived')
                        ->set("fetched_by_master", "?", "YES")
                        ->whereIn($primaryKey, $externalCollectionIDS)
                        ->execute()
                        ;
                    }
            
                }
            
                $externalConnection->close();
                //$externalHL7SocketServer = Doctrine_Manager::clo($cfg['doctrine']['dsn'], 'HL7SocketServer');
            } catch (Exception $e) {
                self::_log_error(__METHOD__ . " : " .$e->getMessage() . PHP_EOL . $e->getTraceAsString());   
            }
        }
        
        return true;
    }
}