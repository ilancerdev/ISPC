<?php

/**
 * ClientEvents2groups
 * #ISPC-2512PatientCharts
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2020-04-16)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2517 Ancuta
 */
class ClientEvents2groups extends BaseClientEvents2groups
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'clientevents2groups_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_clientevents2groups';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'ClientEvents2groups';
    const PATIENT_FILE_TITLE    = 'ClientEvents2groups PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'ClientEvents2groups PDF was created';
    const PATIENT_COURSE_TABNAME    = 'clientevents2groups';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    
    

}