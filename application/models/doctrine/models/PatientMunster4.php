<?php

/**
 * PatientMunster4
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2019-04-10)
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientMunster4 extends BasePatientMunster4
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = '';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_patientmunster4';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'munster4new_pre_pdf';
    const PATIENT_FILE_TITLE    = 'patientmunster4 PDF '; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'PatientMunster4 was created';
    const PATIENT_COURSE_TITLE_PDF     = 'PatientMunster4 PDF was saved';
    const PATIENT_COURSE_TABNAME    = 'patientmunster4';
    const PATIENT_COURSE_TABNAME_SAVE    = 'patientmunster4_save';
    const PATIENT_COURSE_TYPE       = 'F'; // add letter

    
    
    

}