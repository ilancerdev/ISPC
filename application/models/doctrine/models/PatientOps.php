<?php

/**
 * PatientOps
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2020-10-07)
 * @author     Carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * 
 * ISPC-2654 Carmen 07.10.2020
 */
class PatientOps extends BasePatientOps
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'patientops_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_patientops';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'PatientOps';
    const PATIENT_FILE_TITLE    = 'PatientOps PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'PatientOps PDF was created';
    const PATIENT_COURSE_TABNAME    = 'patientops';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    
   

}