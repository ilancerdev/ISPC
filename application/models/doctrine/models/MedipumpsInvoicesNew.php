<?php

	Doctrine_Manager::getInstance()->bindComponent('MedipumpsInvoicesNew', 'SYSDAT');

	class MedipumpsInvoicesNew extends BaseMedipumpsInvoicesNew {

		public function getMedipumpsInvoice($invoice, $status = false)
		{
			$sgbvinvoice_items = new MedipumpsInvoiceItemsNew();

			$invoices = Doctrine_Query::create()
				->select("*, IF(completed_date = '0000-00-00 00:00:00', create_date, IF(completed_date = '1970-01-01 01:00:00', create_date, completed_date)) as completed_date_sort")
				->from('MedipumpsInvoicesNew')
				->where("id='" . $invoice . "'")
				->andWhere('isdelete = 0')
				->andWhere('isarchived = "0"');
			if($status)
			{
				$invoices->andWhere('status = "' . $status . '"');
			}
			$invoices->limit('1');

			$invoices_res = $invoices->fetchArray();
			if($invoices_res)
			{
				//get all invoice items
				$invoice_items = $sgbvinvoice_items->getInvoicesItems($invoices_res[0]['id']);

				foreach($invoices_res as $k_invoice_res => $v_invoice_res)
				{
					$invoice_details = $v_invoice_res;

					if($invoice_items)
					{
						$invoice_details['items'] = $invoice_items[$v_invoice_res['id']];
					}
				}

				return $invoice_details;
			}
			else
			{
				return false;
			}
		}

		public function get_invoice($invoiceid)
		{
			$invoices = Doctrine_Query::create()
				->select("*, IF(completed_date = '0000-00-00 00:00:00', create_date, IF(completed_date = '1970-01-01 01:00:00', create_date, completed_date)) as completed_date_sort")
				->from('MedipumpsInvoicesNew')
				->andWhere('id = "' . $invoiceid . '"')
				->andWhere('isdelete = 0')
				->andWhere('isarchived = 0');
			$invoices_res = $invoices->fetchArray();

			if($invoices_res)
			{
				return $invoices_res;
			}
			else
			{
				return $invoices;
			}
		}

		public function get_highest_invoice_number($clientid, $prefix = false, $all = false)
		{
			$invoice_number = Doctrine_Query::create()
				->select("*")
				->from('MedipumpsInvoicesNew')
				->where("client='" . $clientid . "'")
				->andWhere('isdelete = 0')
				->orderBy('invoice_number DESC')
				->limit('1');
			if($prefix)
			{
				$invoice_number->andWhere('prefix = "' . $prefix . '"');
			}
			else if($all === false)
			{
				$invoice_number->andWhere('prefix = ""');
			}

			$invoice_number_data = $invoice_number->fetchArray();

			if($invoice_number_data)
			{
				return $invoice_number_data[0];
			}
			else
			{
				return false;
			}
		}

		public function get_period_mp_invoices($clientid, $period)
		{
			$invoices = Doctrine_Query::create()
				->select("*, IF(completed_date = '0000-00-00 00:00:00', create_date, IF(completed_date = '1970-01-01 01:00:00', create_date, completed_date)) as completed_date_sort")
				->from('MedipumpsInvoicesNew')
				->where("client='" . $clientid . "'")
				->andWhere('isdelete = 0')
				->andWhere('isarchived = 0');

			if($period)
			{
				$invoices->andWhere('create_date BETWEEN "' . date('Y-m-d H:i:s', strtotime($period['start'])) . '" AND "' . date('Y-m-d H:i:s', strtotime($period['end'])) . '"');
			}


			$invoices_res = $invoices->fetchArray();

			if($invoices_res)
			{
				return $invoices_res;
			}
			else
			{
				return false;
			}
		}

		public function create_storno_invoice($invoiceid)
		{
			$find_invoice = Doctrine::getTable('MedipumpsInvoicesNew')->findOneById($invoiceid);
			$found_invoice = $find_invoice->toArray();

			$has_storno = self::has_storno($invoiceid);

			if($found_invoice && !$has_storno)
			{
				$inv = new MedipumpsInvoicesNew();
				$inv->invoice_start = $found_invoice['invoice_start'];
				$inv->invoice_end = $found_invoice['invoice_end'];
				$inv->invoice_end = $found_invoice['invoice_end'];
				$inv->invoiced_month = $found_invoice['invoiced_month'];
				$inv->start_active = $found_invoice['start_active'];
				$inv->end_active = $found_invoice['end_active'];
				$inv->start_mp_rent = $found_invoice['start_mp_rent'];
				$inv->end_mp_rent = $found_invoice['end_mp_rent'];
				$inv->ipid = $found_invoice['ipid'];
				$inv->client = $found_invoice['client'];
				
				//ISPC-2532 Carmen 14.02.2020
				$invoice_number = $this->get_next_invoice_number($found_invoice['client']);
				
				if($found_invoice['client'] != 0)
				{
					$inv->prefix = $invoice_number['prefix'];
					$inv->invoice_number = $invoice_number['invoicenumber'];
				}
				else
				{
					$inv->prefix = $found_invoice['prefix'];
					$inv->invoice_number = $found_invoice['invoice_number'];
				}
				//--
				
				$inv->total_amount = $found_invoice['total_amount'];
				$inv->shared_amount = $found_invoice['shared_amount'];
				$inv->invoice_total = $found_invoice['invoice_total'];
				$inv->paid_date = $found_invoice['paid_date'];
				$inv->status = $found_invoice['status'];
				$inv->address = $found_invoice['address'];
				$inv->type = $found_invoice['type'];
				$inv->isdelete = '0';
				$inv->isarchived = '0';
				$inv->record_id = $invoiceid;
				$inv->storno = '1';
				//$inv->completed_date = $found_invoice['completed_date'];
				$inv->completed_date = date('Y-m-d H:i:s', time());        //ISPC-2532 Lore 11.11.2020
				$inv->save();
			}
		}

		public function del_storno_invoice($invoiceid)
		{
			$del_storno_invoice = Doctrine::getTable('MedipumpsInvoicesNew')->findOneById($invoiceid);
			$del_storno_invoice->isdelete = '1';
			$del_storno_invoice->save();
		}

		public function get_period_patients_medipumps_invoices($ipid, $clientid, $period = false, $invoice_type = false)
		{
			if(!is_array($ipid))
			{
				$ipids = array($ipid);
			}
			else
			{
				$ipids = $ipid;
			}

			$invoices = Doctrine_Query::create()
				->select("*, IF(completed_date = '0000-00-00 00:00:00', create_date, IF(completed_date = '1970-01-01 01:00:00', create_date, completed_date)) as completed_date_sort")
				->from('MedipumpsInvoicesNew')
				->whereIn('ipid', $ipids)
				->andWhere("client='" . $clientid . "'")
				->andWhere('isdelete = 0')
				->andWhere('isarchived = 0');

			if($period)
			{
				$invoices->andWhere(' DATE(invoice_start) BETWEEN DATE("' . date('Y-m-d', strtotime($period['start'])) . '") AND DATE("' . date('Y-m-d', strtotime($period['end'])) . '")  OR  DATE(invoice_end) BETWEEN DATE("' . date('Y-m-d', strtotime($period['start'])) . '") AND DATE("' . date('Y-m-d', strtotime($period['end'])) . '")');
//				$invoices->andWhere(' DATE("' . date('Y-m-d', strtotime($period['start'])) . '") BETWEEN DATE(invoice_start) AND DATE(invoice_end) OR DATE("' . date('Y-m-d', strtotime($period['end'])) . '") BETWEEN DATE(invoice_start) AND DATE(invoice_end)');
			}

			if($invoice_type)
			{
				$invoices->andWhere('type = "' . $invoice_type . '"');
			}

			$invoices_res = $invoices->fetchArray();

			if($_REQUEST['dbgg'])
			{
				print_r($invoices->getSqlQuery());
			}

			if($invoices_res)
			{
				return $invoices_res;
			}
			else
			{
				return false;
			}
		}

		public function get_period_multi_patients_medipumps_invoices($ipids, $clientid, $periods = false, $invoice_type = false)
		{
			if(!is_array($ipids))
			{
				$ipids = array($ipids);
			}
			else
			{
				$ipids = $ipids;
			}

			$sql = array();
			foreach($periods as $k_ipid => $v_periods)
			{
				$sql[] = ' (`ipid` LIKE "' . $k_ipid . '" AND (DATE(invoice_start) BETWEEN DATE("' . date('Y-m-d', strtotime($v_periods['start'])) . '") AND DATE("' . date('Y-m-d', strtotime($v_periods['end'])) . '") OR DATE(invoice_end) BETWEEN DATE("' . date('Y-m-d', strtotime($v_periods['start'])) . '") AND DATE("' . date('Y-m-d', strtotime($v_periods['end'])) . '")))';
			}

			$invoices = Doctrine_Query::create()
				->select("*, IF(completed_date = '0000-00-00 00:00:00', create_date, IF(completed_date = '1970-01-01 01:00:00', create_date, completed_date)) as completed_date_sort")
				->from('MedipumpsInvoicesNew')
				->andWhere("client='" . $clientid . "'")
				->andWhere('isdelete = 0')
				->andWhere('isarchived = 0');
			if($periods && $sql)
			{
				$invoices->andWhere('(' . implode(' OR ', $sql) . ')');
			}

			if($invoice_type)
			{
				$invoices->andWhere('type = "' . $invoice_type . '"');
			}

			$invoices_res = $invoices->fetchArray();

			if($invoices_res)
			{
				return $invoices_res;
			}
			else
			{
				return false;
			}
		}

		public function get_next_invoice_number($clientid, $temp = false)
		{
			$client = new Client();
			$invoices = new MedipumpsInvoicesNew();
			$invoice_settings = new InvoiceSettings();
			$client_data = $client->getClientDataByid($clientid);

			$collective = '0';
			if($client_data[0]['invoice_number_type'] == '1')
			{
				$collective = '1';
			}
			$required_shortcuts = array('bw_medipumps_invoice');

			$invoice_settings_arr = $invoice_settings->getClientInvoiceSettings($clientid, $required_shortcuts, $collective);

			if($client_data[0]['invoice_number_type'] == '0') //individual type
			{
				//medipumps invoice
				$bw_mp_invoice_rnummer = $invoices->get_highest_invoice_number($clientid, $invoice_settings_arr['bw_medipumps_invoice']['invoice_prefix']);
				if($bw_mp_invoice_rnummer)
				{
					if($bw_mp_invoice_rnummer['invoice_number'] >= $invoice_settings_arr['bw_medipumps_invoice']['invoice_start'] && $bw_mp_invoice_rnummer['prefix'] == $invoice_settings_arr['bw_medipumps_invoice']['invoice_prefix'])
					{
						$prefix = $invoice_settings_arr['bw_medipumps_invoice']['invoice_prefix'];
						$i_number = $bw_mp_invoice_rnummer['invoice_number'];
						$i_number++;
					}
					else
					{
						$prefix = $invoice_settings_arr['bw_medipumps_invoice']['invoice_prefix'];
						$i_number = $invoice_settings_arr['bw_medipumps_invoice']['invoice_start'];

						if($invoice_settings_arr['bw_medipumps_invoice']['invoice_start'] == '0')
						{
							$i_number++;
						}
					}
				}
				else
				{
					if(strlen($invoice_settings_arr['bw_medipumps_invoice']['invoice_start']) > 0)
					{
						$prefix = $invoice_settings_arr['bw_medipumps_invoice']['invoice_prefix'];
						$i_number = $invoice_settings_arr['bw_medipumps_invoice']['invoice_start'];
						if($invoice_settings_arr['bw_medipumps_invoice']['invoice_start'] == '0')
						{
							$i_number++;
						}
					}
					else
					{
						$prefix = "";
						$i_number = '1000';
					}
				}
				$invoicenumber = $i_number;
			}
			else
			{
				//get all client invoices highest number if collective settings are applied
				$collective_highest_number = $invoice_settings->get_all_invoices_high_number($clientid);

				foreach($invoice_settings_arr as $k_inv_settigns => $v_inv_settings)
				{
					if(in_array($v_inv_settings['invoice_prefix'], $collective_highest_number['prefix']))
					{
						foreach($collective_highest_number['number'] as $k_coll_high => $v_coll_high)
						{
							if($collective_highest_number['prefix'][$k_coll_high] == $v_inv_settings['invoice_prefix'])
							{
								$coll_numbers[] = $v_coll_high;
							}
						}

						if(count($coll_numbers) > 0)
						{
							$max_collection_number = max($coll_numbers);

							if($max_collection_number > $v_inv_settings['invoice_start'])
							{
								$i_number[$k_inv_settigns] = $max_collection_number;
							}
							else
							{
								$i_number[$k_inv_settigns] = $v_inv_settings['invoice_start'];
							}

							$i_number[$k_inv_settigns] ++;
						}
					}
					else
					{
						$i_number[$k_inv_settigns] = $v_inv_settings['invoice_start'];
						if($v_inv_settings['invoice_start'] == '0')
						{
							$i_number[$k_inv_settigns] ++;
						}
					}
				}

				$final_invoice_number = max($i_number);

				$prefix = $client_data[0]['invoice_number_prefix'];
				$invoicenumber = $final_invoice_number;
			}

			if($temp === false)
			{
				$invoice_nr_arr['prefix'] = $prefix;
				$invoice_nr_arr['invoicenumber'] = $invoicenumber;
			}
			else
			{
				$invoice_nr_arr = $this->generate_temp_invoice_number($clientid);
			}

			return $invoice_nr_arr;
		}

		private function generate_temp_invoice_number($clientid)
		{
			$invoices = new MedipumpsInvoicesNew();
			$temp_prefix = 'TEMP_';
			$high_inv_nr = $invoices->get_highest_invoice_number($clientid, $temp_prefix);

			if($high_inv_nr)
			{
				$high_inv_nr['invoice_number'] ++;
				$inv_nr = $high_inv_nr['invoice_number'];
			}
			else
			{
				$inv_nr = '1';
			}

			$invoice_nr_arr['prefix'] = $temp_prefix;
			$invoice_nr_arr['invoicenumber'] = $inv_nr;

			return $invoice_nr_arr;
		}

		public function get_storned_invoices($clientid)
		{
			$storno_invoices = Doctrine_Query::create()
				->select("*")
				->from('MedipumpsInvoicesNew')
				->where("client='" . $clientid . "'")
				->andwhere('storno = "1"');
			$storno_invoices_res = $storno_invoices->fetchArray();

			if($storno_invoices_res)
			{
				$storned_invoices[] = '999999999999';
				foreach($storno_invoices_res as $k_storno => $v_storno)
				{
					$storned_invoices[] = $v_storno['record_id'];
				}

				return $storned_invoices;
			}
			else
			{
				return false;
			}
		}

		public function has_storno($invoiceid)
		{
			$invoice_storno = Doctrine_Query::create()
				->select("*")
				->from('MedipumpsInvoicesNew')
				->where("record_id='" . $invoiceid . "'")
				->andwhere('storno = "1"')
				->limit('1');
			$invoice_storno_res = $invoice_storno->fetchArray();

			if($invoice_storno_res)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		public function get_mp_invoiced_sapvs($ipids)
		{
			$ipids[] = '9999999999999';

			$invoiced_sapvs = Doctrine_Query::create()
				->select("*")
				->from('MedipumpsInvoicesNew')
				->whereIn("ipid", $ipids)
				->andwhere('storno = "0"')
				->andwhere('isdelete = "0"');
			$invoiced_sapvs_res = $invoiced_sapvs->fetchArray();

			if($invoiced_sapvs_res)
			{
				foreach($invoiced_sapvs_res as $k_res => $v_res)
				{
					$invoices_sapvs_ids['sapv'][] = $v_res['sapvid'];
					$invoices_sapvs_ids['sapv'] = array_values(array_unique($invoices_sapvs_ids['sapv']));

					$invoices_sapvs_ids['fall'][] = $v_res['ipid'] . '_' . date("Y_m_d", strtotime($v_res['invoice_start'])). '_' . date("Y_m_d", strtotime($v_res['invoice_end']));
					$invoices_sapvs_ids['fall'] = array_values(array_unique($invoices_sapvs_ids['fall']));

					$invoices_sapvs_ids['admission'][] = $v_res['admissionid'];
					$invoices_sapvs_ids['admission'] = array_values(array_unique($invoices_sapvs_ids['admission']));
				}
				return $invoices_sapvs_ids;
			}
			else
			{
				return false;
			}
		}

	}

?>