<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PrintJobsBulk', 'SYSDAT');

/**
 * BasePrintJobsBulk
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $clientid
 * @property integer $user
 * @property integer $template_id // ISPC-2609 Ancuta 15.09.2020 - this is usewd in case of letters where there can be multiple per clients
 * @property string $page
 * @property enum $output_type
 * @property enum $status
 * @property string $invoice_type
 * @property string $print_params
 * @property string $print_function
 * @property string $print_controller
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * @package    ISPC
 * @subpackage Application (2020-08-27)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2609 Ancuta
 */
abstract class BasePrintJobsBulk extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('print_jobs_bulk');

        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
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
        $this->hasColumn('page', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'page where the print was requested',
             ));
        $this->hasColumn('template_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('output_type', 'enum', 4, array(
             'type' => 'enum',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'pdf',
              1 => 'docx',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('status', 'enum', 11, array(
             'type' => 'enum',
             'length' => 11,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'active',
              1 => 'canceled',
              2 => 'in_progress',
              3 => 'completed',
              4 => 'new',
              5 => 'processed',
              6 => 'error',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'status of print job',
             ));
        $this->hasColumn('client_file_id', 'integer', 11, array(
            'type' => 'integer',
            'length' => 11,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
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
        $this->hasColumn('print_params', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('print_function', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('print_controller', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
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
        
        $this->hasMany('PrintJobsItems', array(
            'local' => 'id',
            'foreign' => 'print_job_id',
            'cascade'     => array('delete')
        ));
        
        
        $this->actAs(new Timestamp());
    }
}