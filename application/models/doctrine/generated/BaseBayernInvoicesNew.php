<?php

	abstract class BaseBayernInvoicesNew extends Doctrine_Record {

		function setTableDefinition()
		{
			$this->setTableName('bayern_invoices_new');
			$this->hasColumn('id', 'bigint', 20, array('type' => 'bigint', 'length' => 20, 'primary' => true, 'autoincrement' => true));
			$this->hasColumn('invoice_start', 'datetime', NULL, array('type' => 'datetime', 'length' => NULL));
			$this->hasColumn('invoice_end', 'datetime', NULL, array('type' => 'datetime', 'length' => NULL));
			$this->hasColumn('invoiced_month', 'datetime', NULL, array('type' => 'datetime', 'length' => NULL));
			$this->hasColumn('start_active', 'datetime', NULL, array('type' => 'datetime', 'length' => NULL));
			$this->hasColumn('end_active', 'datetime', NULL, array('type' => 'datetime', 'length' => NULL));
			$this->hasColumn('start_sapv', 'datetime', NULL, array('type' => 'datetime', 'length' => NULL));
			$this->hasColumn('end_sapv', 'datetime', NULL, array('type' => 'datetime', 'length' => NULL));
			$this->hasColumn('sapv_approve_date', 'datetime', NULL, array('type' => 'datetime', 'length' => NULL));
			$this->hasColumn('sapv_approve_nr', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('ipid', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('first_name', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('last_name', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('birthdate', 'date', NULL, array('type' => 'date', 'length' => NULL));
			$this->hasColumn('beneficiary_address', 'text', NULL, array('type' => 'text', 'length' => NULL));
			$this->hasColumn('patient_care', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('insurance_no', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('client', 'int', 11, array('type' => 'bigint', 'length' => 11));
			$this->hasColumn('client_ik', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('prefix', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('invoice_number', 'int', 11, array('type' => 'int', 'length' => 11));
			$this->hasColumn('invoice_total', 'int', 11, array('type' => 'ingeger', 'length' => 11));
			$this->hasColumn('paid_date', 'datetime', NULL, array('type' => 'datetime', 'length' => NULL));
			$this->hasColumn('status', 'int', 1, array('type' => 'integer', 'length' => 1));
			$this->hasColumn('address', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('footer', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('sapvid', 'int', 11, array('type' => 'integer', 'length' => 11));
			$this->hasColumn('admissionid', 'int', 11, array('type' => 'integer', 'length' => 11));
			$this->hasColumn('debtor_number', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('ppun', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('paycenter', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('tabname', 'enum', null, array('type' => 'enum', 'notnull' => true, 'values' => array('invoice', 'paidback'), 'default' => 'invoice'));
			$this->hasColumn('isdelete', 'int', 1, array('type' => 'string', 'length' => 1));
			$this->hasColumn('isarchived', 'int', 1, array('type' => 'string', 'length' => 1));
			$this->hasColumn('record_id', 'int', 11, array('type' => 'string', 'length' => 11));
			$this->hasColumn('storno', 'int', 1, array('type' => 'string', 'length' => 1));
			$this->hasColumn('completed_date', 'datetime', NULL, array('type' => 'datetime', 'length' => NULL));
			
			//ISPC-2747 Lore 26.11.2020
			$this->hasColumn('show_boxes', 'string', 255, array('type' => 'string', 'length' => 255));
		}

		function setUp()
		{
			$this->actAs(new Timestamp());
			
		}

	}

?>