<?php

/**
 * InvoicejournalExportInvoices
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ISPC
 * @subpackage Application (2018-07-26)
 * @author     Ancuta <office@originalware.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class InvoicejournalExportInvoices extends BaseInvoicejournalExportInvoices
{

    public function get_all_exported_invoices($clientid, $export_type = array(), $invoice_type = array())
    {
        if (empty($clientid)) {
            return; // fail-safe
        }
        
        $invoices = $this->getTable()
            ->createQuery()
            ->select('*')
            ->andWhere("clientid = ?", $clientid);
        if (! empty($export_type)) {
            // check if array
            $invoices->andWhereIn("export_type", $export_type);
        }
        if (! empty($invoice_type)) {
            $invoices->andWhereIn("invoice_type", $invoice_type);
        }
        
        return ($invoices->fetchArray());
    }
}