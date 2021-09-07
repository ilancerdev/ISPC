<?php

/**
 * PatientRubinFormsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2019-05-31)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientRubinFormsTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return PatientRubinFormsTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PatientRubinForms');
    }
    
    /**
     * 
     * @author Ancuta
     * @date 31.05.2019
     * 
     * @param number $ipid
     * @param string $form_type
     * @param number $form_id
     * @return void|mixed
     */
    
    public static function find_patient_form_By_Form_Id($ipid = 0, $form_type = "", $form_id = 0)
    {
        if (empty($ipid) && empty($form_id) && empty($form_type)) {
            return;
        }
        return self::getInstance()->createQuery('prf')
        ->select('prf.*,prfa.*')
        ->where('ipid =?', $ipid)
        ->andWhere('prf.id =? ', $form_id)
        ->andWhere('prf.form_type =? ', $form_type)
        ->leftJoin('prf.PatientRubinFormsAnswers as prfa')
        ->limit(1)
        ->fetchOne(null, Doctrine_Core::HYDRATE_ARRAY);
        ;
    }
    
    /**
     * @author Ancuta
     * @date 31.05.2019
     * 
     * @param number $ipid
     * @param string $form_type
     * @return void|mixed
     * ISPC-2420
     */
    public static function find_form_By_patient($ipid = 0, $form_type = "")
    {
        if (empty($ipid)  && empty($form_type)) {
            return;
        }
        return self::getInstance()->createQuery('prf')
        ->select('prf.*,prfa.*')
        ->where('ipid =?', $ipid)
        ->andWhere('prf.form_type =? ', $form_type)
        ->leftJoin('prf.PatientRubinFormsAnswers as prfa')
        ->limit(1)
        ->orderBy('id DESC')
        ->fetchOne(null, Doctrine_Core::HYDRATE_ARRAY);
        ;
    }
}