<?php

/**
 * ProjectOutsideParticipants
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-07-09)
 * @author     claudiu <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ProjectOutsideParticipants extends BaseProjectOutsideParticipants
{

    
    /*
     * by reference !
     */
    public static function beautifyName( &$usrarray )
    {
        
        //mb_convert_case(nice_name, MB_CASE_TITLE, 'UTF-8'); ?
        if (is_array($usrarray))
            foreach ( $usrarray as &$k )
            {
                if ( ! is_array($k) || isset($k['nice_name'])) {
                    continue; // variable allready exists, use another name for the variable
                }
//                 if( empty($k['shortname']) || trim($k['shortname']) == "") //shortname 0 is not allowed in here
//                 {
//                     $k['shortname'] = mb_substr(trim($k['first_name']), 0, 1, "UTF-8") . "" . mb_substr(trim($k['last_name']), 0, 1, "UTF-8");
//                 }
                
                $k['nice_name']	= ! empty($k['salutation']) ? $k['salutation'] . " " : "";
                $k['nice_name']	.= ! empty($k['last_name']) ? $k['last_name'] : "";
                $k['nice_name']	.= ! empty($k['first_name']) ? (", " . trim($k['first_name'])) : "";
                
            }
    }
    
}