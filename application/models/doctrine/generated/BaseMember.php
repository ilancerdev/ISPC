<?php

	abstract class BaseMember extends Doctrine_Record {

		function setTableDefinition()
		{
			$this->setTableName('member');
			$this->hasColumn('id', 'bigint', NULL, array('type' => 'bigint', 'length' => NULL, 'primary' => true, 'autoincrement' => true));
			$this->hasColumn('type', 'enum', null, array('type' => 'enum', 'notnull' => false, 'values' => array('person', 'company', 'family')));
			
			// ISPC - 1518
			$this->hasColumn('member_number', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('auto_member_number', 'integer', 1, array('type' => 'integer', 'length' => 1));
			
			$this->hasColumn('member_company', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('title', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('salutation_letter', 'string', 255, array('type' => 'string', 'length' => 255));
			
			// ISPC - 1518
			$this->hasColumn('salutation', 'enum', null, array('type' => 'enum', 'notnull' => false, 'values' => array('', 'Frau','Herr')));
			
			$this->hasColumn('first_name', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('last_name', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('gender', 'integer', 1, array('type' => 'integer', 'length' => 1));
			$this->hasColumn('birthd', 'date', NULL, array('type' => 'date', 'length' => NULL));
			$this->hasColumn('phone', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('private_phone', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('mobile', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('email', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('fax', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('street1', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('street2', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('zip', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('city', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('profession', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('clientid', 'bigint', NULL, array('type' => 'bigint', 'length' => NULL));
			$this->hasColumn('isdelete', 'integer', 1, array('type' => 'integer', 'length' => 1));
			$this->hasColumn('inactive', 'integer', 1, array('type' => 'integer', 'length' => 1));
			$this->hasColumn('inactive_from', 'date', NULL, array('type' => 'date', 'length' => NULL));
			$this->hasColumn('status', 'integer', 11, array('type' => 'integer', 'length' => 11));
			//Bank details
			$this->hasColumn('bank_name', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('bank_account_number', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('bank_number', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('iban', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('bic', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('account_holder', 'string', 255, array('type' => 'string', 'length' => 255));
			
// 			$this->hasColumn('mandate_reference', 'integer', 20, array('type' => 'integer', 'length' => 20));
			$this->hasColumn('mandate_reference', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('mandate_reference_date', 'date', NULL, array('type' => 'date', 'length' => NULL, "default"=>NULL));
			// ISPC - 1518
			$this->hasColumn('remarks', 'text', NULL, array('type' => 'string', 'length' => NULL));
			
			
			$this->hasColumn('img_path', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('vw_id', 'integer', 11, array('type' => 'integer', 'length' => 11));
			//shortcuts
			$this->hasColumn('shortname', 'string', 255, array('type' => 'string', 'length' => 255));
		
			//ISPC-1739
			$this->hasColumn('country', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('website', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('memos', 'text', NULL);
			$this->hasColumn('comments', 'text', NULL);
			$this->hasColumn('family_id', 'bigint', NULL);
			$this->hasColumn('merged_parent', 'bigint', NULL, array('type' => 'bigint', 'length' => NULL));
			$this->hasColumn('merged_slave', 'bigint', NULL, array('type' => 'bigint', 'length' => NULL));
			$this->hasColumn('payment_method_id', 'integer', 11, array('type' => 'integer', 'length' => 11));
			
					
		}

		function setUp()
		{
			$this->hasOne('Client', array(
				'local' => 'id',
				'foreign' => 'clientid'
			));
			
			$this->hasOne('Voluntaryworkers', array(
				'local' => 'vw_id',
				'foreign' => 'id'
			));
			
			$this->hasMany('MemberDonations', array(
				'local' => 'id',
				'foreign' => 'member'
			));
			
			$this->hasMany('Member2Memberships', array(
				'local' => 'id',
				'foreign' => 'member'
			));
			
			$this->hasMany('MembersSepaSettings', array(
					'local' => 'id',
					'foreign' => 'memberid'
			));

			$this->hasOne('MemberReferalTab', array(
					'local' => 'id',
					'foreign' => 'memberid'
			));
			//TODO-2939 Lore 21.02.2020
			$this->hasMany('MembersInvoice', array(
			    'local' => 'id',
			    'foreign' => 'member'
			));
			
			// ISPC-2527 Andrei 29.05.2020
			$this->hasOne('MemberFamily', array(
			    'local' => 'id',
			    'foreign' => 'member_id'
			));
			
			$this->actAs(new Timestamp());
		}

	}

?>