<?php
/**
 * ClientUserTextBox
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC-2827 Lore 30.03.2021
 * @subpackage Application (2021-03-30)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ClientUserTextBox extends BaseClientUserTextBox
{            
    /**
     * translations are grouped into an array
     * @var unknown
     */
    const LANGUAGE_ARRAY    = 'clientusertextbox_lang';
            
    /**
     * define the FORMID and FORMNAME, if you want to piggyback some triggers
     * @var unknown
     */
    const TRIGGER_FORMID    = null;
    const TRIGGER_FORMNAME  = 'frm_clientusertextbox';
            
    /**
     * insert into patient_files will use this
     */
    const PATIENT_FILE_TABNAME  = 'ClientUserTextBox';
    const PATIENT_FILE_TITLE    = 'ClientUserTextBox PDF'; //this will be translated
            
    /**
     * insert into patient_course will use this
     */
    const PATIENT_COURSE_TITLE      = 'ClientUserTextBox PDF was created';
    const PATIENT_COURSE_TABNAME    = 'clientusertextbox';
    const PATIENT_COURSE_TYPE       = ''; // add letter

    public function get_client_user_text_box($clientid, $userid)
    {
        
        $cutb = Doctrine_Query::create()
        ->select('*')
        ->from('ClientUserTextBox')
        ->where('clientid =?', $clientid)
        ->andwhere('user =?', $userid)
        ->andWhere('inactive = "0"')
        ->andWhere('isdelete = "0"');
        
        $cutb_arr = $cutb->fetchArray();
        
        return $cutb_arr;
    }
    

}

