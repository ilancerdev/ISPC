<?php

/**
 * PatientRegularChecksTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2018-12-10)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientRegularChecksTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return PatientRegularChecksTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PatientRegularChecks');
    }
}