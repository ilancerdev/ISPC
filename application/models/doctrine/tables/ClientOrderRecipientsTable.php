<?php

/**
 * ClientOrderRecipientsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName = '', $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2018-12-19)
 * @author     carmen <office@originalware.com>
 */
class ClientOrderRecipientsTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object ClientOrderMaterialsTable
     */
	
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ClientOrderRecipients');
    }
   
}