<?php

/**
 * UserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2019-05-28) ISPC-2162
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class UserTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return UserTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('User');
    }
    
    /**
     *
     * @param mixed $hydrationMode
     * @return void|Doctrine_Collection
     */
    public static function findAllPrintProfilesPreffered($userid, $hydrationMode = Doctrine_Core::HYDRATE_ARRAY)
    {
    	return self::getInstance()->createQuery('ppp')
    	->select("ppp.*")
    			->where('ppp.id = ? ', $userid)
    			->execute(null, $hydrationMode);
    }
    
    /**
     * ISPC-2615 Carmen 15.07.2020
     * @param mixed $hydrationMode
     * @return void|Doctrine_Collection
     */
    public static function findActiveDuplicatedUsersAndClients($userid, $hydrationMode = Doctrine_Core::HYDRATE_ARRAY)
    {
    	return self::getInstance()->createQuery('uadc')
    	->select("uadc.*")
    	->where('uadc.duplicated_user = ? ', $userid)
    	->andWhere('isdelete="0"')
    	->andWhere('isactive="0"')
    	->execute(null, $hydrationMode);
    }
}