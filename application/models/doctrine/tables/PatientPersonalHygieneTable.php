<?php

/**
 * PatientPersonalHygieneTable
 * ISPC-2792 Lore 15.01.2021
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC-2792
 * @subpackage Application (2021-01-15) 
 * @author     Lore <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientPersonalHygieneTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return PatientPersonalHygieneTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PatientPersonalHygiene');
    }
    
    
}
