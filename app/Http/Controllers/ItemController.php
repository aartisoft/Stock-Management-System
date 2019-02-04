<?php

namespace App\Http\Controllers;


use App\Company;
use App\Category;
use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title']='Items';
        $items = new Item();
        $items = $items->with(['relCompany','relCategory']);

        if(isset($request->name)){
            $items =   $items->where('name','like','%' .$request->name. '%');
        }
        if(isset($request->company_id)){
            $items =   $items->where('company_id',$request->company_id);
        }

        if(isset($request->category_id)){
            $items =   $items->where('category_id',$request->category_id);
        }

        if(isset($request->status)){
            $items =   $items->where('status',$request->status);
        }

        $items = $items->paginate(5);
        //$categories = $categories->appends($render);
        $data['items'] = $items;
        $data['serial'] = $this->managePagination($items);
        $data['categories'] = Category::where('status','Active')->pluck('name','id');
        $data['companies'] = Company::where('status','Active')->pluck('name','id');
        return view('admin.item.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Add New Item";
        $data['companies'] = Company::where('status','Active')->pluck('name','id');
        $data['categories'] = Category::where('status','Active')->pluck('name','id');
        return view('admin.item.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required' ,
            'category_id' => 'required',
            'status' => 'required'

        ]);
        $item = New Item();
        $item->name = $request->name;
        $item->company_id = $request->company_id;
        $item->category_id = $request->category_id;
        $item->status = $request->status;

        $item->save();
        session()->flash('success','Item Stored Successfully');
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Item Stock In & Edit';
        $data['item'] = Item::findOrFail($id);
        $data['companies'] = Company::where('status','Active')->pluck('name','id');
        $data['categories'] = Category::where('status','Active')->pluck('name','id');
        return view('admin.item.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'company_id' => 'required' ,
            'category_id' => 'required',
            'status' => 'required'

        ]);
        $item = Item::findOrFail($id);
        $item->name = $request->name;
        $item->company_id = $request->company_id;
        $item->category_id = $request->category_id;
        $item->available_quantity = $request->available_quantity;
        $item->unit_price = $request->unit_price;
        $item->total_price = $request->total_price;
        $item->status = $request->status;

        $item->save();
        session()->flash('success','Item Stock In || Updated Successfully');
        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
