<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SurveyQuestions', 'IDAT');

/**
 * BaseSurveyQuestions
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @property integer $id
 * @property integer $survey
 * @property string $question
 * @property string $type
 * @property enum $required
 * @property integer $order
 * @property string $question_id
 * @property string $subtext
 * @property enum $sudoku
 * @property string $custom
 * ISPC-2695
 * @package    ISPC
 * @subpackage Application (2020-11-04)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSurveyQuestions extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('survey_questions');
        
        $this->hasColumn('id', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => true,
            'autoincrement' => true,
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
        $this->hasColumn('question', 'string', null, array(
            'type' => 'string',
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('type', 'string', 32, array(
            'type' => 'string',
            'length' => 32,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('required', 'enum', 1, array(
            'type' => 'enum',
            'length' => 1,
            'fixed' => false,
            'unsigned' => false,
            'values' =>
            array(
                0 => '0',
                1 => '1',
            ),
            'primary' => false,
            'default' => '0',
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('order', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('question_id', 'string', 255, array(
            'type' => 'string',
            'length' => 255,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('subtext', 'string', null, array(
            'type' => 'string',
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('sudoku', 'enum', 1, array(
            'type' => 'enum',
            'length' => 1,
            'fixed' => false,
            'unsigned' => false,
            'values' =>
            array(
                0 => '0',
                1 => '1',
            ),
            'primary' => false,
            'default' => '0',
            'notnull' => true,
            'autoincrement' => false,
        ));
        $this->hasColumn('custom', 'string', 32, array(
            'type' => 'string',
            'length' => 32,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        
    }
    
    
    public function setUp()
    {
        parent::setUp();
        
        
        $this->hasOne('SurveySurveys', array(
            'local' => 'survey',
            'foreign' => 'id'
        ));
    }
}