<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PlansMediPrintSettings', 'SYSDAT');

/**
 * BasePlansMediPrintSettings
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $clientid
 * @property varchar $plansmedi_id
 * @property integer $plan_font_size
 * @property integer $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * @package    ISPC
 * @subpackage Application (2019-05-28) ISPC-2162
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePlansMediPrintSettings extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('plans_medi_print_settings');
        $this->option('type', 'INNODB');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
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
        		'autoincrement' => false,
        ));
        $this->hasColumn('plansmedi_id', 'enum', 3, array(
             'type' => 'enum',
             'length' => 40,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'TODO',
             ));
        $this->hasColumn('plansmedi_settings', 'object', null, array(
				'type' => 'object',
				'fixed' => false,
				'unsigned' => false,
				'primary' => false,
				'notnull' => false,
				'default' => NULL,
		));
        
        $this->index('id', array(
            'fields' => array('id'),
            'primary' => true
        ));
        
        $this->index('clientid+isdelete_idx', array(
            'fields' => array(
                'clientid',
                'isdelete'
            )
        ));
    }

    public function setUp()
    {
        parent::setUp();
        
        $this->actAs(new Timestamp());
        
        $this->actAs(new Softdelete());
        
        $this->setColumnOption('plansmedi_id', 'values', [
        		"medication",
        		"medication_plan_patient",
        		"medication_plan_patient_active_substance",
        		"medication_plan_bedarfsmedication",
        		"medication_plan_applikation"
        ]);

    }
}