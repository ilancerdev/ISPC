<?php

/**
 * SurveyResultScores
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2019-09-11)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2411
 */
class SurveyResultScores extends BaseSurveyResultScores
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'surveyresultscores_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_surveyresultscores';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'SurveyResultScores';
    const PATIENT_FILE_TITLE    = 'SurveyResultScores PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'SurveyResultScores PDF was created';
    const PATIENT_COURSE_TABNAME    = 'surveyresultscores';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    
    

}