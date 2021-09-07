<?php

/**
 * PatientNutritionalStatus
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-09-21)
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientNutritionalStatus extends BasePatientNutritionalStatus
{
	/**
	 * define the FORMID and FORMNAME, if you want to piggyback some triggers
	 * @var unknown
	 */
	const TRIGGER_FORMID    = null;
	const TRIGGER_FORMNAME  = 'frmPatientNutritionalStatus_ispc2262';
	
	/**
	 * insert into patient_files will use this
	 */
	const PATIENT_FILE_TABNAME  = 'PatientNutritionalStatus_ispc2262';
	const PATIENT_FILE_TITLE    = 'PatientNutritionalStatus_PDF 2018'; //this will be translated
	
	/**
	 * insert into patient_course will use this
	 */
	const PATIENT_COURSE_TITLE_CREATE = 'MUST Formular hinzugefügt';
	const PATIENT_COURSE_TITLE_EDIT = 'MUST Formular wurde editiert';
	const PATIENT_COURSE_TITLE_SAVE = 'MUST Formular wurde erstellt';
	const PATIENT_COURSE_TABNAME    = 'PatientNutritionalStatus';
	const PATIENT_COURSE_TABNAME_SAVE    = 'PatientNutritionalStatus_save';
	const PATIENT_COURSE_TYPE       = 'F';
	
	public function findOrCreateOneByIdAndIpid($id = 0 , $ipid = '', array $data = array(), $hydrationMode = Doctrine_Core::HYDRATE_RECORD)
	{
		if ( empty($id) && !$entity = $this->findOneByIpid($ipid)) {
	
			//$entity = $this->getTable()->create();
			//$entity->ipid = $ipid;
			//$entity->save();
			return;
		}
		else 
		{		
		//else 
		//{
			//$entity =  new Doctrine_Collection('KinderSapvHospiz');
			//$entity->toArray();
			//$entity->synchronizeWithArray($data);
			//$entity->save();
		//}
	//print_r($entity); exit;
		//unset($data[$this->getTable()->getIdentifier()]);
	
		//$entity->fromArray($data); //update
	
		 //at least one field must be dirty in order to persist
		
			return $entity;
		}
	}
	
	
	
	/**
	 * @claudiu
	 * @param string $ipid
	 * @param unknown $hydrationMode
	 * @return void|Ambigous <Doctrine_Collection, multitype:>
	 */
	public function findByIpid( $ipid = '', $hydrationMode = Doctrine_Core::HYDRATE_ARRAY )
	{
		if (empty($ipid) || ! is_string($ipid)) {
	
			return;
	
		} else {
			return $this->getTable()->findBy('ipid', $ipid, $hydrationMode);
	
		}
	}
	
	/**
	 * @claudiu
	 * @param string $ipid
	 * @param unknown $hydrationMode
	 * @return void|Ambigous <Doctrine_Collection, multitype:>
	 */
	
	public function findOneByIpid( $ipid = '', $hydrationMode = Doctrine_Core::HYDRATE_ARRAY )
	{
		if (empty($ipid) || ! is_string($ipid)) {
	
			return;
	
		} else {
			return $this->getTable()->createQuery('mts')
			->where('ipid = ?')
			->orderBy('id DESC') // just in case the delete is not ok
			->limit(1)
			->fetchOne(array($ipid), $hydrationMode);
		}
	}

}