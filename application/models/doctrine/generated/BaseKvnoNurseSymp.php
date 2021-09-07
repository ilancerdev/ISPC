<?php

	abstract class BaseKvnoNurseSymp extends Doctrine_Record {

		function setTableDefinition()
		{
			$this->setTableName('kvno_nurse_symptomatology');
			$this->hasColumn('id', 'integer', 8, array('type' => 'integer', 'length' => 8, 'primary' => true, 'autoincrement' => true));
			$this->hasColumn('ipid', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('kdf_id', 'integer', 11, array('type' => 'integer', 'length' => 11));
			$this->hasColumn('symp_id', 'integer', 11, array('type' => 'integer', 'length' => 11));
			$this->hasColumn('last_value', 'integer', 11, array('type' => 'integer', 'length' => 11));
			$this->hasColumn('current_value', 'integer', 11, array('type' => 'integer', 'length' => 11));
			$this->hasColumn('comment', 'text', NULL, array('type' => 'text', 'length' => NULL));
		}

		function setUp()
		{

			$this->hasOne('KvnoNurse', array(
				'local' => 'kdf_id',
				'foreign' => 'id'
			));

			$this->hasOne('SymptomatologyValues', array(
				'local' => 'symp_id',
				'foreign' => 'id'
			));
		}

	}

?>