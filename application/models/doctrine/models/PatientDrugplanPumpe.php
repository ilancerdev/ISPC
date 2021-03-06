<?php

/**
 * PatientDrugplanPumpe
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC [ISPC-2833 Ancuta 26.02.2021]
 * @subpackage Application (2021-02-26)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PatientDrugplanPumpe extends BasePatientDrugplanPumpe
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'patientdrugplanpumpe_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_patientdrugplanpumpe';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'PatientDrugplanPumpe';
    const PATIENT_FILE_TITLE    = 'PatientDrugplanPumpe PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'PatientDrugplanPumpe PDF was created';
    const PATIENT_COURSE_TABNAME    = 'patientdrugplanpumpe';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    
    
    
    public function get_perfusor_pumpes($pumpe_ids_array = array())
    { 
        
        if (empty($pumpe_ids_array) || !is_array($pumpe_ids_array)) {
            return $pumpe_ids_array;
        }
        
        $pumpes= Doctrine_Query::create()
        ->select("*")
        ->from('PatientDrugplanPumpe')
        ->whereIn("id", $pumpe_ids_array)
        ->orderBy("id ASC")
        ->fetchArray();
        
        $pumpes_final = array();
        if(count($pumpes) > 0)
        {
            foreach($pumpes as $pump)
            {
                $pumpes_final[$pump['id']] = $pump;
            }
        }
        
        return $pumpes_final;
    }
    
    
    
    public function countDrugsPerCocktail($pumpe_ids)
    {
        if(count($cocktailids) == 0)
        {
            $cocktailids[] = '999999999';
        }
        
        $drugsc = Doctrine_Query::create()
        ->select("*")
        ->from('PatientDrugPlan')
        ->whereIn("pumpe_id", $cocktailids)
        ->andWhere('isdelete = 0');
        $drugCocktails = $drugsc->fetchArray();
        foreach($drugCocktails as $drug)
        {
            $drugC[$drug['cocktailid']][] = $drug['id'];
        }
        
        return $drugC;
    }
    
    public function getCocktails($ipid)
    {
        $drugsc = Doctrine_Query::create()
        ->select("*")
        ->from('PatientDrugplanPumpe')
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
        return;
        $logininfo = new Zend_Session_Namespace('Login_Info');
        $cocktails = $this->getCocktails($ipid);
        
        if($cocktails)
        {
            foreach($cocktails as $cocktail)
            {
                $patient_drug_c = new PatientDrugplanPumpe();
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