<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title']='Categories';
        $categories = new Category();
        $categories = $categories->with(['parent','children']);

        if(isset($request->name)){
            $categories =  $categories->where('name','like','%' .$request->name. '%');
        }
        if(isset($request->parent_id)){
            $categories =  $categories->where('parent_id',$request->parent_id);
        }
        if(isset($request->status)){
            $categories =  $categories->where('status',$request->status);
        }

        $categories = $categories->paginate(6);
        $data['categories'] = $categories;
        $data['serial'] = $this->managePagination($categories);

       $data['parents'] = Category::leftjoin('categories as c2','categories.parent_id','=','c2.id')
            ->where('categories.status', '=', 'Active')
            ->pluck('c2.name','categories.parent_id');

        return view('admin.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Add New Category";
        $data['parents'] = Category::where('status','Active')->get();
        //dd($data);
        return view('admin.category.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required|unique:categories',
            'status' => 'required'
        ]);
        $category = New Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;

        $category->save();
        session()->flash('success','Category Stored Successfully');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit Category';
        $data['category'] = Category::findOrFail($id);
        $data['parents'] = Category::where('status','Active')->get();
        return view('admin.category.edit',$data);
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
            'name' => 'required|unique:categories,name,'. $id,
            'status' => 'required'
        ]);
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->status = $request->status;
        $category->save();
        session()->flash('success','Category Updated Successfully');
        return redirect()->route('category.index');

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
