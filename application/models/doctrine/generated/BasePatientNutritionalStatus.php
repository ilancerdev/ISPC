<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PatientNutritionalStatus', 'MDAT');

/**
 * BasePatientNutritionalStatus
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $ipid
 * @property decimal $current_weight
 * @property timestamp $current_date
 * @property decimal $last_3_6_month_weight
 * @property timestamp $past_date
 * @property decimal $height
 * @property decimal $square_height
 * @property decimal $bmi
 * @property decimal $accid_weight_loss_last_3_6_month
 * @property enum $accute_ilness
 * @property integer $isdelete
 * @property timestamp $create_date
 * @property integer $create_user
 * @property timestamp $change_date
 * @property integer $change_user
 * 
 * @package    ISPC
 * @subpackage Application (2018-09-21)
 * @author     Carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePatientNutritionalStatus extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('patient_nutritional_status');
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
        $this->hasColumn('current_weight', 'decimal', 10, array(
        		'type' => 'decimal',
        		'length' => 10,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        		'scale' => '2',
        ));
        $this->hasColumn('now_date', 'timestamp', null, array(
        		'type' => 'timestamp',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('last_3_6_month_weight', 'decimal', 10, array(
        		'type' => 'decimal',
        		'length' => 10,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        		'scale' => '2',
        ));
        $this->hasColumn('past_date', 'timestamp', null, array(
        		'type' => 'timestamp',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('height', 'decimal', 10, array(
        		'type' => 'decimal',
        		'length' => 10,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        		'scale' => '2',
        ));
        $this->hasColumn('square_height', 'decimal', 10, array(
        		'type' => 'decimal',
        		'length' => 10,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        		'scale' => '2',
        ));
        $this->hasColumn('bmi', 'decimal', 10, array(
        		'type' => 'decimal',
        		'length' => 10,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        		'scale' => '2',
        ));
        $this->hasColumn('bmi_score', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('last_3_6_month_weight_proc', 'decimal', 10, array(
        		'type' => 'decimal',
        		'length' => 10,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        		'scale' => '2',
        ));
        $this->hasColumn('last_3_6_month_weight_proc_score', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('acute_illness', 'enum', 3, array(
        		'type' => 'enum',
        		'length' => 3,
        		'fixed' => false,
        		'unsigned' => false,
        		'values' =>
        		array(
        				0 => 'no',
        				1 => 'yes',
        		),
        		'primary' => false,
        		'notnull' => false,
        		'autoincrement' => false,
        ));
        $this->hasColumn('acute_illness_score', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('total_score', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
    }
    
    public function setUp()
    {
    	parent::setUp();
    
    	$this->actAs(new Timestamp());
    
    	$this->actAs(new Softdelete());
    
    }
}