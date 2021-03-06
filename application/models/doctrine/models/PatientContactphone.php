<?php

/**
 * PatientContactphone
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2017-08-14)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientContactphone extends BasePatientContactphone
{
		
	private static $mandatory_columns = array(
			'ipid',
			'parent_table',
			'table_id',
	);
	
	public function set_new_record($params = array())
	{
	
		if (empty($params) || !is_array($params)) {
			return false;// something went wrong
		}
	
		foreach (self::$mandatory_columns as $column) {
	
			if ( empty($params[$column]) &&  empty($this->{$column}) )
			{
				return false;
			}
		}
	
		foreach ($params as $k => $v)
			if (isset($this->{$k})) {
				$this->{$k} = $v;
			}
	
		$this->save();

		return $this->id;
	
	}
	
	
	public function delete_row( $id = null )
	{
		if (( ! is_null($id)) && ($obj = $this->getTable()->find($id)))
		{
			$obj->delete();
			return true;
	
		} else {
			return false;
		}
	}
	

	/**
	 * will return as array[ipid][row]
	 * 
	 * Aug 22, 2017 @claudiu 
	 * 
	 * @param array(string) $ipid
	 * @return Ambigous <multitype:, boolean, Doctrine_Collection>
	 */
	public function getByIpid( $ipid = array()) {
		
		$result = false;
		
		if ( empty($ipid) || ! is_array($ipid)) {
			return $result;
		}
		
		$q = $this->getTable()->createQuery()
// 		->select('*') //optional select for readability
		->whereIn("ipid", $ipid)
		->fetchArray();
		
		
		if ($q) {
			
			$result = array();
			
			foreach ($q as $row) {
				
				$result[$row['ipid']][] = $row;
			}
				
		}
		
		return $result;		
		
	}
}