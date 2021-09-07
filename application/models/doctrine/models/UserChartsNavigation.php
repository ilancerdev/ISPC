<?php

/**
 * UserChartsNavigation
 * #ISPC-2512PatientCharts
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2020-05-19)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class UserChartsNavigation extends BaseUserChartsNavigation
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'userchartsnavigation_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_userchartsnavigation';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'UserChartsNavigation';
    const PATIENT_FILE_TITLE    = 'UserChartsNavigation PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'UserChartsNavigation PDF was created';
    const PATIENT_COURSE_TABNAME    = 'userchartsnavigation';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    
    

}