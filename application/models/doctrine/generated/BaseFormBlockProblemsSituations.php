<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('FormBlockProblemsSituations', 'MDAT');

/**
 * BaseFormBlockProblemsSituations
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $patient_problem_id
 * @property string $ipid
 * @property timestamp $situation_date
 * @property enum $situation_type
 * @property string $situation_description
 * @property integer $latest_version
 * @property integer $version_nr
 * @property integer $isdelete
 * @property timestamp $create_date
 * @property integer $create_user
 * @property timestamp $change_date
 * @property integer $change_user
 * 
 * @package    ISPC [ISPC-2864]
 * @subpackage Application (2021-04-13)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFormBlockProblemsSituations extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('form_block_problems_situations');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('patient_problem_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'comment' => 'id form form_block_problems',
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
        $this->hasColumn('situation_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('situation_type', 'enum', 17, array(
             'type' => 'enum',
             'length' => 17,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'current_situation',
              1 => 'hypothesis',
              2 => 'measures',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('situation_description', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('latest_version', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('version_nr', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
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
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('change_user', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
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
        $this->index('situation_date', array(
             'fields' => 
             array(
              0 => 'situation_date',
             ),
             ));
        $this->index('patient_problem_id', array(
             'fields' => 
             array(
              0 => 'patient_problem_id',
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
        /*
         *  auto-added by builder
         */
        
        
        $this->hasOne('FormBlockProblems', array(
            'local' => 'patient_problem_id',
            'foreign' => 'id'
        ));
        
        $this->actAs(new Softdelete());
            
        /*
         *  auto-added by builder
         */
        $this->actAs(new Timestamp());
    }
}