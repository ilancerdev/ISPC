<?php

/**
 * PatientMobility2
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2017-11-21)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientMobility2 extends BasePatientMobility2
{
    
    public static function getEnumValuesDefaults()
    {
        $result = array();
        
        $tr = self::translate('Form_PatientMobility2');
    
        $enum = Doctrine_Core::getTable('PatientMobility2')->getEnumValues('selected_value');
        
        foreach ($enum as $val) {
            $result[$val] =  isset($tr[$val]) ? $tr[$val] : $val;
        }
    
        return $result;
    }

    
    
    public function findOrCreateOneBy($fieldName, $value, array $data = array(), $hydrationMode = Doctrine_Core::HYDRATE_RECORD)
    {
        if ( is_null($value) || ! $entity = $this->getTable()->findOneBy($fieldName, $value, $hydrationMode)) {
            $entity = $this->getTable()->create(array( $fieldName => $value));
        }
    
        $entity->fromArray($data); //update
    
        $entity->save(); //at least one field must be dirty in order to persist
    
        return $entity;
    }
    
    
    
    /**
     *
     * @param string|array $ipid
     * @param int $hydrationMode
     */
    public function findByIpid( $ipid = '', $hydrationMode = Doctrine_Core::HYDRATE_ARRAY )
    {
        if (empty($ipid) || !is_string($ipid)) {
    
            return;
    
        } else {
            return $this->getTable()->findBy('ipid', $ipid, $hydrationMode);
    
        }
    }
    
    
    
    /**
     * ISPC-2614 Ancuta 16.07.2020
     * @param unknown $ipid
     * @param unknown $target_ipid
     * @return number
     */
    public function clone_record($ipid, $target_ipid)
    {
        $master_data = $this->findByIpid($ipid);
        
        if($master_data)
        {
            foreach($master_data as $k_master_data => $v_master_data)
            {
                $cust = new PatientMobility2();
                $cust->ipid = $target_ipid;
                $cust->selected_value = $v_master_data['selected_value'];
                $cust->comment = $v_master_data['comment'];
                $cust->save();
                return $cust->id;
                
            }
        }
    }
    
}