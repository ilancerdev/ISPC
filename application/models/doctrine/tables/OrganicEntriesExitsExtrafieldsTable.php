<?php

/**
 * OrganicEntriesExitsExtrafieldsTable
 * #ISPC-2512PatientCharts
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2020-04-14) ISC-2518+ISPC-2520
 * @author     Carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * 
 */
class OrganicEntriesExitsExtrafieldsTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return OrganicEntriesExitsExtrafieldsTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('OrganicEntriesExitsExtrafields');
    }

}