<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PatientsOrdersRecipients', 'MDAT');

/**
 * BasePatientsOrdersRecipients
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $order_id
 * @property integer $recipient_id
 * @property integer $isdelete
 * @property timestamp $create_date
 * @property integer $create_user
 * @property timestamp $change_date
 * @property integer $change_user
 * 
 * @package    ISPC
 * @subpackage Application (2018-12-21)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePatientsOrdersRecipients extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('patients_orders_recipients');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('order_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('recipient_id', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
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
        $this->hasColumn('create_date', 'timestamp', null, array(
             'type' => 'timestamp',
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
        $this->hasColumn('change_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('change_user', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));


        $this->index('order_id_isdelete', array(
             'fields' => 
             array(
              0 => 'order_id',
              1 => 'isdelete',
             ),
             ));
    }    
            

    public function setUp()
    {
        parent::setUp();
        
        $this->hasOne('PatientsOrdersDetails', array(
            'local' => 'order_id',
            'foreign' => 'id',
        ));
        
        /*
         *  auto-added by builder
         */
        $this->actAs(new Softdelete());
            
        /*
         *  auto-added by builder
         */
        $this->actAs(new Timestamp());
        
        
        //DO NOT MOVE - Leave this at the end ( after Softdelete and Timestamp)
         
        $this->addListener(new HistoryListener(array(
        
        )), "HistoryListener");
        
    }
}