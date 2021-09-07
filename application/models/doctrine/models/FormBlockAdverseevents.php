<?php

/**
 * FormBlockAdverseevents
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-12-21)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class FormBlockAdverseevents extends BaseFormBlockAdverseevents
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'formblockadverseevents_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_formblockadverseevents';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'FormBlockAdverseevents';
    const PATIENT_FILE_TITLE    = 'FormBlockAdverseevents PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TYPE       = 'UE'; // new shortcut Unerwünschte Ereignisse
    
    const PATIENT_COURSE_TABNAME    = 'formblockadverseevents';
    
    //this is just for demo, another one is used on contact_form save
    const PATIENT_COURSE_TITLE      = 'FormBlockAdverseevents was created';

    
    
    

}