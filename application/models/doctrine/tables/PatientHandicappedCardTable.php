<?php

/**
 * PatientHandicappedCardTable
 * #ISPC-2669 Lore 23.09.2020
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC-2669
 * @subpackage Application (2020-09-23) 
 * @author     Lore <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientHandicappedCardTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return PatientHandicappedCardTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PatientHandicappedCard');
    }
    
    
}
