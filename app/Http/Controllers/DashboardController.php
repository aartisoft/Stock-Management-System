<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Item;
use App\StockOut;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data['title'] = 'Dashboard';
        $data['total_items'] = Item::where('status','Active')->count();
        $data['total_stockIn'] = Item::where('status','Active')->sum('available_quantity');
        $data['total_stockOut'] = StockOut::sum('stockOut_quantity');
        $data['companies'] = Company::where('status','Active')->orderBy('id','DESC')->limit(3)->get();
        $categories = new Category();
        $categories = $categories->with(['parent','children'])->where('status','Active')->orderBy('id','DESC')->limit(3)->get();
        $data['categories'] = $categories;
        $items = new Item();
        $items = $items->with(['relCompany','relCategory'])->where('status','Active')->orderBy('id','DESC')->limit(3)->get();
        $data['items'] = $items;
        return view('admin.dashboard',$data);
    }
}
