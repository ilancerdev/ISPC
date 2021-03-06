<?php

/**
 * MedicationFrequency
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-09-13)
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class MedicationFrequency extends BaseMedicationFrequency
{
	/**
	 * define the FORMID and FORMNAME, if you want to piggyback some triggers
	 * @var unknown
	 */
	const TRIGGER_FORMID    = null;
	const TRIGGER_FORMNAME  = '';
	
	public function findOrCreateOneById($id = 0 , array $data = array(), $save = false, $hydrationMode = Doctrine_Core::HYDRATE_RECORD)
	{		
		if($save)
		{
			$primaryKey = $this->getTable()->getIdentifier();
			
			/*
			 * do not allow to overwrite the $primaryKey
			 */
			if (isset($data[$primaryKey])) {
				unset($data[$primaryKey]);
			}
			
			/*
			 * prevent changes to fields populated by Timestamp Listener
			 */
			if (isset($data['create_date']) || isset($data['change_date']) || isset($data['create_user']) || isset($data['change_user'])) {
				unset($data['create_date'], $data['change_date'], $data['create_user'], $data['change_user']);
			}
			
			
			if ( empty($id)) {
			
				$entity = $this->getTable()->create();
			
				$entity->assignDefaultValues(false);
			
			} else {
				/*
				 * this is an update of $entity
				 */
				$entity = $this->getTable()->findOneBy('id', $id, Doctrine_Core::HYDRATE_RECORD);
			}
			
			
			
			
			//$this->_encryptData($data); // encrypt model->_encypted_columns
			
			//TODO maybe add a check ??? empty($data) is_array($data) count($data, COUNT_RECURSIVE)) ... what?
			$entity->fromArray($data); //update
			
			
			$entity->save(); //at least one field must be dirty in order to persist
			 
			return $entity;
		}
		else 
		{
			if ( !empty($id))
			{
				$entity = $this->getTable()->findOneBy('id', $id, Doctrine_Core::HYDRATE_RECORD);
				return $entity;
			}
			else
			{
				return;
			}
		}
	}
	
	public function client_medication_frequency($clientid = null, $allow_extra = false)
	{
	    
	    // ISPC-2612 Ancuta 01.07.2020
	    $client_is_follower = ConnectionMasterTable::_check_client_connection_follower('MedicationFrequency', $clientid);
	    // --
	    
		$actions_sql = Doctrine_Query::create()
		->select('*')
		->from('MedicationFrequency')
		->where('clientid =?', $clientid);
		if($client_is_follower){
		    $actions_sql->andWhere('connection_id is NOT null');
		    $actions_sql->andWhere('master_id is NOT null');
		}
		if( ! $allow_extra){ //ISPC-2247
			$actions_sql->andWhere('extra = 0'); 
		}
		
		$actionsarray = $actions_sql->fetchArray();
	
		if($actionsarray)
		{
			return $actionsarray;
		}
	}

}