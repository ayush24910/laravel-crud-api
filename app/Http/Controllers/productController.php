<?php

namespace App\Http\Controllers;

use App\DataTables\ProductDataTable;
use App\Exports\EmployeeExport;
use App\Imports\EmployeeImport;
use App\Models\Product;
use Excel;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function getData()
    {
        return Product::paginate(50);
    }
    public function getDataTitle($title)
    {

        return Product::where("title", "like", "%" . $title . "%")->get();
    }
    public function getDataId($id)
    {

        return Product::where("id",$id )->get();
    }
    public function add(Request $req)
    {

        $product = new Product;
        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->type = $req->type;
        $product->isActive = $req->isActive;
        $result = $product->save();
        if ($result) {
            return ["Result" => "Data has been saved"];
        }
    }
    public function update(Request $req)
    {
        $product = Product::find($req->id);
        $product->title = $req->title;
        $product->description = $req->description;
        $product->price = $req->price;
        $product->type = $req->type;
        $product->isActive = $req->isActive;
        $result = $product->save();
        if ($result) {
            return ["Result" => "Data is updated"];
        }}
    public function delete($id)
    {
        $product = Product::find($id);
        $result = $product->delete();
        if ($result) {
            return ["Result" => "data is deleted"];
        }
    }
    public function filter($min, $max)
    {

        return Product::whereBetween('price', [$min, $max])->get();
    }
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('users.index');
    }
    public function importForm()
    {
        return view('import_form');
    }
    public function import(Request $request)
    {
        Excel::import(new EmployeeImport, $request->file);
        return "data are imported successfully";
    }
    public function exportIntoExcel()
    {
        return Excel::download(new EmployeeExport, 'employeelist.xlsx');
    }
    public function exportIntoCSV()
    {
        return Excel::download(new EmployeeExport, 'employeelist.csv');
    }
}
