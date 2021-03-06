<?php

/**
 * Anlage14Table
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2019-11-06) - ISPC-2426
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Anlage14Table extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return Anlage14Table (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Anlage14');
    }
    
    /**
     *
     * @param array $ipids
     * @param mixed $hydrationMode
     * @return void|Doctrine_Collection
     */
    public static function findAllAnlage14savedandAnlage14Hospitalrelated($ipids = null, $month_select_array_filled = null, $hydrationMode = Doctrine_Core::HYDRATE_ARRAY)
    {
    
    	if (empty($ipids) || empty($month_select_array_filled)) {
    		return; //fail-safe
    	}
    	
    	array_walk($month_select_array_filled, function(&$value) {
    		$value = $value.'-01';
    	});
    	$month_select_array_filled = array_values($month_select_array_filled);
    	
    	if ( ! self::getInstance()->hasRelation('Anlage14Hospitals')) {
    		self::getInstance()->hasMany('Anlage14Hospitals', ['local' => 'id', 'foreign' => 'formid']);
    	}
    	
    	return self::getInstance()->createQuery('sh14')
    	->select("sh14.*, sh14hosp.*")
    	->leftJoin("sh14.Anlage14Hospitals sh14hosp ON ((sh14hosp.formid = sh14.id or sh14hosp.formid IS NULL) and sh14hosp.isdelete = 0)")
    	->whereIn('sh14.ipid', $ipids)
    	->andWhereIn('DATE(sh14.date)', $month_select_array_filled)
    	->execute(null, $hydrationMode);
    }
}
    
    