<?php

/**
 * MePatientDevicesSurveys
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2020-01-13)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class MePatientDevicesSurveys extends BaseMePatientDevicesSurveys
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'mepatientdevicessurveys_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_mepatientdevicessurveys';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'MePatientDevicesSurveys';
    const PATIENT_FILE_TITLE    = 'MePatientDevicesSurveys PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'MePatientDevicesSurveys PDF was created';
    const PATIENT_COURSE_TABNAME    = 'mepatientdevicessurveys';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    
    

}