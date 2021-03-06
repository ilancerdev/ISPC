<?php

/**
 * FormBlockCustomTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2019-09-16)
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2454 
 */
class FormBlockCustomTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return FormBlockCustomTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('FormBlockCustom');
    }
    
    public function findOneByContactFormIdAndIpid( $contact_form_id = '', $ipid = '', $block_id='', $hydrationMode = Doctrine_Core::HYDRATE_RECORD )
    {
    	if (empty($ipid) || ! is_string($ipid)) {
    
    		return;
    
    	} else {
    		return self::getInstance()->createQuery('enq')
    		->where('ipid = ?')
    		->andWhere('contact_form_id = ?')
    		->andWhere('block_id = ?')
    		->orderBy('id DESC') // just in case the delete is not ok
    		->limit(1)
    		->fetchOne(array($ipid, $contact_form_id, $block_id), $hydrationMode);
    	}
    }
}