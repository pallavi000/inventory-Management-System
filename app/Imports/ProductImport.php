<?php

namespace App\Imports;

use App\Models\Product;

use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Collection;


class ProductImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) 
        {
           $data[] = [
            'status'=>$row[0],
            'quantity'=>$row[6] || 0,
            'name'=>$row[2],
            'description'=>$row[2],
            'uom'=>$row[3] || ' '
           ];
           
        }
       foreach ($data as $d) {
        Product::create($d);
       }
    }
   
}
