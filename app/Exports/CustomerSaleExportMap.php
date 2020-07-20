<?php

namespace App\Exports;

use App\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomerSaleExportMap implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Sale::with('customer')->get();
    }

    public function map($sale):array {
        return [
        $sale->id,
        $sale->customer->name,
        $sale->customer->phone,
        $sale->account_num,
        $sale->amount
        ];
    }
}
