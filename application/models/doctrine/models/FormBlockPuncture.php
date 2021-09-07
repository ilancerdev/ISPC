<?php

/**
 * FormBlockPuncture
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-12-21)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class FormBlockPuncture extends BaseFormBlockPuncture
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'formblockpuncture_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_formblockpuncture';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'FormBlockPuncture';
    const PATIENT_FILE_TITLE    = 'FormBlockPuncture PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TYPE       = 'K'; // add letter
    const PATIENT_COURSE_TABNAME    = 'formblockpuncture';
    
    //this is just for demo, another one is used on contact_form save
    const PATIENT_COURSE_TITLE      = <<<EOPCT
Punktionsort :
Punktionsversuche :
Punktionsnadel :
EOPCT;

    
    
    

}