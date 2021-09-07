<?php

/**
 * FormsEditmodeTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2019-01-18)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class FormsEditmodeTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return FormsEditmodeTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('FormsEditmode');
    }
    
    
    public static function finishedEditing (array $params = [])
    {

        if ($rObj = self::getInstance()->findOrCreateOneBy([
            'pathname', 'client_id', 'patient_master_id', 'user_id' , 'search' , 'is_edited'
        ],[
            $params['pathname'],
            $params['client_id'],
            $params['patient_master_id'],
            $params['user_id'],
            $params['search'],
            $params['is_edited']
        ])) 
        {
        
            $rObj->delete();
            
        }
    }
    
}