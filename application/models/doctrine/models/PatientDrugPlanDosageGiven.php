<?php

/**
 * PatientDrugPlanDosageGiven
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC-2547 #ISPC-2512PatientCharts
 * @subpackage Application (2020-03-03)
 * @author     Carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */

Doctrine_Manager::getInstance()->bindComponent('PatientDrugPlanDosageGiven', 'MDAT');

class PatientDrugPlanDosageGiven extends BasePatientDrugPlanDosageGiven
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'patientdrugplandosagegiven_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_patientdrugplandosagegiven';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'PatientDrugPlanDosageGiven';
    const PATIENT_FILE_TITLE    = 'PatientDrugPlanDosageGiven PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'PatientDrugPlanDosageGiven PDF was created';
    const PATIENT_COURSE_TABNAME    = 'patientdrugplandosagegiven';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    
    

}
