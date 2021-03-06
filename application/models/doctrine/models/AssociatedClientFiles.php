<?php

/**
 * AssociatedClientFiles
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-04-16)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class AssociatedClientFiles extends BaseAssociatedClientFiles
{

    /**
     * if no $clientid is supplied will return all linked cleints grouped 
     * else return the linked clients for it grouped
     * @param string $clientid
     * @return Ambigous <multitype:, unknown>
     */
    public function fetchAssociatedClients ( $clientid = null){
        
        $result = array();
        
        $res = $this->getTable()->createQuery('acf indexBy id')
        ->fetchArray();
        
        
        foreach ($res as $row) {
            $result[$row['group_id']][$row['clientid']] = $row;
        }
        
        
        if ($clientid) { //return just the groups where this cleintid is
            foreach ($result as $k => $group) {
                if ( ! isset($group[$clientid])) {
                    unset($result[$k]);
                }
            }
        }
        
        
        return $result;
    }
    
    
    //verify if requested $other_clientid is associated with the loghed-in $clientid
    public function assert_associated($other_clientid = 0, $clientid = 0 )
    {
        if (empty($other_clientid)) {
            return false;
        }
        
        if (empty($clientid)) {
            $logininfo = new Zend_Session_Namespace('Login_Info');
            $clientid = $logininfo->clientid;
        } 
        
        if ($other_clientid == $clientid) {
            
            return true;
            
        } else {
            
            $associate_clients = $this->fetchAssociatedClients($clientid);
        
            $associated_client_IDs = array();
            if ( ! empty($associate_clients)) {
                foreach ($associate_clients as $groupid=>$clients) {
                    $associated_client_IDs = array_merge($associated_client_IDs, array_column($clients, 'clientid'));
                }
            }
            $associated_client_IDs = array_unique($associated_client_IDs);
            
            if ( ! in_array($other_clientid, $associated_client_IDs)) {
                 
                return false;
                 
            } else {
                
                return true;
                
            }
        } 
            
    }
    
    
}