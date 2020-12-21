<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->min_price)) {
                $data = DB::table('products')
                    ->whereBetween('price', array($request->min_price, $request->max_price))
                    ->get();
            } else {
                $data = DB::table('products')
                    ->get();
            }
            return datatables()->of($data)->make(true);
        }
        return view('users.index');
    }
}
