<?php

/**
 * BesdCategoryScores
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-09-03)
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class BesdCategoryScores extends BaseBesdCategoryScores
{
	/**
	 * define the FORMID and FORMNAME, if you want to piggyback some triggers
	 * @var unknown
	 */
	const TRIGGER_FORMID    = null;
	const TRIGGER_FORMNAME  = '';
	
	public function get_besd_category_scores()
	{
		$actions_sql = Doctrine_Query::create()
		->select('*')
		->from('BesdCategoryScores')
		->orderBy('catorder, score');
	
		$actionsarray = $actions_sql->fetchArray();
	
		if($actionsarray)
		{
			return $actionsarray;
		}
	}

}