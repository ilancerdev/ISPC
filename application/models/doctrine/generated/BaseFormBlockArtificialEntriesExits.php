<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('FormBlockArtificialEntriesExits', 'MDAT');

/**
 * BaseFormBlockArtificialEntriesExits
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $contact_form_id
 * @property integer $patient_option_id
 * @property string $ipid
 * @property enum $option_status
 * @property text $option_comment
 * @property integer $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * @package    ISPC
 * @subpackage Application (2020-01-22) ISPC-2508
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * Ancuta added to Clinic ISPC (CISPC)  on 18.03.2020
 */
abstract class BaseFormBlockArtificialEntriesExits extends Pms_Doctrine_Record
{
	/**
	 * default when inserting into patient_course
	 */
	const PATIENT_COURSE_TYPE       = 'K';
	
    public function setTableDefinition()
    {
        $this->setTableName('form_block_artificial_entries_exits');
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
        $this->hasColumn('artificial_content', 'object', null, array(
        		'type' => 'object',
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