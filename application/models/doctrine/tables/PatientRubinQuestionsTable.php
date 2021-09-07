<?php

/**
 * PatientRubinQuestionsTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @method createIfNotExistsOneBy($fieldName, $value = null, array $data = array())
 * @method findOrCreateOneBy($fieldName, $value = null, array $data = array())
 * 
 * @package    ISPC
 * @subpackage Application (2019-04-12)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 * Demstepcare_upload - 10.09.2019 Ancuta
 */
class PatientRubinQuestionsTable extends Pms_Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return PatientRubinQuestionsTable (object)
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('PatientRubinQuestions');
    }
    
 
    
    /**
     * Ancuta
     * 12.04.2019
     * @param string $form_id
     * @param string $question_id
     * @return void|Ambigous <multitype:, Doctrine_Collection>
     */
    public static function find_questions($form_id = "", $question_id = false)
    {
        
        
        if (empty($form_id)) {
            return;
        }
        $q = self::getInstance()->createQuery('q')
        ->select('q.*,opt.*')
        ->where('form_id =?', $form_id);
    
        if(!empty($question_id)){
//             $q->andWhere('poa.id =? ', $question_id);
        }
    
        $q->leftJoin('q.PatientRubinQuestionsOptions as opt ON q.form_id = opt.form_id and q.question_id = opt.question_id');
        $q->orderBy('q.question_order');
        $result = $q->fetchArray();
    
    
        return $result;
    }
    
    public static function find_form_questions($form_id = "")
    {
        
        
        if (empty($form_id)) {
            return;
        }
        $q = self::getInstance()->createQuery('q')
        ->select('q.*')
        ->where('form_id =?', $form_id)
        ->orderBy('question_order ASC');
        
        $result = $q->fetchArray();
    
    
        return $result;
    }
    
    
    
    
}