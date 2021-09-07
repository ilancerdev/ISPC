<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PatientRubinForms', 'MDAT');

/**
 * BasePatientRubinForms
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $ipid
 * @property enum $form_type
 * @property timestamp $form_date
 * @property integer $form_total
 * @property integer $custom
 * @property integer $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * @package    ISPC
 * @subpackage Application (2019-05-31) 
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * Demstepcare_upload - 10.09.2019 Ancuta
 */
abstract class BasePatientRubinForms extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('patient_rubin_forms');

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
        
        $this->hasColumn('form_type', 'enum', 7, array(
             'type' => 'enum',
             'length' => 7,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'mna',
              1 => 'iadl',
              2 => 'mmst',
              3 => 'tug',
              4 => 'demtect',
              5 => 'whoqol',
              6 => 'npi',
              7 => 'gds',
              8 => 'bdi',
              9 => 'cmai',
              10 => 'nosger',
              11 => 'dsv',
              12 => 'badl',   //ISPC-2455 Lore
              13 => 'cmscale',   //ISPC-2456 Lore
              14 => 'carerelated',      //ISPC-2492 Lore 02.12.2019
              15 => 'carepatient',       //ISPC-2493 Lore 03.12.2019
              16 => 'dscdsv'           //ISPC-2509 Lore 06.01.2020
             ),
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('form_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('form_total', 'integer', 1, array(
             'type' => 'integer',
             'length' => 1,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('custom', 'integer', 3, array(
            'type' => 'integer',
            'length' => 3,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'default' => '0',
            'notnull' => true,
            'autoincrement' => false,
        ));        
        
        $this->hasColumn('score_memory', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        
        $this->hasColumn('score_iadl', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        
        
        $this->hasColumn('score_adl', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        
        $this->hasColumn('score_mood', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        
        $this->hasColumn('score_social', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        
        $this->hasColumn('score_disturbing', 'integer', 4, array(
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
    }    
            

    public function setUp()
    {
        parent::setUp();
        /*
         *  auto-added by builder
         */
        

        $this->hasMany('PatientRubinFormsAnswers', array(
            'local' => 'id',
            'foreign' => 'form_id',
        ));
        
        
        
        $this->actAs(new Softdelete());
            
        /*
         *  auto-added by builder
         */
        $this->actAs(new Timestamp());
    }
}