<?php

/**
 * InvoicePaymentsImportTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName = '', $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2020-08-19) ISPC-2623
 * @author     carmen <office@originalware.com>
 */
class InvoicePaymentsImportTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object InvoicePaymentsImportTable
     */
	
    public static function getInstance()
    {
        return Doctrine_Core::getTable('InvoicePaymentsImport');
    }
   
}