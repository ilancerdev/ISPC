<?php

/**
 * PriceShInternalUserShifts
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-10-11)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class PriceShInternalUserShifts extends BasePriceShInternalUserShifts
{

    public function internal_price_user_groups(){

        $price_groups = array(
            'day_doctor',
            'night_doctor',
            'assigned_nurse',
            'family_doctor'
        );
        
        return $price_groups; 
    }
    
    public function get_prices($list, $clientid, $shortcuts = false, $default_price_list = false)
    {
        $internal_price_user_groups = PriceShInternalUserShifts::internal_price_user_groups();

        
        $res = array();
        if (! empty($list) && ! empty($clientid)) {
            
            if (is_array($list)) {
                $list_ids = $list;
            } else {
                $list_ids[] = $list;
            }
            
            $query = Doctrine_Query::create()->select("*")
                ->from('PriceShInternalUserShifts')
                ->where("clientid=?", $clientid)
                ->andWhereIn('list', $list_ids)
                ->orderBy('shortcut ASC');
            $res = $query->fetchArray();
        }
        
        if (! empty($res)) {
            foreach ($res as $k_res => $v_res) {
                $res_prices[$v_res['shortcut']][$v_res['user_group']] = $v_res;
            }
            
            return $res_prices;
        } else 
            if ($shortcuts) {
//                 dd($default_price_list);
                
                // set default value
                foreach($internal_price_user_groups as $price_group){
                    
                    foreach ($shortcuts as $k_s => $v_s) {
                        
                        $res_default[$v_s][$price_group]['shortcut'] = $v_s;
                        
                        if ($default_price_list) {
                            $res_default[$v_s][$price_group]['price'] = $default_price_list[$v_s][$price_group];
                        } else {
                            $res_default[$v_s][$price_group]['price'] = '0.00';
                        }
                    }
                }
                
                return $res_default;
            }
    }

    public function get_multiple_list_price($list, $clientid, $shortcuts)
    {
        $default_price_list = Pms_CommonData::get_default_price_shortcuts();
        $internal_price_user_groups = $this->internal_price_user_groups();
        

        $res = array();
        if (! empty($list) && ! empty($clientid)) {
            
            if (is_array($list)) {
                $list_ids = $list;
            } else {
                $list_ids[] = $list;
            }
            $query = Doctrine_Query::create()->select("*")
                ->from('PriceShInternalUserShifts')
                ->where("clientid= ?", $clientid)
                ->andWhereIn('list', $list_ids)
                ->orderBy('shortcut ASC');
            $res = $query->fetchArray();
        }
        
        if ($res) {
            foreach ($res as $k_res => $v_res) {
                $res_prices[$v_res['list']][$v_res['shortcut']][$v_res['user_group']] = $v_res;
                $res_list_ids[] = $v_res['list'];
            }
            
            $res_list_ids = array_values(array_unique($res_list_ids));
            
            asort($res_list_ids);
            asort($list_ids);
            
            $empty_price_list = array_diff($list_ids, $res_list_ids);
            
            foreach ($empty_price_list as $key_pl => $v_pl) {
                // set default value for empty lists
                foreach ($shortcuts as $k_s => $v_s) {
                    $res_prices[$v_pl][$v_s]['shortcut'][$v_pl['user_group']] = $v_s;
                    if (count($default_price_list['sh_shifts_internal']) > 0) {
                        $res_prices[$v_pl][$v_s][$v_pl['user_group']]['price'] = $default_price_list['sh_shifts_internal'][$v_s][$v_pl['user_group']];
                    } else {
                        $res_prices[$v_pl][$v_s][$v_pl['user_group']]['price'] = '0.00';
                    }
                }
            }
            return $res_prices;
        } else {
            
            // in case of finding nothing
            foreach ($list_ids as $key_pl => $v_pl) {
                // set default value for empty lists
                foreach ($shortcuts as $k_s => $v_s) {
                    foreach($internal_price_user_groups as $k=>$gr){
                        
                        $res_prices[$v_pl][$v_s][$gr]['shortcut'] = $v_s;
                        $res_prices[$v_pl][$v_s][$gr]['list'] = $v_pl;
                        if (count($default_price_list) > 0) {
                            $res_prices[$v_pl][$v_s][$gr]['price'] = $default_price_list['sh_shifts_internal'][$v_s][$gr];
                        } else {
                            $res_prices[$v_pl][$v_s][$gr]['price'] = '0.00';
                        }
                    }
                }
            }
            
            return $res_prices;
        }
    }
}