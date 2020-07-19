<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use App\Exports\CustomerExport;
use App\Exports\CustomerExportView;
use Maatwebsite\Excel\Facades\Excel;
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
        $customers = Customer::all();
        return view("customer.index", ['customers' => $customers]);
    }

    public function export_all()
    {
        return Excel::download(new CustomerExport, 'customer_all.xlsx');
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


    
}
