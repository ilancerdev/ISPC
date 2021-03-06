<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PatientSurveySettings', 'IDAT');

/**
 * BasePatientSurveySettings
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $ipid
 * @property enum $status
 * @property enum $parent_table
 * @property integer $table_id
 * @property timestamp $start_date
 * @property integer $interval_days
 * @property integer $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property timestamp $change_date
 * @property integer $change_user
 * 
 * @package    ISPC
 * @subpackage Application (2019-08-21)
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePatientSurveySettings extends Doctrine_Record
{
	public function setTableDefinition()
	{
		$this->setTableName('patient_survey_settings');
		$this->hasColumn('id', 'integer', 4, array(
				'type' => 'integer',
				'length' => 4,
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
				'notnull' => false,
				'autoincrement' => false,
		));
		$this->hasColumn('status', 'enum', 8, array(
				'type' => 'enum',
				'length' => 8,
				'fixed' => false,
				'unsigned' => false,
				'values' =>
				array(
				0 => 'disabled',
				1 => 'enabled',
				),
				'primary' => false,
				'default' => 'disabled',
				'notnull' => true,
				'autoincrement' => false,
		));
		$this->hasColumn('parent_table', 'enum', 8, array(
				'type' => 'enum',
				'length' => 8,
				'fixed' => false,
				'unsigned' => false,
				'values' =>
				array(
				0 => 'PatientMaster',
				1 => 'ContactPersonMaster',
				),
				'primary' => false,
				'default' => NULL,
				'notnull' => true,
				'autoincrement' => false,
		));
		$this->hasColumn('table_id', 'integer', 4, array(
				'type' => 'integer',
				'length' => 4,
				'fixed' => false,
				'unsigned' => false,
				'primary' => false,
				'notnull' => true,
				'autoincrement' => false,
		));
		$this->hasColumn('start_date', 'timestamp', null, array(
				'type' => 'timestamp',
				'fixed' => false,
				'unsigned' => false,
				'primary' => false,
				'notnull' => true,
				'autoincrement' => false,
		));
		$this->hasColumn('interval_days', 'integer', 4, array(
				'type' => 'integer',
				'length' => 4,
				'fixed' => false,
				'unsigned' => false,
				'primary' => false,
				'notnull' => true,
				'autoincrement' => false,
		));
		
		$this->index('id', array(
				'fields' => array('id'),
				'primary' => true
		));
		$this->index('idx_ipid_isdelete', array(
				'fields' => array('ipid', 'isdelete')
		));
	}

    public function setUp()
    {
        parent::setUp();
        
        $this->hasOne('PatientMaster', array(
        		'local' => 'ipid',
        		'foreign' => 'ipid'
        ));
        

        $this->hasMany('SurveyPatient2chain', array(
        		'local' => 'id',
        		'foreign' => 'patient'
        ));
        
        $this->actAs(new Timestamp());
        
        $this->actAs(new Softdelete());
    }
}