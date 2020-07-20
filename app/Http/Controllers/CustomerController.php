<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use App\Imports\CustomerImport;
use App\Exports\SaleFormulaExprot;
use App\Exports\CustomerExportView;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CustomerSaleExportMap;
use App\Exports\CustomerExportMultiSheet;
use App\Exports\CustomerExportWithHeadingsAndER;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::take(20)->get();
        return view("customer.index", ['customers' => $customers]);
    }

    public function export_all()
    {
         return Excel::download(new CustomerExport,'customer_all.xlsx');//->queue('customer_all.xlsx');
        //  return redirect()->back()->withMessage("Exprot All Customer");
    }
    
    /**
     * export_view
     *
     * @return void
     */
    public function export_view()
    {
        return Excel::download(new CustomerExportView, 'customer_view.xlsx');
    }


    public function export_format($format)
    {
        $format = ucfirst($format);
        $ext = strtolower($format);

        if(in_array(strtoupper($format),["DOMPDF"])) $ext = "pdf";
        
        return Excel::download(new CustomerExport, 'customer'.now()->toDateString().'.'.$ext, $format);
    }


    public function exprot_multipe_sheets()
    {
        return Excel::download(new CustomerExportMultiSheet, 'customer_multi_seets.xlsx');
    }


    public function export_headings()
    {
        return Excel::download(new CustomerExportWithHeadingsAndER, 'customer_headings.xlsx');
    }

    public function export_customer_sale()
    {
        return Excel::download(new CustomerSaleExportMap, 'customer_sale.xlsx');
    }

    public function export_customer_sale_total()
    {
        return Excel::download(new SaleFormulaExprot, 'customer_sale_total.xlsx');
    }


    // Import Function

    public function customer_import()
    {
        $start = $this->time_count();

        $ext = request()->file('import')->getClientOriginalExtension();
        Excel::import(new CustomerImport, request()->file('import'), null, ucfirst($ext));

        $end = $this->time_count();
        $time = $end - $start;
        return redirect()->back()->withMessage("Customer Import successfully with {$time} secounds");
    }


    private function time_count()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    
}
