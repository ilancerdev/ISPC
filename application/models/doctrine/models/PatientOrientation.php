<?php

/**
 * PatientOrientation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2017-11-20)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientOrientation extends BasePatientOrientation
{
    //radio
    public static function getDefaultOrientation()
    {
        $Tr = new Zend_View_Helper_Translate();
        $lang = $Tr->translate('Form_PatientOrientation2');
        return array(
            'full' => $lang['full'],
            'local disorientation' => $lang['local disorientation'],
            'temporal disorientation' => $lang['temporal disorientation'],
            'Personnel disorientation' => $lang['Personnel disorientation'],
            'situational disorientation' => $lang['situational disorientation'],
            'communication restricted' => $lang['communication restricted'],
        );
         
    }
    
    //cb
    public static function getDefaultCommunicationRestricted()
    {
        $Tr = new Zend_View_Helper_Translate();
        $lang = $Tr->translate('Form_PatientOrientation2');
        return array(
            'linguistically' => $lang['linguistically'],
            'cognitive' => $lang['cognitive'],
            'hearing problems' => $lang['hearing problems'],
        );
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
    
    
    public function findOrCreateOneByIpidAndOrientation($ipid, $orientation, array $data = array(), $hydrationMode = Doctrine_Core::HYDRATE_RECORD)
    {
        if ( is_null($orientation) || ! $entity = $this->getTable()->findOneByIpidAndOrientation($ipid, $orientation)) {
    
            $entity = $this->getTable()->create(array( 'ipid' => $ipid, 'orientation' => $orientation));
    
        }

        unset($data[$this->getTable()->getIdentifier()]); // just in case
    
        $entity->fromArray($data); //update
    
        $entity->save(); //at least one field must be dirty in order to persist
    
        return $entity;
    }
    
}