<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('SurveySurveyScores', 'IDAT');

/**
 * BaseSurveySurveyScores
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $survey
 * @property string $score
 * @property string $formula
 * @property enum $better
 * @property enum $hidden
 * @property integer $range_start
 * @property integer $range_end
 * 
 * @package    ISPC
 * @subpackage Application (2019-09-11)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2411
 */
abstract class BaseSurveySurveyScores extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('survey_survey_scores');

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
        $this->hasColumn('score', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('formula', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('better', 'enum', 1, array(
             'type' => 'enum',
             'length' => 1,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'h',
              1 => 'l',
             ),
             'primary' => false,
             'default' => 'h',
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('hidden', 'enum', 1, array(
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
        $this->hasColumn('range_start', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('range_end', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             ));


        $this->index('survey', array(
             'fields' => 
             array(
              0 => 'survey',
             ),
             ));
        $this->index('hidden', array(
             'fields' => 
             array(
              0 => 'hidden',
             ),
             ));
    }    
            

    public function setUp()
    {
        parent::setUp();
        
    }
}