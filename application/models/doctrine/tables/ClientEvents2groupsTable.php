<?php

/**
 * ClientEvents2groupsTable
 * #ISPC-2512PatientCharts
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2020-04-16)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ClientEvents2groupsTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return ClientEvents2groupsTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ClientEvents2groups');
    }
}