<?php

namespace App\Http\Controllers;

use App\Company;
use App\Exports\StockOutExport;
use App\StockOut;
use App\Item;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Mockery\CountValidator\Exact;

class StockOutController extends Controller
{
    public function index(Request $request,$export=false){
        $data['title'] = 'Stock Outs';
        $stockOuts = new StockOut();
        $stockOuts  = $stockOuts ->with(['relCompany','relCategory','relItem']);
        if(isset($request->item_id)){
            $stockOuts = $stockOuts->where('item_id',$request->item_id);
        }

        if(isset($request->start_date) && isset($request->end_date))
        {
            $stockOuts = $stockOuts->whereBetween('date',[$request->start_date,$request->end_date]);
        }
        elseif(isset($request->start_date))
        {
            $stockOuts = $stockOuts->where('date',$request->start_date);
        }
        if(!empty($export))
        {
            return Excel::download(new StockOutExport, 'stock.xlsx');
        }

        $stockOuts = $stockOuts->paginate(5);
       // $stockOuts=  $stockOuts->appends($render);
        $data['stockOuts'] = $stockOuts;
        $data['serial'] = $this->managePagination($stockOuts);
        $data['items'] = Item::where('status','Active')->pluck('name','id');
        return view('admin.stockOut.index',$data);

    }
    public function create(){
        $data['title'] = 'Stock Outs';
        $data['companies']= Company::where('status','Active')->pluck('name','id');
        $data['categories']=[];
        $data['items']=[];
        return view('admin.stockOut.create',$data);
    }

    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'company_id' => 'required',
            'category_id'=> 'required',
            'item_id'=> 'required',
            'available_quantity'=> 'required',
            'unit_price'=> 'required',
            'stockOut_quantity'=> 'required',
            'total_price'=> 'required',
            'date'=> 'required',
            'product_status' => 'required'
        ]);

        $items = Item::findOrFail($request->item_id);
        $items->available_quantity = $request->available_quantity;
        $totalPrice = $request->available_quantity * $request->unit_price;
        $items->total_price = $totalPrice ;
        $items->save();


        $stockOut = New StockOut();
        $stockOut->company_id = $request->company_id;
        $stockOut->category_id = $request->category_id;
        $stockOut->item_id = $request->item_id;
        $stockOut->unit_price = $request->unit_price;
        $stockOut->available_quantity= $request->available_quantity;

        $stockOut->stockOut_quantity = $request->stockOut_quantity;
        $stockOut->total_price = $request->total_price;
        $stockOut->date= $request->date;
        $stockOut->product_status= $request->product_status;
        $stockOut->save();



        session()->flash('success','Stock Out Stored Successfully');
        return redirect()->route('stockOut.index');
    }

    function managePagination($obj)
    {
        $serial=1;
        if($obj->currentPage()>1)
        {
            $serial=(($obj->currentPage()-1)*$obj->perPage())+1;
        }
        return $serial;
    }
}
