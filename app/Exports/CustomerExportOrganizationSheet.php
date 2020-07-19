<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
class CustomerExportOrganizationSheet implements FromCollection,WithTitle
{
    private $query;
    function __construct($query)
    {
        $this->query = $query;
    }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::where('email','like','%'.$this->query)->get();
    }


    public function title():string{
        return "Email " . $this->query;
    }
}
