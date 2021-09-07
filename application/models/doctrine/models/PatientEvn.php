<?php
// ISPC-2670 Lore 24.09.2020
/**
 * PatientEvn
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC-2670
 * @subpackage Application (2020-09-24)
 * @author     Lore <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class  PatientEvn extends BasePatientEvn
{            

    public function getPatientEvn($ipid)
    {
        if (empty($ipid)) {
            return; //fail-safe
        }
        
        $loc = Doctrine_Query::create()
        ->select("*")
        ->from('PatientEvn')
        ->andWhere("ipid= ? ", $ipid);
        $disarr = $loc->fetchArray();
        
        return $disarr;
        
    }
 
    public static function getEvnoptions()
    {
        $evn_options = array(
            '1' => "Ja",
            '2' => "Nein (Gespräch noch nicht geführt)",
            '3' => "Nein (Gespräch wird abgelehnt) ",
            '4' => "Nein (Sonstige Gründe)",
            '5' => "Sonstiges",
        );
        
        return $evn_options;
    }

       
}

?>





