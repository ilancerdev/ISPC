<?php

	Doctrine_Manager::getInstance()->bindComponent('ShInvoicePayments', 'SYSDAT');

	class ShInvoicePayments extends BaseShInvoicePayments {

		public function delete_invoice_payment($payment)
		{
			if($payment > 0)
			{
				$delInvoicePayment = Doctrine_Query::create()
					->update("ShInvoicePayments")
					->set('isdelete', "1")
					->where('id = "' . $payment . '"');

				$d = $delInvoicePayment->execute();

				if($d)
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				return false;
			}
		}

		public function getInvoicePayments($invoice)
		{
			$invoices = Doctrine_Query::create()
				->select("*")
				->from('ShInvoicePayments')
				->Where("invoice='" . $invoice . "'")
				->andWhere('isdelete = 0');

			$itemInvArray = $invoices->fetchArray();
			return $itemInvArray;
		}

		public function getInvoicesPaymentsSum($invoiceids)
		{
			$invoiceids[] = "99999999999999";

			$invoices = Doctrine_Query::create()
				->select("*, SUM(amount) as paid_sum")
				->from('ShInvoicePayments')
				->WhereIn("invoice", $invoiceids)
				->andWhere('isdelete = 0')
				->groupBy('invoice');

			$items_array = $invoices->fetchArray();
			foreach($items_array as $kpay => $vpay)
			{
				$final_invoice_items[$vpay['invoice']]['paid_sum'] = $vpay['paid_sum'];
			}
			return $final_invoice_items;
		}

		
		public function get_invoice($invoiceid)
		{
			$invoices = Doctrine_Query::create()
				->select("*, IF(completed_date = '0000-00-00 00:00:00', create_date, IF(completed_date = '1970-01-01 01:00:00', create_date, completed_date)) as completed_date_sort")
				->from('ShInvoices')
				->andWhere('id = "' . $invoiceid . '"')
				->andWhere('isdelete = 0');
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
		
	}

?>