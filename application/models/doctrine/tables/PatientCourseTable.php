<?php

/**
 * PatientCourseTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2019-11-07) - ISPC-2426
 * @author     carmen <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientCourseTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return PatientCourseTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PatientCourse');
    }
    
    /**
     *
     * @param array $ipids
     * @param array $shortcuts
     * @param array $tabname
     * @param mixed $hydrationMode
     * @return void|Doctrine_Collection
     */
    public static function findAllPatientsDeletedShortcutsOrByShortcutsOrbyTabname($ipids = null, $shortcuts = null, $tabname = null, $hydrationMode = Doctrine_Core::HYDRATE_ARRAY)
    {
    
    	if (empty($ipids)) {
    		return; //fail-safe
    	}
    	
    	if(!is_array($shortcuts) && !empty($shortcuts))
    	{
    		$shortcuts = array($shortcuts);
    	}
    
    	if(!is_array($tabname) && !empty($tabname))
    	{
    		$tabname = array($tabname);
    	}
    	
    	$patients_del_shortcuts = self::getInstance()->createQuery('patshdel')
    		->select("patshdel.*, AES_DECRYPT(patshdel.course_type,'" . Zend_Registry::get('salt') . "') as course_type,AES_DECRYPT(patshdel.course_title,'" . Zend_Registry::get('salt') . "') as course_title, AES_DECRYPT(patshdel.tabname,'" . Zend_Registry::get('salt') . "') as tabname")
    		->whereIn('patshdel.ipid', $ipids)
    		->andWhere('patshdel.wrong = "1"');
    	if(!empty($shortcuts))
    	{
    		$patients_del_shortcuts->andWhereIn("AES_DECRYPT(patshdel.course_type,'" . Zend_Registry::get('salt') . "')", $shortcuts);
    	}
    	if(!empty($tabname))
    	{
    		$patients_del_shortcuts->andWhereIn("AES_DECRYPT(patshdel.tabname,'" . Zend_Registry::get('salt') . "')", $tabname);
    	}
    	$pat_wrong_sh = $patients_del_shortcuts->execute(null, $hydrationMode);
    	
    	return $pat_wrong_sh;
    }    
    
    /**
     *
     * @param array $ipids
     * @param array $shortcuts
     * @param mixed $hydrationMode
     * @return void|Doctrine_Collection
     */
    public static function findAllPatientsCourseOrByShortcutsOrNotWrong($ipids = null, $shortcuts = null, $hide_wrong = false, $hydrationMode = Doctrine_Core::HYDRATE_ARRAY)
    {
    	if (empty($ipids)) {
    		return; //fail-safe
    	}
    	 
    	if(!is_array($shortcuts) && !empty($shortcuts))
    	{
    		$shortcuts = array($shortcuts);
    	}
    	
    	$qpa1 = self::getInstance()->createQuery('patsh')
    			->select("patsh.*, AES_DECRYPT(patsh.course_type,'" . Zend_Registry::get('salt') . "') as course_type,AES_DECRYPT(patsh.course_title,'" . Zend_Registry::get('salt') . "') as course_title, AES_DECRYPT(patsh.tabname,'" . Zend_Registry::get('salt') . "') as tabname")
    			->whereIn('patsh.ipid', $ipids)
    			->andWhere('source_ipid = ""')
    			->andWhereIn("AES_DECRYPT(patsh.course_type,'" . Zend_Registry::get('salt') . "')", $shortcuts);
    	if($hide_wrong)
    	{
    		$qpa1->andWhere('patsh.wrong="0"');
    	}
   
    	$pat_xt = $qpa1->execute(null, $hydrationMode);
    	
    	return $pat_xt;
    }
    
    /**
     *
     * @param array $ipids
     * @param array $shortcuts
     * @param mixed $hydrationMode
     * @return void|Doctrine_Collection
     */
    public static function findMrelog($ipids = null, $recordid, $tabname, $hide_wrong = false, $hydrationMode = Doctrine_Core::HYDRATE_ARRAY)
    {
    	if (empty($ipids)) {
    		return; //fail-safe
    	}
    	
    	$qpmre = self::getInstance()->createQuery('patmre')
    	->select("patmre.*, AES_DECRYPT(patmre.course_type,'" . Zend_Registry::get('salt') . "') as course_type,AES_DECRYPT(patmre.course_title,'" . Zend_Registry::get('salt') . "') as course_title, AES_DECRYPT(patmre.tabname,'" . Zend_Registry::get('salt') . "') as tabname")
    	->whereIn('patmre.ipid', $ipids)
    	->andWhere('patmre.source_ipid = ""')
    	->andWhere('patmre.recordid =?', $recordid)
    	->andWhere("AES_DECRYPT(patmre.tabname,'" . Zend_Registry::get('salt') . "') =?", $tabname)
    	->orderBy('patmre.create_date ASC');
    	
    	if($hide_wrong)
    	{
    		$qpmre->andWhere('patmre.wrong="0"');
    	}
    	
    	$pat_mre = $qpmre->execute(null, $hydrationMode);
    	 
    	return $pat_mre;
    }
    
    
}