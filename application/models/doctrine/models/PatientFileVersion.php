<?php

/**
 * PatientFileVersion
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-11-29)
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientFileVersion extends BasePatientFileVersion
{
	public function get_reset_active_version($ipids, $get = false)
	{
		if(is_array($ipids))
		{
			$ipids_arr = $ipids;
		}
		else 
		{
			$ipids_arr = array($ipids);
		}
		
		$actv = new PatientFileVersion();
		$q = Doctrine_Query::create()
		->select('pv.*, pfup.ipid')
		->from('PatientFileVersion pv')
		->leftJoin('pv.PatientFileUpload pfup')
		->whereIn ('pfup.ipid', $ipids_arr)
		->andWhere('pv.file = pfup.id')
		->andWhere('pv.active_version = 1')
		->fetchArray();
		
		if(!$get)
		{
			if($q)
			{
				$recactv = $actv->getTable()->find($q[0]['id'], Doctrine_Core::HYDRATE_RECORD);
				$recactv->active_version = '0';
				$recactv->save();
			}
		}
		else 
		{
			return $q;
		}
	}
}