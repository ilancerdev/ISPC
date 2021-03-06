<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('FtpPutQueue', 'SYSDAT');

/**
 * BaseFtpPutQueue
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $clientid
 * @property enum $parent_table
 * @property integer $parent_table_id
 * @property string $local_file_path
 * @property blob $file_name
 * @property string $file_name_decrypt
 * @property string $legacy_path
 * @property string $ftp_path
 * @property enum $ftp_upload_performed
 * @property integer $ftp_upload_try
 * @property string $controllername
 * @property string $actionname
 * @property enum $foster_file
 * @property integer $isdeleted
 * @property timestamp $change_date
 * @property integer $change_user
 * @property timestamp $create_date
 * @property integer $create_user
 * 
 * @package    ISPC
 * @subpackage Application (2018-08-06)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFtpPutQueue extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('ftp_put_queue');

        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('clientid', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('parent_table', 'enum', 17, array(
             'type' => 'enum',
             'length' => 17,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'PatientFileUpload',
              1 => 'ClientFileUpload',
              2 => 'MemberFiles',
              3 => 'MembersSepaXml',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('parent_table_id', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('local_file_path', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('file_name', 'blob', null, array(
             'type' => 'blob',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        /**
         * column added just in [development]
         */
        if (defined('APPLICATION_ENV') && APPLICATION_ENV == 'development') {
            $this->hasColumn('file_name_decrypt', 'string', 255, array(
                 'type' => 'string',
                 'length' => 255,
                 'fixed' => false,
                 'unsigned' => false,
                 'primary' => false,
                 'notnull' => true,
                 'autoincrement' => false,
                 ));
        }
        $this->hasColumn('legacy_path', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('ftp_path', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('ftp_upload_performed', 'enum', 3, array(
             'type' => 'enum',
             'length' => 3,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'YES',
              1 => 'NO',
             ),
             'primary' => false,
             'default' => 'NO',
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('ftp_upload_try', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('controllername', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('actionname', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('foster_file', 'enum', 3, array(
             'type' => 'enum',
             'length' => 3,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'YES',
              1 => 'NO',
             ),
             'primary' => false,
             'default' => 'NO',
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('isdeleted', 'integer', 4, array(
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
        $this->hasColumn('change_user', 'integer', 8, array(
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
        $this->hasColumn('create_user', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));

        /**
         * column can/will be removed after the MiscController::bugfixftpqueueAction() is run
         */
        $this->hasColumn('bugfix', 'integer', 4, array(
            'type' => 'integer',
            'length' => 4,
            'fixed' => false,
            'unsigned' => false,
            'primary' => false,
            'notnull' => false,
            'autoincrement' => false,
        ));
        
        

        $this->index('clientid', array(
             'fields' => 
             array(
              0 => 'clientid',
             ),
             ));
        $this->index('ftp_upload_performed', array(
             'fields' => 
             array(
              0 => 'ftp_upload_performed',
             ),
             ));
        $this->index('parent_table', array(
             'fields' => 
             array(
              0 => 'parent_table',
             ),
             ));
        $this->index('parent_table_id', array(
             'fields' => 
             array(
              0 => 'parent_table_id',
             ),
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
        $this->actAs(new Timestamp());
        
        /**
         * link a FtpPutQueue record -> to this model's primaryKey
         * @see FtpPutQueue2RecordListener
         * !!! if you add more listeneres ... please check, maybe you need to disable them in this listener(modify this)
        */
        $this->addListener(new FtpPutQueue2RecordListener(), 'FtpPutQueue2RecordListener');
        
    }
}

?>