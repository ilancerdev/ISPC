<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('MePatientSurveys', 'IDAT');

/**
 * BaseMePatientSurveys
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $survey_name
 * @property string $survey_url
 * @property integer $painpool_survey_id
 * @property integer $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property timestamp $change_date
 * @property integer $change_user
 * 
 * @package    ISPC
 * @subpackage Application (2020-01-10)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2432 Ancuta 13.01.2020
 */
abstract class BaseMePatientSurveys extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('mePatient_surveys');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('survey_name', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('survey_url', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('painpool_survey_id', 'integer', 4, array(
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
        
        $this->hasMany('MePatientSurveysClients', array(
            'local' => 'id',
            'foreign' => 'survey_id',
        ));
        
        $this->actAs(new Softdelete());
            
        /*
         *  auto-added by builder
         */
        $this->actAs(new Timestamp());
    }
}