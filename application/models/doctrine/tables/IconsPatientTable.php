<?php

/**
 * IconsPatientTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2019-10-08) ISPC-2396 
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class IconsPatientTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return IconsPatientTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('IconsPatient');
    }
    
    /**
     *
     * @param mixed $hydrationMode
     * @return void|Doctrine_Collection
     */
    public static function findAllIconsPatients($ipids, $hydrationMode = Doctrine_Core::HYDRATE_ARRAY)
    {
    	
    	return self::getInstance()->createQuery('ipc')
    	->select("ipc.*")
    	->whereIn('ipc.ipid', $ipids)
    	->execute(null, $hydrationMode);
    }
    
    public static function findAllIconsPatientbyIconId($iconarr = null, $hydrationMode = Doctrine_Core::HYDRATE_ARRAY)
    {
    	if($iconarr && !is_array($iconarr))
    	{
    		$iconarr = array($iconarr);
    	}
    	else 
    	{
    		return false;
    	}
    	
    	return self::getInstance()->createQuery('ips')
    	->select("ips.*")
    	->whereIn('ips.icon_id', $iconarr)
    	->execute(null, $hydrationMode);
    }
    
    public static function deleteAllIconsPatientsByIpidandIconId($ipids = null, $iconarr = null)
    {
    	
    	if (empty($ipids) && empty($iconarr)){
    		return; 
    		
    	}
    	
    	if($ipids && !is_array($ipids))
    	{
    		$ipids = array($ipids);
    	}
    
    	if($iconarr && !is_array($iconarr))
    	{
    		$iconarr = array($iconarr);
    	}
    	
    	$querydel =  self::getInstance()->createQuery('ipm')
    	->delete();
    	if($ipids)
    	{
    		$querydel->whereIn('ipm.ipid', $ipids);
    	}
    	if($iconarr)
    	{
    		$querydel->andWhereIn('ipm.icon_id', $iconarr);
    	}
    	$querydel->execute();
    }
}