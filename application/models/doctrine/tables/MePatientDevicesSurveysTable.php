<?php

/**
 * MePatientDevicesSurveysTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2020-01-13)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2432
 */
class MePatientDevicesSurveysTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return MePatientDevicesSurveysTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('MePatientDevicesSurveys');
    }
    
    
    /**
     * ISPC-2411 + ISPC-2432
     * Ancuta 17.09.2020
     * @param unknown $ipid
     * @param unknown $survey_id
     * @return array|Doctrine_Collection|NULL
     */

    public static function allow_survey2patient($ipid,$survey_id)
    {
      
        
        
        $allow_survey = self::getInstance()->createQuery()
        ->select("*")
        ->where('ipid = ? ', $ipid)
        ->andWhere('survey_id = ? ', $survey_id)
        ->fetchArray();
        
        if ( ! empty($allow_survey)) {
            return $allow_survey;
        } else {
            return null;
        }
    }
}