<?php

/**
 * FormBlockDelegation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC-2488
 * @subpackage Application (2019-11-22)
 * @author     Lore <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2019-11-22 19:53:27Z jwage $
 */
class FormBlockDelegation extends BaseFormBlockDelegation
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'formblockdelegation_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_formblockdelegation';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'FormBlockDelegation';
    const PATIENT_FILE_TITLE    = 'FormBlockDelegation PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'FormBlockDelegation PDF was created';
    const PATIENT_COURSE_TABNAME    = 'FormBlockDelegation';
    const PATIENT_COURSE_TYPE       = 'XM'; // add letter

    
    
    /**
     * ISPC-2895 Ancuta 20.05.2021
     * @param unknown $ipids
     * @param unknown $contact_form_ids
     * @param boolean $allow_deleted
     * @return unknown
     */
    public function get_patients_form_block_delegation($ipids, $contact_form_ids,  $allow_deleted = false)
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
        ->from('FormBlockDelegation')
        ->whereIn("ipid", $ipids_array)
        ->andWhereIn("contact_form_id", $contact_form_ids_array);
        
        if (! $allow_deleted) {
            $groups_sql->andWhere('isdelete = 0');
        }
        
        $groupsarray = $groups_sql->fetchArray();
        
        if ($groupsarray) {
            foreach ($groupsarray as $key => $action_details) {
                $patient_actions[$action_details['ipid']][$action_details['contact_form_id']] = $action_details;
            }
            return $patient_actions;
        }
    }
}