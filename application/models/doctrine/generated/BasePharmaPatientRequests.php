<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PharmaPatientRequests', 'MDAT');

/**
 * BasePharmaPatientRequests
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $ipid
 * @property enum $custom
 * @property integer $drugplan_id
 * @property integer $request_id
 * @property string $request_reason
 * @property string $request_comment
 * @property integer $request_user
 * @property timestamp $request_date
 * @property integer $request_medi_line
 * @property enum $processed
 * @property integer $processed_by
 * @property timestamp $processed_date
 * @property enum $processed_status
 * @property string $processed_deny_comment
 * @property integer $processed_medi_line
 * @property integer $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * @package    ISPC
 * @subpackage Application (2020-02-20)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2507
 */
abstract class BasePharmaPatientRequests extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('pharma_patient_requests');

        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('ipid', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('custom', 'enum', 3, array(
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
        $this->hasColumn('drugplan_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'id rom patient_drugplan',
             ));
        $this->hasColumn('request_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'if rom pharma_patient_drugplan_request',
             ));
        $this->hasColumn('request_reason', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('request_comment', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('request_minutes', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false 
             ));
        $this->hasColumn('request_user', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'User that made the request',
             ));
        $this->hasColumn('request_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('request_medi_line', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'id from pharma_patient_drugplan - for requested line',
             ));
        $this->hasColumn('processed', 'enum', 3, array(
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
        $this->hasColumn('processed_by', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'doctor id that processed the request',
             ));
        $this->hasColumn('processed_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'date when request was processed',
             ));
        $this->hasColumn('processed_status', 'enum', 15, array(
             'type' => 'enum',
             'length' => 15,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'fully_agree',
              1 => 'partially_agree',
              2 => 'dont_agree',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('processed_deny_comment', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('processed_medi_line', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'id from pharma_patient_drugplan - for processed line',
             ));
        $this->hasColumn('isdelete', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('create_user', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('create_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('change_user', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('change_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));


        $this->index('ipid', array(
             'fields' => 
             array(
              0 => 'ipid',
             ),
             ));
        $this->index('isdelete', array(
             'fields' => 
             array(
              0 => 'isdelete',
             ),
             ));
    }    
            

    public function setUp()
    {
        parent::setUp();
        
        $this->hasOne('PharmaPatientRequests', array(
            'local' => 'request_id',
            'foreign' => 'id'
        ));
        
        /*
         *  auto-added by builder
         */
        $this->actAs(new Softdelete());
            
        /*
         *  auto-added by builder
         */
        $this->actAs(new Timestamp());
    }
}