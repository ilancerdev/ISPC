<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('InvoicejournalExportFiles', 'SYSDAT');

/**
 * BaseInvoicejournalExportFiles
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $clientid
 * @property enum $export_type
 * @property string $export_content
 * @property string $export_invoices
 * @property string $export_request
 * @property string $invoice_type
 * @property integer $isdelete
 * @property integer $create_user
 * @property timestamp $create_date
 * @property integer $change_user
 * @property timestamp $change_date
 * 
 * changes made for ISPC-2452
 * @package    ISPC
 * @subpackage Application (2018-07-26)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseInvoicejournalExportFiles extends Pms_Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('invoicejournal_export_files');
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
        $this->hasColumn('export_type', 'enum', 8, array(
             'type' => 'enum',
             'length' => 8,
             'fixed' => false,
             'unsigned' => false,
             'values' => 
             array(
              0 => 'csv',
              1 => 'csv_v2',
              2 => 'nie_csv',
              3 => 'sap_txt',
              4 => 'unna_csv',          
              5 => 'e_s_csv',       //ISPC-2505 Lore 17.12.2019
              6 => 'pdf',
              7 => 'sh_txt',
              8 => 'sh_external_txt',
              9 => 'sap_ii_txt',
             ),
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('export_content', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('export_invoices', 'string', null, array(
             'type' => 'string',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
//         $this->hasColumn('export_request', 'string', null, array(
//              'type' => 'string',
//              'fixed' => false,
//              'unsigned' => false,
//              'primary' => false,
//              'notnull' => true,
//              'autoincrement' => false,
//              ));
//         $this->hasColumn('invoice_type', 'string', 255, array(
//              'type' => 'string',
//              'length' => 255,
//              'fixed' => false,
//              'unsigned' => false,
//              'primary' => false,
//              'notnull' => false,
//              'autoincrement' => false,
//              ));
        $this->hasColumn('isdelete', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
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
        $this->hasColumn('change_user', 'integer', 8, array(
             'type' => 'integer',
             'length' => 8,
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
    }

    public function setUp()
    {
        parent::setUp();
        
        $this->actAs(new Timestamp());
        
        $this->actAs(new Softdelete());
        
        $this->hasMany('InvoicejournalExportInvoices', array(
            'local' => 'id',
            'foreign' => 'export_file_id',
            'cascade'     => array('delete')
        ));
        
        
        
    }
}