<?php

/**
 * CrisisMedicationMaster
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-09-13)
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class CrisisMedicationMaster extends BaseCrisisMedicationMaster
{
	/**
	 * define the FORMID and FORMNAME, if you want to piggyback some triggers
	 * @var unknown
	 */
	const TRIGGER_FORMID    = null;
	const TRIGGER_FORMNAME  = '';
	
	public function get_crisis_medication_sets($clientid = null)
	{
		$actions_sql = Doctrine_Query::create()
		->select('*')
		->from('CrisisMedicationMaster')
		->where('clientid =?', $clientid);
	
		$actionsarray = $actions_sql->fetchArray();
	
		if($actionsarray)
		{
			return $actionsarray;
		}
	}
	
	public function getcrisismedicationDrop($clientid)
	{
		$Tr = new Zend_View_Helper_Translate();
		$drop = Doctrine_Query::create()
		->select("*")
		->from('CrisisMedicationMaster')
		->where("clientid=?", $clientid)
		->andWhere("isdelete=0");
		$loc = $drop->execute();
	
		if($loc)
		{
			$livearr = $loc->toArray();
			$locations = array("" => $Tr->translate('select'));
	
			foreach($livearr as $location)
			{
				$locations[$location[id]] = $location['title'];
			}
	
			return $locations;
		}
	}

}