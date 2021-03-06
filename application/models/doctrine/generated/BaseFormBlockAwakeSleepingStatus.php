<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('FormBlockAwakeSleepingStatus', 'MDAT');

/**
 * BaseFormBlockAwakeSleepingStatus
 * #ISPC-2512PatientCharts
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $ipid
 * @property integer $contact_form_id
 * @property enum $source
 * @property timestamp $status_date
 * @property enum $awake_sleep_status
 * //ISPC-2661 pct.13 Carmen 09.09.2020
 * @property timestamp $form_start_date
 * @property timestamp $form_end_date
 * @property integer $isenduncertain
 * //--
 * @property integer $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * @package    ISPC
 * @subpackage Application (2020-04-09) ISPC-2516
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFormBlockAwakeSleepingStatus extends Pms_Doctrine_Record
{
	/**
	 * default when inserting into patient_course
	 */
	const PATIENT_COURSE_TYPE       = 'K';
	
    public function setTableDefinition()
    {
        $this->setTableName('form_block_awake_sleeping_status');
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
        $this->hasColumn('contact_form_id', 'integer', 8, array(
        		'type' => 'integer',
        		'length' => 8,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => false,
        		'autoincrement' => false,
        ));
        $this->hasColumn('source', 'enum', 3, array(
        		'type' => 'enum',
        		'length' => 3,
        		'fixed' => false,
        		'unsigned' => false,
        		'values' =>
        		array(
        				0 => 'cf',
        				1 => 'charts',
        		),
        		'primary' => false,
        		'default' => null,
        		'notnull' => true,
        		'autoincrement' => false,
        ));
        //ISPC-2661 pct.13 Carmen 09.09.2020
        /* $this->hasColumn('status_date', 'timestamp', null, array(
        		'type' => 'timestamp',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => false,
        		'autoincrement' => false,
        )); */
        //--
        $this->hasColumn('awake_sleep_status', 'enum', 3, array(
             'type' => 'enum',
             'length' => 3,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'awake',
              1 => 'sleeping',
             ),
             'primary' => false,
             'default' => null,
             'notnull' => true,
             'autoincrement' => false,
             ));
        //ISPC-2661 pct.13 Carmen 09.09.2020
        $this->hasColumn('form_start_date', 'timestamp', null, array(
        		'type' => 'timestamp',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => false,
        		'autoincrement' => false,
        ));
        $this->hasColumn('form_end_date', 'timestamp', null, array(
        		'type' => 'timestamp',
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => false,
        		'autoincrement' => false,
        ));
        $this->hasColumn('isenduncertain', 'integer', 4, array(
        		'type' => 'integer',
        		'length' => 4,
        		'fixed' => false,
        		'unsigned' => false,
        		'primary' => false,
        		'notnull' => false,
        		'autoincrement' => false,
        ));
        //--
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
        
        /*
         * disabled by default, because it was created JUST for inserts from the Kontaktformular
         */
        $this->addListener(new PostInsertWriteToPatientCourseListener(array(
            "disabled"      => true,
            "course_title"  => static::PATIENT_COURSE_TITLE,
            "tabname"       => static::PATIENT_COURSE_TABNAME,
            "course_type"   => static::PATIENT_COURSE_TYPE,
            //"done_name"     => static::PATIENT_COURSE_DONE_NAME,
        )), 'PostInsertWriteToPatientCourse');
        
    }
}