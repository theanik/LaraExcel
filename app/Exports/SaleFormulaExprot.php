<?php

namespace App\Exports;

use App\Sale;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class SaleFormulaExprot implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $sale = Sale::with('customer')->get();

        $sale->push(collect([
            'id' => '',
            'customer_id' => '',
            'account_num' => 'Total Sale :',
            'amount' => '=SUM(D1:D'.$sale->count().')'
        ]));

        return $sale;
    }
}
