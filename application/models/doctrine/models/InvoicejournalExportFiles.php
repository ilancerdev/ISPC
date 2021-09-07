<?php

/**
 * InvoicejournalExportFiles
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-07-26)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class InvoicejournalExportFiles extends BaseInvoicejournalExportFiles
{

    /**
     * 
     * @param string $id
     * @param unknown $hydrationMode
     * @return void|Ambigous <Doctrine_Collection, multitype:>
     */
    public function findById( $id = '', $hydrationMode = Doctrine_Core::HYDRATE_ARRAY )
    {
        if (empty($id) || !is_string($id)) {
    
            return;
    
        } else {
            return $this->getTable()->findBy('id', $id, $hydrationMode);
    
        }
    }
    
    /**
     * 
     * @param string $id
     * @param unknown $hydrationMode
     * @return void|mixed
     */
    
    public function findOneByIdAndClientid( $id = '',$clientid = '', $hydrationMode = Doctrine_Core::HYDRATE_ARRAY )
    {
        if (empty($id) || ! is_string($id) || empty($clientid) || ! is_string($clientid)   ) {
    
            return;
    
        } else {
            return $this->getTable()->createQuery()
            ->where('id = ?')
            ->limit(1)
            ->fetchOne(array($id), $hydrationMode);
        }
    }
    
    /**
     * 
     * @param string $id
     * @param number $clientid
     * @return boolean
     */
    public function delete_row( $id = null ,$clientid = 0 )
    {
        if (( ! is_null($id)) && ($obj = $this->getTable()->findOneByIdAndClientid($id,$clientid)))
        {
            $obj->delete();
            return true;
    
        } else {
            return false;
        }
    }
    
}