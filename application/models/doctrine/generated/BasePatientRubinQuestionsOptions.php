<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PatientRubinQuestionsOptions', 'MDAT');

/**
 * BasePatientRubinQuestionsOptions
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $question_id
 * @property string $option_label
 * @property string $option_value
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * @property integer $isdelete
 * 
 * @package    ISPC
 * @subpackage Application (2019-04-12) 
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * Demstepcare_upload - 10.09.2019 Ancuta
 */
abstract class BasePatientRubinQuestionsOptions extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('patient_rubin_questions_options');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('form_id', 'enum', 8, array(
            'type' => 'enum',
            'length' => 8,
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
                12 => 'badl', //ISPC-2455 Lore 
                13 => 'cmscale',   //ISPC-2456 Lore
                14 => 'carerelated',      //ISPC-2492 Lore 02.12.2019
                15 => 'carepatient',       //ISPC-2493 Lore 03.12.2019
                16 => 'dscdsv'           //ISPC-2509 Lore 06.01.2020
            ),
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
                
        $this->hasColumn('question_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('option_label', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('option_value', 'string', 225, array(
             'type' => 'string',
             'length' => 225,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('option_score_value', 'integer', 3, array(
             'type' => 'integer',
             'length' => 3,
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
        $this->hasColumn('isdelete', 'integer', 4, array(
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
        /*
         *  auto-added by builder
         */
        
        $this->hasOne('PatientRubinQuestions', array(
            'local' => 'question_id',
            'foreign' => 'id',
        ));
        
        $this->actAs(new Softdelete());
            
        /*
         *  auto-added by builder
         */
        $this->actAs(new Timestamp());
    }
}