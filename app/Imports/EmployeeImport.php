<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeeImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'title'=>$row['title'],
            'description'=> $row['description'],
            'price'=> $row['price'],
            'type'=> $row['type'],
           // 'isActive'=> $row['isActive'],
            'created_at'=>$row['created_at'],
            'updated_at'=>$row['updated_at']

        ]);
    }
}
