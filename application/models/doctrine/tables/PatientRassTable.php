<?php // ISPC-2564 Andrei 26.05.2020

/**
 * PatientRassTable 
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2020-05-25)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientRassTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return PatientRassTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PatientRass');
    }
    
    public static function getAllPatientRass($ipids = array())
    {
    	$result = array();
    
    	if (empty($ipids) || ! is_array($ipids)){
    		return $result;
    	}
    
    	$logininfo = new Zend_Session_Namespace('Login_Info');
    	$hidemagic = Zend_Registry::get('hidemagic');
    
    	$sql = "*";
    
    	$drop = Doctrine_Query::create()
    	->select($sql)
    	->from('PatientRass')
    	->whereIn("ipid", $ipids);
    
    	$drop->orderby('form_date ASC');
    	$droparray = $drop->fetchArray();
    
    	foreach ($droparray as $row) {
    		$result[ $row['ipid'] ] [] = $row;
    	}
    
    	return $result;
    }
    
    public static function get_patients_chart($ipids, $period = false)
    {
    	if ( empty($ipids)) {
    		return;
    	}
    
    	if( ! is_array($ipids))
    	{
    		$ipids = array($ipids);
    	}
    	else
    	{
    		$ipids = $ipids;
    	}
    	 
    	$sql_period_params = array();
    
    	if($period)
    	{
    		// 		        $sql_period = ' AND DATE(form_date) != "1970-01-01"  AND DATE(form_date) BETWEEN DATE("'.$period['start'].'") AND  DATE("'.$period['end'].'") ';
    
    		$sql_period = ' (DATE(form_date) != "1970-01-01" AND DATE(form_date) BETWEEN DATE(?) AND DATE(?) ) ';
    
    		$sql_period_params = array( $period['start'], $period['end'] );
    	}
    	else
    	{
    		$sql_period = ' DATE(form_date) != "1970-01-01"  ';
    	}
    
    	$patient = Doctrine_Query::create()
    	->select('*')
    	->from('PatientRass')
    	//->where('isdelete= "0" ')
    	->andWhereIn('ipid', $ipids)
    	->orderBy('form_date ASC');
    
    	if ( ! empty($sql_period)) {
    		$patient->andWhere( $sql_period , $sql_period_params);
    	}
    
    
    	$patientlimit = $patient->fetchArray();
    
    	$info_chart = array();
    
    	foreach($patientlimit as $key_cf  => $val_cf)
    	{
    		$info_chart[$val_cf['ipid']][$key_cf]['responsiveness'] = $val_cf['responsiveness'];
    		$info_chart[$val_cf['ipid']][$key_cf]['date'] = date('d.m.Y', strtotime($val_cf['form_date']));
    	}
    
    	return $info_chart;
    }
}