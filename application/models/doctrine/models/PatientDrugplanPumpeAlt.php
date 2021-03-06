<?php

/**
 * PatientDrugplanPumpeAlt
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2021-02-26)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientDrugplanPumpeAlt extends BasePatientDrugplanPumpeAlt
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'patientdrugplanpumpealt_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_patientdrugplanpumpealt';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'PatientDrugplanPumpeAlt';
    const PATIENT_FILE_TITLE    = 'PatientDrugplanPumpeAlt PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'PatientDrugplanPumpeAlt PDF was created';
    const PATIENT_COURSE_TABNAME    = 'patientdrugplanpumpealt';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    
    
    public function get_drug_pumpe_alt($ipid = '', $cocktails_array = array(), $full_details = true)
    {
        if (empty($cocktails_array) || ! is_array($cocktails_array)) {
            return;
        }
        
        
        $drugsc = Doctrine_Query::create()
        ->from('PatientDrugplanPumpeAlt')
        ->whereIn('drugplan_pumpe_id', $cocktails_array)
        ->andWhere('ipid = ?' , $ipid)
        ->andWhere('declined != 1')
        ->andWhere('inactive = 0')
        ->andWhere('approved = 0')
        ->andWhere('isdelete = 0')
        ->orderBy('id ASC');
        
        if($full_details){
            $drugsc->select("*");
        } else {
            $drugsc->select("id, drugplan_pumpe_id, change_source");
        }
        
        $drugcocktails = $drugsc->fetchArray();
        
        
        $drugscocktailsfinal = array();
        if(! empty($drugcocktails))
        {
            
            foreach($drugcocktails as $cocktail)
            {
                if($full_details){
                    
                    if ($cocktail['change_source'] == 'offline'){
                        $drugscocktailsfinal['offline'][$cocktail['drugplan_pumpe_id']][] = $cocktail;
                    } else {
                        $drugscocktailsfinal['online'][$cocktail['drugplan_pumpe_id']] = $cocktail;
                    }
                }
                else
                {
                    $drugscocktailsfinal[] = $cocktail['id'];
                    
                }
            }
        }
        return $drugscocktailsfinal;
    }
    
    public function get_drug_cocktail_details_alt($ipid='', $cocktail = 0, $alt_id = 0)
    {
        //$cocktails_array[] = "9999999999";
        
        $drugsc = Doctrine_Query::create()
        ->select("*")
        ->from('PatientDrugplanPumpeAlt')
        ->where('ipid = ?', $ipid);
        if($cocktail){
            $drugsc->andWhere('drugplan_pumpe_id = ? ', $cocktail);
        }
        if($alt_id){
            $drugsc->andWhere('id = ?',$alt_id);
        }
        $drugsc->andWhere('declined != 1')
        ->andWhere('isdelete = 0')
        ->andWhere('inactive = 0')
        ->andWhere('approved = 0')
        ->orderBy('id ASC');
        $drugcocktails = $drugsc->fetchArray();
        
        if(count($drugcocktails) > 0)
        {
            foreach($drugcocktails as $cocktail)
            {
                $drugscocktailsfinal[$cocktail['drugplan_pumpe_id']] = $cocktail;
            }
        }
        
        return $drugscocktailsfinal;
    }
    
    public function get_declined_drug_pumpe_alt($ipid ='', $cocktails_array = array(), $full_details = true)
    {
        if (empty($cocktails_array) || ! is_array($cocktails_array)) {
            return;
        }
        
        $drugsc = Doctrine_Query::create()
        ->select("*")
        ->from('PatientDrugplanPumpeAlt')
        ->whereIn('drugplan_pumpe_id', $cocktails_array)
        ->andWhere('ipid = ?', $ipid)
        ->andWhere('declined = 1')
        ->andWhere('inactive = 0')
        ->orderBy('id ASC');
        $drugcocktails = $drugsc->fetchArray();
        
        if(count($drugcocktails) > 0)
        {
            foreach($drugcocktails as $cocktail)
            {
                if($full_details)
                {
                    $drugscocktailsfinal[$cocktail['drugplan_pumpe_id']] = $cocktail;
                }
                else
                {
                    $drugscocktailsfinal[] = $cocktail['drugplan_pumpe_id'];
                }
            }
        }
        return $drugscocktailsfinal;
    }
    
    public function get_declined_drug_pumpe_alt_offline($ipid ='', $cocktails_array = array(), $full_details = true)
    {
        if (empty($cocktails_array) || ! is_array($cocktails_array)) {
            return;
        }
        
        $drugsc = Doctrine_Query::create()
        // 		    ->select("*")
        ->from('PatientDrugplanPumpeAlt')
        ->whereIn('drugplan_pumpe_id', $cocktails_array)
        ->andWhere('ipid = ?', $ipid)
        ->andWhere('declined = 1')
        ->andWhere('inactive = 0')
        ->andWhere("change_source = 'offline'")
        ->orderBy('id ASC');
        
        if($full_details){
            $drugsc->select("*");
        } else {
            $drugsc->select("id, drugplan_pumpe_id, change_source");
        }
        $drugcocktails = $drugsc->fetchArray();
        
        if(count($drugcocktails) > 0)
        {
            foreach($drugcocktails as $cocktail)
            {
                if($full_details)
                {
                    $drugscocktailsfinal[$cocktail['drugplan_pumpe_id']] = $cocktail;
                }
                else
                {
                    $drugscocktailsfinal[] = $cocktail['drugplan_pumpe_id'];
                }
            }
        }
        
        return $drugscocktailsfinal;
    }
    
    
    
    public function countDrugsPerCocktail($cocktailids)
    {
        if(count($cocktailids) == 0)
        {
            $cocktailids[] = '999999999';
        }
        
        $drugsc = Doctrine_Query::create()
        ->select("*")
        ->from('PatientDrugPlanAlt')
        ->whereIn("pumpe_id", $cocktailids)
        ->andWhere('isdelete = 0');
        $drugCocktails = $drugsc->fetchArray();
        foreach($drugCocktails as $drug)
        {
            $drugC[$drug['pumpe_id']][] = $drug['id'];
        }
        
        return $drugC;
    }
    
    public function getCocktails($ipid)
    {
        $drugsc = Doctrine_Query::create()
        ->select("*")
        ->from('PatientDrugplanPumpeAlt')
        ->where("ipid = '" . $ipid . "'")
        ->orderBy("id ASC");
        $drugCocktails = $drugsc->fetchArray();
        
        if($drugCocktails)
        {
            return $drugCocktails;
        }
    }
    
    public function clone_record($ipid, $target_ipid, $target_client)
    {
        $logininfo = new Zend_Session_Namespace('Login_Info');
        $cocktails = $this->getCocktails($ipid);
        
        if($cocktails)
        {
            foreach($cocktails as $cocktail)
            {
                $patient_drug_c = new PatientDrugplanPumpeAlt();
                $patient_drug_c->userid = $logininfo->userid;
                $patient_drug_c->clientid = $target_client;
                $patient_drug_c->ipid = $target_ipid;
                $patient_drug_c->description = $cocktail['description'];
                $patient_drug_c->bolus = $cocktail['bolus'];
                $patient_drug_c->max_bolus = $cocktail['max_bolus'];
                $patient_drug_c->flussrate = $cocktail['flussrate'];
                $patient_drug_c->flussrate_type = $cocktail['flussrate_type'];     //ISPC-2684 Lore 08.10.2020
                $patient_drug_c->sperrzeit = $cocktail['sperrzeit'];
                $patient_drug_c->isdelete = $cocktail['isdelete'];
                $patient_drug_c->save();
                
                $return_data[$cocktail['id']] = $patient_drug_c->id;
            }
            
            return $return_data;
        }
        else
        {
            return false;
        }
    }
    
    
    
    
    

}