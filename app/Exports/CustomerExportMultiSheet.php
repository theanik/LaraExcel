<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Exports\CustomerExportOrganizationSheet;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class CustomerExportMultiSheet implements WithMultipleSheets
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function sheets(): array
    {
        $sheets = [];

        $organized_by = ['.com','.net','.org','.biz'];

        foreach($organized_by as $item){
            $sheets[] = new CustomerExportOrganizationSheet($item);
        }

        return $sheets;
    }
}
