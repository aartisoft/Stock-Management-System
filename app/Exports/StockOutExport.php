<?php

namespace App\Exports;

use App\StockOut;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class StockOutExport implements FromQuery,WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        //$stockOut = new StockOut();
        //$stockOut = $stockOut->with(['relCompany','relCategory','relItem']);
       // $data['stockOut'] = $this->map($stockOut);

       return StockOut::query()->select('id',  'stockOut_quantity',  'unit_price',  'total_price',  'product_status',  'date');

    }
 /*  public function map($stockOuts): array
    {


        return [
            $stockOuts->id,
            $stockOuts->relItem->name,
            $stockOuts->relCategory->name,
            $stockOuts->relCompany->name,
            $stockOuts->stockOut_quantity,
            $stockOuts->unit_price,
            $stockOuts->total_price,
            $stockOuts->product_status,
            $stockOuts->date,
        ];
    }*/
    public function headings(): array
    {
        return [
            '#',
          //  'Item Name',
           // 'Category Name',
           // 'Company Name',
            'Stock Out Quantity',
            'Unit Price',
            'Total Price',
            'Product Status',
            'Date',
        ];
    }

}
