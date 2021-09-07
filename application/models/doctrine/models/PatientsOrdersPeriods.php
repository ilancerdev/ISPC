<?php

/**
 * PatientsOrdersPeriods
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2019-01-10)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientsOrdersPeriods extends BasePatientsOrdersPeriods
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'patientsordersperiods_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_patientsordersperiods';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'PatientsOrdersPeriods';
    const PATIENT_FILE_TITLE    = 'PatientsOrdersPeriods PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'PatientsOrdersPeriods PDF was created';
    const PATIENT_COURSE_TABNAME    = 'patientsordersperiods';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    
    

}