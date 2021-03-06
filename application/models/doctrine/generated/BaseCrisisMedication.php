<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('CrisisMedication', 'MDAT');

/**
 * BaseCrisisMedication
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $bid
 * @property integer $medication_id
 * @property string $medication
 * @property object $dosage
 * @property text $comments
 * @property text $drug
 * @property object $crisis_dosage_form
 * @property object $frequency
 * @property integer $unit
 * @property integer $type
 * @property integer $indication
 * @property string $importance
 * @property integer $dosage_form
 * @property string $concentration
 * @property integer $verordnetvon
 * @property integer $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * @package    ISPC
 * @subpackage Application (2018-09-13)
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCrisisMedication extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('crisismedication');
        $this->option('type', 'INNODB');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));       
        $this->hasColumn('bid', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'autoincrement' => false,
        ));
        $this->hasColumn('medication_id', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'autoincrement' => false,
        ));
        $this->hasColumn('medication', 'string', 255, array(
        		'type' => 'string',
        		'length' => 255,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('dosage', 'object', null, array(
        		'type' => 'object',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => false,
        		'default' => NULL,
        ));
        $this->hasColumn('comments', 'text', null, array(
        		'type' => 'text',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('drug', 'text', null, array(
        		'type' => 'text',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('crisis_dosage_form', 'object', null, array(
        		'type' => 'object',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => false,
        		'default' => NULL,
        ));
        $this->hasColumn('frequency', 'object', null, array(
        		'type' => 'object',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => false,
        		'default' => NULL,
        ));
        $this->hasColumn('unit', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'autoincrement' => false,
        ));
        $this->hasColumn('type', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'autoincrement' => false,
        ));
        $this->hasColumn('indication', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'autoincrement' => false,
        ));
        $this->hasColumn('importance', 'string', 255, array(
        		'type' => 'string',
        		'length' => 255,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('dosage_form', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'autoincrement' => false,
        ));
        $this->hasColumn('concentration', 'string', 255, array(
        		'type' => 'string',
        		'length' => 255,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('verordnetvon', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'autoincrement' => false,
        ));
        
        $this->index('id', array(
            'fields' => array('id'),
            'primary' => true
        ));
        
        $this->index('idx_isdeleted', array(
             'fields' => 
             array(
              0 => 'isdelete',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
        $this->actAs(new Timestamp());
        
        $this->actAs(new Softdelete());
        
    }
}