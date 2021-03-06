<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('MePatientRequestsNotProcessed', 'IDAT');

/**
 * BaseMePatientRequestsNotProcessed
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $requests_received_ID
 * @property string $uuid
 * @property enum $type
 * @property enum $success
 * @property string $message
 * @property timestamp $create_date
 * @property timestamp $change_date
 * @property integer $create_user
 * @property integer $change_user
 * 
 * @package    ISPC
 * @subpackage Application (2020-03-12)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMePatientRequestsNotProcessed extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('mePatient_requests_not_processed');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('requests_received_ID', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'requests_received_ID from mePatient_requests_received(payload_id)',
             ));
        $this->hasColumn('uuid', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('type', 'enum', 6, array(
             'type' => 'enum',
             'length' => 6,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'img',
              1 => 'result',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('success', 'enum', 3, array(
             'type' => 'enum',
             'length' => 3,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'yes',
              1 => 'no',
             ),
             'primary' => false,
             'default' => 'no',
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('message', 'string', null, array(
             'type' => 'string',
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
        $this->hasColumn('change_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
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
        $this->hasColumn('change_user', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));


        $this->index('messages_received_ID', array(
             'fields' => 
             array(
              0 => 'requests_received_ID',
             ),
             ));
        $this->index('process_performed', array(
             'fields' => 
             array(
              0 => 'success',
             ),
             ));
    }    
            

    public function setUp()
    {
        parent::setUp();
        /*
         *  auto-added by builder
         */
        $this->actAs(new Timestamp());
    }
}