<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('PatientFeedbackGeneral', 'MDAT');

/**
 * BasePatientFeedbackGeneral
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $ipid
 * @property set $assistance_healthinsurance
 * @property blob $assistance_healthinsurance_freetext
 * @property enum $mobility
 * @property blob $mobility_freetext
 * @property enum $fall_hazards
 * @property set $fall_hazards_yes
 * @property blob $fall_hazards_freetext
 * @property enum $cognitive_communicative
 * @property blob $cognitive_communicative_freetext
 * @property enum $behaviors_mental
 * @property enum $behaviors_mental_yes
 * @property blob $behaviors_mental_freetext
 * @property enum $nutrition
 * @property enum $difficulty_drinking
 * @property enum $difficulty_eating
 * @property blob $nutrition_freetext
 * @property set $continence
 * @property blob $continence_freetext
 * @property enum $coping_everyday
 * @property blob $coping_everyday_freetext
 * @property enum $housekeeping
 * @property blob $housekeeping_freetext
 * @property enum $social_integration
 * @property enum $everyday_life
 * @property blob $social_integration_freetext
 * @property integer $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * @package    ISPC
 * @subpackage Application (2019-02-18)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePatientFeedbackGeneral extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('patient_feedback_general');

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
        $this->hasColumn('assistance_healthinsurance', 'set', 31, array(
             'type' => 'set',
             'length' => 31,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'Hospital care prevention',
              1 => 'backup care',
              2 => 'support care',
              3 => 'Forwarding to the family doctor',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Hilfen der Krankenversicherung (nach § 37 SGB V Anspruch auf häusliche Krankenpflege)',
             ));
        $this->hasColumn('assistance_healthinsurance_freetext', 'blob', null, array(
             'type' => 'blob',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('mobility', 'enum', 16, array(
             'type' => 'enum',
             'length' => 16,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'independently',
              1 => 'need for support',
              2 => 'dependent',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Mobilität',
             ));
        $this->hasColumn('mobility_freetext', 'blob', null, array(
             'type' => 'blob',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('fall_hazards', 'enum', 3, array(
             'type' => 'enum',
             'length' => 3,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'no',
              1 => 'yes',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Sturzgefahr',
             ));
        $this->hasColumn('fall_hazards_yes', 'set', 34, array(
             'type' => 'set',
             'length' => 34,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'unsteady gait',
              1 => 'dizziness',
              2 => 'force reduction',
              3 => 'poor eyesight',
              4 => 'dementia',
              5 => 'depression',
              6 => 'osteoporosis',
              7 => 'cognitive disorders',
              8 => 'Trip hazards in the living room',
              9 => 'Inadequate supply of mobility aids',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('fall_hazards_freetext', 'blob', null, array(
             'type' => 'blob',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('cognitive_communicative', 'enum', 16, array(
             'type' => 'enum',
             'length' => 16,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'independently',
              1 => 'need for support',
              2 => 'dependent',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Kognitive und kommunikative Fähigkeiten',
             ));
        $this->hasColumn('cognitive_communicative_freetext', 'blob', null, array(
             'type' => 'blob',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('behaviors_mental', 'enum', 17, array(
             'type' => 'enum',
             'length' => 17,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'Never / rarely',
              1 => 'more often a week',
              2 => 'Every day',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Verhaltensweisen und psychische Problemlagen',
             ));
        $this->hasColumn('behaviors_mental_yes', 'enum', 14, array(
             'type' => 'enum',
             'length' => 14,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'mental illness',
              1 => 'dementia',
              2 => 'depression',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('behaviors_mental_freetext', 'blob', null, array(
             'type' => 'blob',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('nutrition', 'enum', 14, array(
             'type' => 'enum',
             'length' => 14,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'sufficient',
              1 => 'regularly',
              2 => 'unsatisfactory',
              3 => 'irregular',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Ernährung',
             ));
        $this->hasColumn('difficulty_drinking', 'enum', 3, array(
             'type' => 'enum',
             'length' => 3,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'no',
              1 => 'yes',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Schwierigkeiten beim Trinken',
             ));
        $this->hasColumn('difficulty_eating', 'enum', 3, array(
             'type' => 'enum',
             'length' => 3,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'no',
              1 => 'yes',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Schwierigkeiten beim Essen',
             ));
        $this->hasColumn('nutrition_freetext', 'blob', null, array(
             'type' => 'blob',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('continence', 'set', 17, array(
             'type' => 'set',
             'length' => 17,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'continent',
              1 => 'incontinent chair',
              2 => 'incontinent urine',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Kontinenz',
             ));
        $this->hasColumn('continence_freetext', 'blob', null, array(
             'type' => 'blob',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('coping_everyday', 'enum', 16, array(
             'type' => 'enum',
             'length' => 16,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'independently',
              1 => 'need for support',
              2 => 'dependent',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Bewältigung der Alltagssituation',
             ));
        $this->hasColumn('coping_everyday_freetext', 'blob', null, array(
             'type' => 'blob',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('housekeeping', 'enum', 16, array(
             'type' => 'enum',
             'length' => 16,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'independently',
              1 => 'need for support',
              2 => 'dependent',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Haushaltsführung',
             ));
        $this->hasColumn('housekeeping_freetext', 'blob', null, array(
             'type' => 'blob',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('social_integration', 'enum', 11, array(
             'type' => 'enum',
             'length' => 11,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'Covered',
              1 => 'not covered',
              2 => 'not wanted',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Soziale Einbindung',
             ));
        $this->hasColumn('everyday_life', 'enum', 16, array(
             'type' => 'enum',
             'length' => 16,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'independently',
              1 => 'need for support',
              2 => 'dependent',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'comment' => 'Gestaltung des Alltagslebens',
             ));
        $this->hasColumn('social_integration_freetext', 'blob', null, array(
             'type' => 'blob',
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
             'comment' => '1=deleted',
             ));
        $this->hasColumn('create_user', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('create_date', 'timestamp', null, array(
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
        $this->hasColumn('change_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));


        $this->index('ipid', array(
             'fields' => 
             array(
              0 => 'ipid',
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
        $this->actAs(new Softdelete());
            
        /*
         *  auto-added by builder
         */
        $this->actAs(new Timestamp());
    }
}