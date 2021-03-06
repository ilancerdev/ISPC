<?php

/**
 * ContactFormsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2019-11-07) - ISPC-2426
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ContactFormsTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return ContactFormsTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ContactForms');
    }
    
    /**
     *
     * @param array $ipids
     * @param array $contact_forms_wrong
     * @param mixed $hydrationMode
     * @return void|Doctrine_Collection
     */
    public static function findAllPatientsContactFormsOrNotWrongs($ipids = null, $contact_forms_wrong = null, $hydrationMode = Doctrine_Core::HYDRATE_ARRAY)
    {
    
    	if (empty($ipids)) {
    		return; //fail-safe
    	}
    	
    	$patients_cf = self::getInstance()->createQuery('patcf')
    		->select("patcf.*")
    		->whereIn('patcf.ipid', $ipids)
    		->andWhere('patcf.isdelete = ?',0)
    		->andWhere('patcf.parent = ?',0);
    	if(!empty($contact_forms_wrong))
    	{
    		$patients_cf->andWhereNotIn('patcf.id', $contact_forms_wrong);
    	}
    	$pat_cfs = $patients_cf->execute(null, $hydrationMode);
    		
    	return $pat_cfs;
    }
}