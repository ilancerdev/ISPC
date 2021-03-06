<?php

/**
 * PatientDiagnosisObserved
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-12-13)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientDiagnosisObserved extends BasePatientDiagnosisObserved
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'patientdiagnosisobserved_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_patientdiagnosisobserved';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'PatientDiagnosisObserved';
    const PATIENT_FILE_TITLE    = 'PatientDiagnosisObserved PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'PatientDiagnosisObserved PDF was created';
    const PATIENT_COURSE_TABNAME    = 'patientdiagnosisobserved';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    
    

}