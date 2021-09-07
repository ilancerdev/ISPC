<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SurveyResultScores', 'IDAT');

/**
 * BaseSurveyResultScores
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $survey_took
 * @property integer $survey
 * @property integer $score
 * @property decimal $value
 * @property string $eq
 * @property string $chart_text
 * @property string $misc_details
 * 
 * @package    ISPC
 * @subpackage Application (2019-09-11)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2411
 */
abstract class BaseSurveyResultScores extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('survey_result_scores');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('survey_took', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
            'comment' => 'id from survey_patient2chain',
             ));
        $this->hasColumn('survey', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('score', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('value', 'decimal', 10, array(
             'type' => 'decimal',
             'length' => 10,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '0.00000',
             'notnull' => true,
             'autoincrement' => false,
             'scale' => '5',
             ));
        $this->hasColumn('eq', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('chart_text', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('misc_details', 'string', null, array(
             'type' => 'string',
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
        $this->hasColumn('delete_date', 'timestamp', null, array(
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
        $this->hasColumn('create_date', 'timestamp', null, array(
            'type' => 'timestamp',
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
        

        $this->index('survey_took', array(
             'fields' => 
             array(
              0 => 'survey_took',
             ),
             ));
        $this->index('survey', array(
             'fields' => 
             array(
              0 => 'survey',
             ),
             ));
        $this->index('score', array(
             'fields' => 
             array(
              0 => 'score',
             ),
             ));
    }    
            

    public function setUp()
    {
        parent::setUp();
        /*
         *  auto-added by builder
         */
        $this->actAs(new Softdelete());
        
        /*
         *  auto-added by builder
        */
        $this->actAs(new Timestamp());
    }
}