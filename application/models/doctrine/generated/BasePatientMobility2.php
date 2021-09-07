<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PatientMobility2', 'IDAT');

/**
 * BasePatientMobility2
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $ipid
 * @property enum $selected_value
 * @property string $comment
 * @property integer $wlassessment_id
 * @property integer $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * @package    ISPC
 * @subpackage Application (2017-12-11)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePatientMobility2 extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('patient_mobility2');
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
        $this->hasColumn('selected_value', 'enum', 10, array(
             'type' => 'enum',
             'length' => 10,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'ambulatory',
              1 => 'rollator',
              2 => 'wheelchair',
              3 => 'bedridden',
             ),
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('comment', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('wlassessment_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        /*
        $this->hasColumn('isdelete', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
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
        */
        
        $this->index('idx_ipid', array(
            'fields' => array('ipid')
        ));
        $this->index('idx_isdelete', array(
            'fields' => array('isdelete')
        ));
        
    }

    public function setUp()
    {
        parent::setUp();
        
        $this->actAs(new Softdelete()); //BoxHistory is there.. so we hardDelete?
        
        $this->actAs(new Timestamp());
        
        //ISPC-2614 Ancuta 16-17.07.2020
        $this->addListener(new IntenseConnectionListener(array(
            
        )), "IntenseConnectionListener");
        //
        
    }
}