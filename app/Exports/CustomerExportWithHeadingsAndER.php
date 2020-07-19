<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExportWithHeadingsAndER implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $customers = Customer::all();

        $final = [];
        foreach($customers->chunk(3) as $chunk){
            $final = array_merge($final, $chunk->toArray(),[[]]);
        }

        return collect($final);
    }


    public function headings(): array{
        return [
            'SL',
            'name',
            'Email',
            'Phone',
            'Address',
            'Created At',
            'Updated At'
        ];
    }
}
