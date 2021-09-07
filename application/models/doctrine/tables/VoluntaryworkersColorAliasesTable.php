<?php

/**
 * VoluntaryworkersColorAliasesTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC-2401
 * @subpackage Application (2019-07-17)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class VoluntaryworkersColorAliasesTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return VoluntaryworkersColorAliasesTable (object)
     */

    public static function get_coloralias_array($clientid = 0)
    {         
        $modules = new Modules();
        if ($modules->checkModulePrivileges("190", $clientid)){
            return [
                'g' => self::translate("vw_green"),
                'y' => self::translate("vw_yellow"),
                'r' => self::translate("vw_red"),
                'b' => self::translate("vw_black"),
                'blue' => self::translate("vw_blue"),
                'purple' => self::translate("vw_purple"),
                'grey' => self::translate("vw_grey")
            ];
        } else {
            return [
                'g' => self::translate("vw_green"),
                'y' => self::translate("vw_yellow"),
                'r' => self::translate("vw_red"),
                'b' => self::translate("vw_black")
            ];
        }
    }
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('VoluntaryworkersColorAliases');
    }
    
    
    public static function findAllVoluntaryworkerscoloraliases($clientid, $hydrationMode = Doctrine_Core::HYDRATE_ARRAY)
    {
        return self::getInstance()->createQuery('vca')
        ->select("vca.*")
        ->where('vca.clientid = ? ', $clientid)
        ->execute(null, $hydrationMode);
    }

}


