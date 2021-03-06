<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('KinderSapvHospiz', 'MDAT');

/**
 * BaseKinderSapvHospiz
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $ipid
 * @property enum $appl_order
 * @property text $required_hospiz_treatment_justification
 * @property text $required_hospiz_regist_current_trend_change
 * @property enum $home_palliative_treatment_plan
 * @property text $home_current_therapies
 * @property enum $pain_therapy_already_started
 * @property enum $pain_therapy_expected
 * @property enum $symptom_control_crisis_intervention
 * @property enum $psychosocial_or_pastoral_support
 * @property enum $special_wound_care
 * @property enum $signs_of_infectious_diseases
 * @property text $other_palliative_needs
 * @property timestamp $form_date
 * @property string $hospice_name
 * @property timestamp $expected_recording_date
 * @property string $hospice_address
 * @property string $contact_for_inquiries_name
 * @property string $contact_for_inquiries_tel
 * @property enum $medical prescription_attached
 * @property enum $outpatient_or_semistationary_care_alternatif
 * @property enum $required_longterm_care_insurance_based
 * @property enum $receiving_or_entitled_careservices
 * @property object $receiving_or_entitled_careservices_from
 * @property string $careservice_name_address
 * @property enum $insured_consent_for_signature
 * @property integer $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * @package    ISPC
 * @subpackage Application (2018-08-17)
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseKinderSapvHospiz extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('kinder_sapv_hospiz');
        $this->option('type', 'INNODB');

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
        $this->hasColumn('appl_order', 'enum', 1, array(
             'type' => 'enum',
        	 'length' => 1,
        	 'fixed' => false,
        	 'unsigned' => false,
        	 'values' =>
        	 array(
        		0 => '1',
        		1 => '2',
        	 ),
        	 'primary' => false,
        	 'notnull' => false,
        	 'autoincrement' => false,
        	 ));        
        $this->hasColumn('required_hospiz_treatment_justification', 'text', null, array(
             'type' => 'text',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('required_hospiz_regist_current_trend_change', 'text', null, array(
             'type' => 'text',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('home_palliative_treatment_plan', 'enum', 3, array(
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
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('home_current_therapies', 'text', null, array(
             'type' => 'text',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('pain_therapy_already_started', 'enum', 3, array(
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
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('pain_therapy_expected', 'enum', 3, array(
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
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('symptom_control_crisis_intervention', 'enum', 3, array(
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
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('psychosocial_or_pastoral_support', 'enum', 3, array(
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
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('special_wound_care', 'enum', 3, array(
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
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('signs_of_infectious_diseases', 'enum', 3, array(
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
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('other_palliative_needs', 'text', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('form_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('hospice_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('expected_recording_date', 'timestamp', null, array(
             'type' => 'timestamp',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('hospice_address', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('contact_for_inquiries_name', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('contact_for_inquiries_tel', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('medical_prescription_attached', 'enum', 3, array(
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
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('outpatient_or_semistationary_care_alternatif', 'enum', 3, array(
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
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('required_longterm_care_insurance_based', 'enum', 3, array(
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
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('receiving_or_entitled_careservices', 'enum', 3, array(
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
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('stufe_text', 'string', 255, array(
        		'type' => 'string',
        		'length' => 255,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        $this->hasColumn('receiving_or_entitled_careservices_from', 'object', null, array(
        		'type' => 'object',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => false,
        		'default' => NULL,
        ));
        $this->hasColumn('careservice_name_address', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('insured_consent_for_signature', 'enum', 3, array(
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
             'notnull' => true,
             'autoincrement' => false,
             ));
        /*$this->hasColumn('isdelete', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
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
             ));*/


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
        
        $this->actAs(new Timestamp());
        
        $this->actAs(new Softdelete());
        
    }
}