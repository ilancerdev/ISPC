<?php

/**
 * SgbxiFormsSignaturePdf
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class SgbxiFormsSignaturePdf extends BaseSgbxiFormsSignaturePdf
{

	public function getMonth($ipid = '', $month ='')
	{
		$q = $this->getTable()->createQuery()
		->select('*')
		->where("ipid = ?", $ipid)
		->andWhere("isdelete = 0")
		->andWhere("DATE_FORMAT(form_day, \"%Y-%m\") = ?", $month)
		->orderBy("selected_hour,groupid,actionid ASC")
		->fetchArray();

		return $this->_formatResult($q);
	}
	
	
	private function _formatResult( $rows = array())
	{
		if( empty($rows) || ! is_array($rows)) {
			return false;
		}
		
		$data = array();
		$days = array();
		
		foreach($rows as $row) {
			
			$days[$row['groupid']][$row['actionid']] [$row['form_day']] = $row['form_value'];
			$row['data'] = $days[$row['groupid']][$row['actionid']];
			$data[$row['groupid']][$row['actionid']] = $row;
		}
		
		return $data;	
	}
	
	
	public function findLastMonth($ipid = '', $month ='') 
	{
		$result = false;
		
		$q = $this->getTable()->createQuery()
		->select('id, DATE_FORMAT(form_day, \'%Y-%m\') AS last_available_month')
		->where("ipid = ?", $ipid)
		->andWhere("isdelete = 0")
		->andWhere("DATE_FORMAT(form_day, \"%Y-%m\") <= ?", $month)
		->orderBy("form_day DESC")
		->limit(1)
		->fetchOne(null, Doctrine_Core::FETCH_ASSOC);
		
		if( ! empty($q)) {
			$result = $q['last_available_month'];
		}
		return $result;
	}
}