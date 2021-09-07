<?php

	abstract class BasePriceBreHospiz extends Doctrine_Record {

		function setTableDefinition()
		{
			$this->setTableName('price_bre_hospiz');
			$this->hasColumn('id', 'integer', 11, array('type' => 'integer', 'length' => 11, 'primary' => true, 'autoincrement' => true));
			$this->hasColumn('list', 'integer', 11, array('type' => 'integer', 'length' => 11));
			$this->hasColumn('clientid', 'integer', 11, array('type' => 'integer', 'length' => 11));
			$this->hasColumn('shortcut', 'string', 255, array('type' => 'string', 'length' => 255));
			$this->hasColumn('price', 'decimal', 10, array('scale' => 2));
			$this->hasColumn('dta_id', 'string', 255, array('type' => 'string', 'length' => 255));
		}

	}

?>