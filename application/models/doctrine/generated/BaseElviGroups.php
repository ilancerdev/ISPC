<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('ElviGroups', 'SYSDAT');

/**
 * BaseElviGroups
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $ispc_groupid
 * @property integer $groupId
 * @property string $groupIdentifier
 * @property string $groupTitle
 * @property integer $userIdExternal
 * @property enum $visibility
 * @property timestamp $create_date
 * @property integer $create_user
 * @property timestamp $change_date
 * @property integer $change_user
 * @property integer $isdelete
 * 
 * @package    ISPC
 * @subpackage Application (2018-10-02)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseElviGroups extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('elvi_groups');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('ispc_groupid', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('groupId', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'from elvi',
             ));
        $this->hasColumn('groupIdentifier', 'string', 36, array(
             'type' => 'string',
             'length' => 36,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'Each group must have a unique identifier. If no identifier is supplied, a random identifier will be generated.',
             ));
        $this->hasColumn('groupTitle', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'Any title. Due to the fact groups are not visible to everyone, this title will be most important for administrative instances.',
             ));
        $this->hasColumn('userIdExternal', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Each group may have an owner. If no owner is set, nothing happens.',
             ));
        $this->hasColumn('visibility', 'enum', 14, array(
             'type' => 'enum',
             'length' => 14,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'authorized',
              1 => 'administrative',
             ),
             'primary' => false,
             'default' => 'administrative',
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'In most cases these groups are used for logical organization. Available values are [authorized|administrative]. Defaults to administrative. If other or unknown values are set, there will be a fallback to default.',
             ));
        $this->hasColumn('create_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '0000-00-00 00:00:00',
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
        $this->hasColumn('change_date', 'timestamp', null, array(
             'type' => 'timestamp',
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
        $this->hasColumn('isdelete', 'integer', 1, array(
             'type' => 'integer',
             'length' => 1,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             ));


        $this->index('ispc_clientid', array(
             'fields' => 
             array(
              0 => 'ispc_clientid',
             ),
             ));
        $this->index('ispc_groupid', array(
             'fields' => 
             array(
              0 => 'ispc_groupid',
             ),
             ));
        $this->index('groupIdentifier', array(
             'fields' => 
             array(
              0 => 'groupIdentifier',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
        $this->hasOne('ElviUsers', array(
            'local' => 'userIdExternal',
            'foreign' => 'userIdExternal'
        ));
        
        $this->actAs(new Timestamp());
        
        $this->actAs(new Softdelete());
        
    }
}