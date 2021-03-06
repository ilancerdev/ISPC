<?php

/**
 * FormBlockCoordinatorActions
 * ISPC-2487
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2019-11-27)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class FormBlockCoordinatorActions extends BaseFormBlockCoordinatorActions
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'formblockcoordinatoractions_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_formblockcoordinatoractions';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'FormBlockCoordinatorActions';
    const PATIENT_FILE_TITLE    = 'FormBlockCoordinatorActions PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'FormBlockCoordinatorActions PDF was created';
    const PATIENT_COURSE_TABNAME    = 'formblockcoordinatoractions';
    const PATIENT_COURSE_TYPE       = 'RL'; // add letter

    

    public function getPatientFormBlockCoordinatorActions($ipid, $contact_form_id, $allow_deleted = false)
    {
        $groups_sql = Doctrine_Query::create()->select('*')
            ->from('FormBlockCoordinatorActions')
            ->where("ipid='" . $ipid . "'")
            ->andWhere('contact_form_id ="' . $contact_form_id . '"');
        if (! $allow_deleted) {
            $groups_sql->andWhere('isdelete = 0');
        }
        $groupsarray = $groups_sql->fetchArray();
        
        if ($groupsarray) {
            foreach ($groupsarray as $key => $action_details) {
                $patient_actions[$action_details['action_id']]['receives_services']      = $action_details['receives_services'];
                $patient_actions[$action_details['action_id']]['is_requested']           = $action_details['is_requested'];
                $patient_actions[$action_details['action_id']]['redirected']             = $action_details['redirected'];
                $patient_actions[$action_details['action_id']]['informed']               = $action_details['informed'];
                $patient_actions[$action_details['action_id']]['action_comment']         = $action_details['action_comment'];
                $patient_actions[$action_details['action_id']]['hand_strength_training'] = $action_details['hand_strength_training'];
                $patient_actions[$action_details['action_id']]['pain_diary']             = $action_details['pain_diary'];
                $patient_actions[$action_details['action_id']]['sleep_diary']            = $action_details['sleep_diary'];
                $patient_actions[$action_details['action_id']]['incontinence_protocol']  = $action_details['incontinence_protocol'];
            }
            
            return $patient_actions;
        }
    }

    
    public function get_filled_PatientFormBlockCoordinatorActions($ipid, $last = false, $history = false,  $allow_deleted = false)
    {
        
        $patient = Doctrine_Query::create()
        ->select('c.id,c.ipid,c.start_date,f.*')
        ->from('ContactForms c')
        ->where('c.isdelete="0"')
        ->andWhere('c.ipid =  ?',$ipid)
        ->leftJoin("c.FormBlockCoordinatorActions f")
        ->andWhere('c.id = f.contact_form_id ')
        ->andWhere('c.isdelete = 0   ')
        ->andWhere('f.ipid =  ?',$ipid)
        ->andWhere('c.id is NOT null')
        ->andWhere('f.id is NOT null');
        if($last){
            $patient->orderBy('c.start_date DESC');
            $patient->limit('1');
        } else {
            $patient->orderBy('c.start_date DESC');
        }
        $patientlimit = $patient->fetchArray();
        
        if($last){
            $last_saved_data = array();
            foreach($patientlimit as $ck=>$cf_data){
                foreach($cf_data['FormBlockCoordinatorActions'] as $k=>$ca_data){
                    $last_saved_data[$ca_data['action_id']] =  $ca_data;
                    $last_saved_data[$ca_data['action_id']]['date'] =  date("d.m.Y H:i",strtotime($cf_data['start_date']));;
                }
            }
            return  $last_saved_data;
            
        }
        
        if($history){
            $history_values = array();
            $g = 0;
            foreach($patientlimit as $ck=>$cf_data){
//                 $hi2date[$cf_data['start_date']] = $cf_data;
                if(!empty($cf_data['FormBlockCoordinatorActions'])){
                    
                    foreach($cf_data['FormBlockCoordinatorActions'] as $k=>$ca_data){
                        $history_values[$ca_data['action_id']] [$g]  =  $ca_data;;
                        $history_values[$ca_data['action_id']] [$g] ['date'] =  date("d.m.Y H:i",strtotime($cf_data['start_date']));

//                         $hi2date[$cf_data['start_date']][$ca_data['action_id']] = $ca_data; 
                        $g++;
                    }
                } 
            }
            
            return  $history_values;
        }
        
        
        
        
        dd($history_values);
//         $patient = Doctrine_Query::create()
//         ->select('*')
//         ->from('FormBlockCoordinatorActions f')
//         ->where('f.isdelete="0"')
//         ->leftJoin("ContactForms c")
//         ->andWhere('c.id = f.contact_form_id ')
//         ->andWhere('c.isdelete = 0   ')
//         ->andWhere('f.ipid =  ?',$ipid)
//         ->orderBy('c.start_date ASC');
//         $patientlimit = $patient->fetchArray();
        
        $ca = array();
        foreach($patientlimit as $k=>$cfs){
            $ca[$cfs['contact_form_id']][] =$cfs;
        }
        dd($ca);
        
         
        
        
        $groups_sql = Doctrine_Query::create()->select('*')
            ->from('FormBlockCoordinatorActions')
            ->where("ipid='" . $ipid . "'")
            ->andWhere('contact_form_id ="' . $contact_form_id . '"');
        if (! $allow_deleted) {
            $groups_sql->andWhere('isdelete = 0');
        }
        $groupsarray = $groups_sql->fetchArray();
        
        if ($groupsarray) {
            foreach ($groupsarray as $key => $action_details) {
                $patient_actions[$action_details['action_id']]['receives_services']      = $action_details['receives_services'];
                $patient_actions[$action_details['action_id']]['is_requested']           = $action_details['is_requested'];
                $patient_actions[$action_details['action_id']]['redirected']             = $action_details['redirected'];
                $patient_actions[$action_details['action_id']]['informed']               = $action_details['informed'];
                $patient_actions[$action_details['action_id']]['action_comment']         = $action_details['action_comment'];
                $patient_actions[$action_details['action_id']]['hand_strength_training'] = $action_details['hand_strength_training'];
                $patient_actions[$action_details['action_id']]['pain_diary']             = $action_details['pain_diary'];
                $patient_actions[$action_details['action_id']]['sleep_diary']            = $action_details['sleep_diary'];
                $patient_actions[$action_details['action_id']]['incontinence_protocol']  = $action_details['incontinence_protocol'];
            }
            
            return $patient_actions;
        }
    }

    public function get_patients_form_block_ebmii($ipids, $contact_form_ids, $only_checked = false, $allow_deleted = false)
    {
        if (! is_array($ipids)) {
            $ipids_array = array(
                $ipids
            );
        } else {
            $ipids_array = $ipids;
        }
        
        if (! is_array($contact_form_ids)) {
            $contact_form_ids_array = array(
                $contact_form_ids
            );
        } else {
            $contact_form_ids_array = $contact_form_ids;
        }
        
        $groups_sql = Doctrine_Query::create()->select('*')
            ->from('FormBlockCoordinatorActions')
            ->whereIn("ipid", $ipids_array)
            ->andWhereIn("contact_form_id", $contact_form_ids_array);
        
        if ($only_checked === true) {
            $groups_sql->andWhere('action_value = 1');
        }
        
        if (! $allow_deleted) {
            $groups_sql->andWhere('isdelete = 0');
        }
        
        $groupsarray = $groups_sql->fetchArray();
        
        if ($groupsarray) {
            foreach ($groupsarray as $key => $action_details) {
                $patient_actions[$action_details['ipid']][$action_details['contact_form_id']][] = $action_details['action_id'];
            }
            return $patient_actions;
        }
    }
    
    /**
     * ISPC-2895 Ancuta 20.05.2021
     * @param unknown $ipids
     * @param unknown $contact_form_ids
     * @param boolean $only_checked
     * @param boolean $allow_deleted
     * @return unknown
     */
    public function get_patients_form_block_ca($ipids, $contact_form_ids, $only_checked = false, $allow_deleted = false)
    {
        if (! is_array($ipids)) {
            $ipids_array = array(
                $ipids
            );
        } else {
            $ipids_array = $ipids;
        }
        
        if (! is_array($contact_form_ids)) {
            $contact_form_ids_array = array(
                $contact_form_ids
            );
        } else {
            $contact_form_ids_array = $contact_form_ids;
        }
        
        $groups_sql = Doctrine_Query::create()->select('*')
            ->from('FormBlockCoordinatorActions')
            ->whereIn("ipid", $ipids_array)
            ->andWhereIn("contact_form_id", $contact_form_ids_array);
        
        if ($only_checked === true) {
            $groups_sql->andWhere('action_value = 1');
        }
        
        if (! $allow_deleted) {
            $groups_sql->andWhere('isdelete = 0');
        }
        
        $groupsarray = $groups_sql->fetchArray();
        
        if ($groupsarray) {
            foreach ($groupsarray as $key => $action_details) {
                $patient_actions[$action_details['ipid']][$action_details['contact_form_id']][] = $action_details;
            }
            return $patient_actions;
        }
    }
}

?>