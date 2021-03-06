<?php

/**
 * IntenseConnections
 *  ISPC-2614 Ancuta 16.07.2020
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2020-07-06)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class IntenseConnections extends BaseIntenseConnections
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'intenseconnections_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_intenseconnections';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'IntenseConnections';
    const PATIENT_FILE_TITLE    = 'IntenseConnections PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'IntenseConnections PDF was created';
    const PATIENT_COURSE_TABNAME    = 'intenseconnections';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    public function get_intense_connection_by_ipid($ipid){
        if(empty($ipid)){
            return;
        }
         
        // check if the patient where data was inserted is SHARED
        $rp = Doctrine_Query::create()
        ->select('*')
        ->from('PatientsLinked')
        ->where('source = ?', $ipid)
        ->orWhere('target = ?',$ipid);
        $linked_patients = $rp->fetchArray();
        
        if(empty($linked_patients)){
            return;
        }
        
        //TODO-3481 Ancuta 02.10.2020
        foreach($linked_patients as $k=>$pl){
            if( $pl['intense_system'] != 1 ){
                unset($linked_patients[$k]);
            }
        }
        if(empty($linked_patients)){
            return;
        }
        //--
        
        $source_ipids = array();
        $all_ipids = array();
        foreach($linked_patients as $k=>$pl){
            $source_ipids[] = $pl['source'];
             
            $all_ipids[] = $pl['source'];
            $all_ipids[] = $pl['target'];
            
        }
        if(empty($all_ipids)){
            return;
        }
        
        $source_ipids = array_values(array_unique($source_ipids));
        $all_ipids = array_values(array_unique($all_ipids));
        
        if(empty($all_ipids)){
            return;
        }
        // get clients of ipids
        $patient_clietns = Doctrine_Query::create()
        ->select("ipid,clientid")
        ->from('EpidIpidMapping')
        ->whereIn("ipid",$all_ipids)
        ->fetchArray();
        
        $ipid2clientid = array();
        foreach($patient_clietns as $k => $ep){
            $ipid2clientid[$ep['ipid']] = $ep['clientid'];
        }
        
        
        $patient_qm = Doctrine_Query::create()
        ->select("*")
        ->from('PatientsMarked ')
        ->where("status = 'a'")
        ->andWhereIn("ipid",$source_ipids);
        $pf_share_array = $patient_qm->fetchArray();
        
        $patients_sharing_data = array();
        foreach($pf_share_array as $lk=>$spf){
            $patients_sharing_data[] = $spf['ipid'];
        }
        
        $ident=0;
        $share_direction = array();
        foreach($linked_patients as $k=>$pl){
            if(in_array($pl['source'], $patients_sharing_data)){
                if($pl['source'] == $ipid){
                    $share_direction[$ident]['source'] = $pl['source'];
                    $share_direction[$ident]['target'] = $pl['target'];
                    $share_direction[$ident]['source_client'] = $ipid2clientid[$pl['source']];
                    $share_direction[$ident]['target_client'] = $ipid2clientid[$pl['target']];
                    $share_direction[$ident]['intense_connection'] = IntenseConnectionsTable::_find_intense_connectionBetweenClients( $share_direction[$ident]['source_client'],$share_direction[$ident]['target_client'] ,false,true);
                    $ident++;
                } elseif($pl['target'] == $ipid){
                    $share_direction[$ident]['source'] = $pl['target'];
                    $share_direction[$ident]['target'] = $pl['source'];
                    $share_direction[$ident]['source_client'] = $ipid2clientid[$pl['target']];
                    $share_direction[$ident]['target_client'] = $ipid2clientid[$pl['source']];
                    $share_direction[$ident]['intense_connection'] = IntenseConnectionsTable::_find_intense_connectionBetweenClients( $share_direction[$ident]['source_client'],$share_direction[$ident]['target_client'] ,false,true);
                    $ident++;
                }
            }
            
        }
        
        if(!empty($share_direction)){
            return  $share_direction;
        } else{
            false;
        }
        
    }
    
    

}