<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PrintJobsItems', 'SYSDAT');

/**
 * BasePrintJobsItems
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $print_job_id
 * @property integer $clientid
 * @property integer $user
 * @property integer $item_id ISPC-2609 ANcuta 15.09.2020 - added item id - for voluntanry workers ids
 * @property integer $item_type ISPC-2609 ANcuta 15.09.2020 - added item id - for voluntanry worker, meber
 * @property integer $invoice_id
 * @property string $invoice_type
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * @package    ISPC
 * @subpackage Application (2020-09-04)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2609 Ancuta 04.09.2020
 */
abstract class BasePrintJobsItems extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('print_jobs_items');

        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('print_job_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'id from print_jobs_bulk',
             ));
        $this->hasColumn('clientid', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('user', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('item_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'voluntary worker id, member id etc',
             ));
        $this->hasColumn('item_type', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
            'comment' => 'voluntary worker',
        ));
        $this->hasColumn('invoice_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'invoice id sent to print',
             ));
        $this->hasColumn('invoice_type', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'name of invoice type',
             ));
        
        //TODO-3668 Ancuta 15.12.2020
        $this->hasColumn('ipid', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'ipid',
             ));
        
        $this->hasColumn('status', 'enum', 11, array(
            'type' => 'enum',
            'length' => 11,
            'fixed' => false,
            'unsigned' => false,
            'values' =>
            array(
                1 => 'new',
                2 => 'processed',
                3 => 'error',
            ),
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
            'comment' => 'status of print job',
        ));
        
        $this->hasColumn('tries', 'integer', 11, array(
            'type' => 'integer',
            'length' => 11,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'default' => '0',
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('isdelete', 'integer', 1, array(
            'type' => 'integer',
            'length' => 1,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'default' => '0',
            'notnull' => true,
            'autoincrement' => false,
        ));
        
        $this->hasColumn('create_user', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('create_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('change_user', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('change_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
    }    
            

    public function setUp()
    {
        parent::setUp();
        /*
         *  auto-added by builder
         */
        
        $this->actAs(new Softdelete());
        
        
        $this->hasOne('PrintJobsBulk', array(
            'local' => 'print_job_id',
            'foreign' => 'id'
        ));
        
        $this->actAs(new Timestamp());
    }
}