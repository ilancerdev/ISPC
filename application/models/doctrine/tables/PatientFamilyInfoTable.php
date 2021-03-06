<?php

/**
 * PatientFamilyInfoTable
 * #ISPC-2773 Lore 14.12.2020
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC-773
 * @subpackage Application (2020-12-14) 
 * @author     Lore <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientFamilyInfoTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return PatientFamilyInfoTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PatientFamilyInfo');
    }
    
    
}
