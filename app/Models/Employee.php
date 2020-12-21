<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Employee extends Model
{
    use HasFactory;
    protected $table="employees";
    protected $fillable = [
        'title',
        'description',
        'price',
        'type',
        'isActive'
    ];
    public static function getEmployee(){
        $records=DB::table('employees')->select('id','title','description','price','type','isActive')->get()->toArray();
        return $records;
    }
    
}
