<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function index()
    {
        return view('admin.excel.import');
    }
        
    public function import() 
    {
        Excel::import(new ProductsImport,request()->file('file'));
           
        return back();
    }
    public function export() 
    {
       return Excel::download(new ProductsExport,'products.xlsx');
           
        
    }
}
