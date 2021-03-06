<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ClientUserTextBox', 'SYSDAT');

/**
 * BaseClientUserTextBox
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC-2827 Lore 30.03.2021
 * @subpackage Application (2021-03-30)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseClientUserTextBox extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('client_user_text_box');
        $this->hasColumn('id', 'integer', 11, array('type' => 'bigint', 'length' => 11, 'primary' => true, 'autoincrement' => true));
        $this->hasColumn('clientid', 'integer', 11, array('type' => 'integer','length' => 11));
        $this->hasColumn('user', 'string', 255, array('type' => 'string','length' => 255));
        $this->hasColumn('content', 'string', 255, array('type' => 'string','length' => 255));
        $this->hasColumn('inactive', 'integer', 1, array('type' => 'integer','length' => 1));
        $this->hasColumn('previous_id', 'integer', 11, array('type' => 'integer','length' => 11));
        $this->hasColumn('isdelete', 'integer', 1, array('type' => 'integer','length' => 1));
        
    }    
            

    public function setUp()
    {
        $this->actAs(new Timestamp());
        
        parent::setUp();
        /*
         *  auto-added by builder
         */
        $this->actAs(new Softdelete());
    }
}