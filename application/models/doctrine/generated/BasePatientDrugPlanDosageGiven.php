<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PatientDrugPlanDosageGiven', 'MDAT');

/**
 * PatientDrugPlanDosageGiven
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * #ISPC-2512PatientCharts
 * @property integer $id
 * @property string $ipid
 * @property integer $drugplan_id
 * @property string $dosage
 * @property time $dosage_time_interval
 * @property text $documented_info
 * @property timestamp $documented_date
 * @property text $undocumented_info
 * @property timestamp $undocumented_date
 * @property integer $undocumented
 * @property integer $undocumented_user
 * @property isdelete $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * @package    ISPC-2547
 * @subpackage Application (2020-03-03)
 * @author     Carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePatientDrugPlanDosageGiven extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('patient_drugplan_dosage_given');
        $this->option('type', 'INNODB');

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
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('drugplan_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'id from patient_drugplan',
             ));
        
        $this->hasColumn('cocktail_id', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => false,
        		'autoincrement' => false,
        		'comment' => 'id from patient_drugplan_cocktails', // added for given pumpe Carmen 15.05.2020
        ));
        //ISPC-2871,Elena,12.04.2021
        $this->hasColumn('pumpe_id', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => false,
        		'autoincrement' => false,
        		'comment' => 'id from patient_drugplan_pumpe', // added for given pumpe (new)
        ));
        $this->hasColumn('dosage_date', 'timestamp', null, array( //ISPC-2583 Carmen 30.04.2020 change from date to timestamp
            'type' => 'timestamp',
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('dosage_status', 'enum', 22, array(
            'type' => 'enum',
            'length' => 22,
            'fixed' => false,
            'unsigned' => false,
            'values' =>
            array(
                0 => 'given',
                1 => 'not_given',
                2 => 'given_different_dosage',
                3 => 'not_taken_by_patient',
            ),
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
            'comment' => 'Status of dosage set in charts ISPC-2515+ISC-2583',
        ));
        
        $this->hasColumn('not_given_reason', 'string', 255, array(
        		'type' => 'string',
        		'length' => 255,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('dosage', 'string', 255, array(
        		'type' => 'string',
        		'length' => 255,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('dosage_time_interval', 'time', NULL, array(
        	 'type' => 'time',
        	 'length' => NULL
        	));
        $this->hasColumn('documented_info', 'text', null, array(
        		'type' => 'text',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('documented_date', 'timestamp', null, array(
        		'type' => 'timestamp',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('undocumented_info', 'text', null, array(
        		'type' => 'text',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('undocumented_date', 'timestamp', null, array(
        		'type' => 'timestamp',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('undocumented', 'integer', 1, array(
        		'type' => 'integer',
        		'length' => 1,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'default' => '0',
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('undocumented_user', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->index('idx_ipid', array(
        		'fields' =>
        		array(
        				0 => 'ipid',
        		),
        ));
        $this->index('idx_isdeleted', array(
        		'fields' =>
        		array(
        				0 => 'isdelete',
        		),
        ));
        $this->index('idx_drugplan_id', array(
        		'fields' =>
        		array(
        				0 => 'drugplan_id',
        		),
        ));
    }    
            

    public function setUp()
    {
        parent::setUp();
        
        $this->actAs(new Timestamp());
        
        $this->actAs(new Softdelete());
        
        $this->hasOne('PatientDrugPlan', array(
        		'local' => 'drugplan_id',
        		'foreign' => 'id'
        ));
    }
}