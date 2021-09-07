<?php

/**
 * SurveyScheduledHistoryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2019-09-11)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2411
 */
class SurveyScheduledHistoryTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return SurveyScheduledHistoryTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('SurveyScheduledHistory');
    }
    
    public static function findallByPatients( $patients = array(), $hydrationMode = Doctrine_Core::HYDRATE_ARRAY)
    {
        if(empty($patients)){
            return;
        }
    
        return self::getInstance()->createQuery('srs')
        ->select("srs.*")
        ->whereIn('srs.patient ', $patients)
        ->execute(null, $hydrationMode);
    }
    
    public static function findByPatientAndSurvey( $patient = 0, $survey_id=0,  $hydrationMode = Doctrine_Core::HYDRATE_ARRAY )
    {
        if(empty($patient) || empty($survey_id)){
            return;
        }
    
        return self::getInstance()->createQuery('srs')
        ->select("srs.*")
        ->where('srs.patient =? ', $patient)
        ->andWhere('srs.survey_id =? ', $survey_id)
        ->orderBy('date DESC' )
        ->limit(1)
        ->fetchOne(null, $hydrationMode);
    }
}