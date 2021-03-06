<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('FormBlockCustom', 'MDAT');

/**
 * BaseFormBlockCustom
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $contact_form_id
 * @property string $ipid
 * @property string $block_abbrev
 * @property integer $isdelete
 * @property blob $block_content
 * @property integer $create_user
 * @property timestamp $create_date
 * @property timestamp $change_date
 * @property integer $change_user
 * 
 * @package    ISPC
 * @subpackage Application (2019-09-16)
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * ISPC-2454 
 */ 
abstract class BaseFormBlockCustom extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('form_block_custom');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('contact_form_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
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
       $this->hasColumn('block_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('block_content', 'object', null, array(
             'type' => 'object',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));

        $this->index('contact_form_id', array(
             'fields' => 
             array(
              0 => 'contact_form_id',
             ),
             ));
        $this->index('block_id', array(
        		'fields' =>
        		array(
        				0 => 'contact_form_id',
        		),
        ));
        $this->index('isdelete', array(
             'fields' => 
             array(
              0 => 'isdelete',
             ),
             ));
        $this->index('ipid', array(
             'fields' => 
             array(
              0 => 'ipid',
             ),
             ));
    }    
            

    public function setUp()
    {
        parent::setUp();
        
        $this->hasOne('ContactForms', array(
            'local' => 'contact_form_id',
            'foreign' => 'id'
        ));
        
        $this->hasOne('FormBlockCustomSettings', array(
        		'local' => 'block_id',
        		'foreign' => 'id'
        ));
        
        /*
         *  auto-added by builder
         */
        $this->actAs(new Softdelete());
            
        /*
         *  auto-added by builder
         */
        $this->actAs(new Timestamp());

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