<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title']='Companies';
        $companies = new Company();

        if(isset($request->name)){
            $companies =  $companies->where('name','like','%' .$request->name. '%');
        }
        if(isset($request->status)){
            $companies =  $companies->where('status',$request->status);
        }

        $companies = $companies->paginate(5);
        $data['companies'] = $companies;
        $data['serial'] = $this->managePagination($companies);

        return view('admin.company.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Add New Company";
        return view('admin.company.create',$data);

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
            'name' => 'required|unique:companies',
            'status' => 'required'
        ]);
        $company = New Company();
        $company->name = $request->name;
        $company->status = $request->status;

        $company->save();
        session()->flash('success','Company Stored Successfully');
        return redirect()->route('company.index');
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
        $data['title'] = 'Edit Company';
        $data['company'] = Company::findOrFail($id);
        return view('admin.company.edit',$data);
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
            'name' => 'required|unique:companies,name,'. $id,
            'status' => 'required'
        ]);
        $company = Company::findOrFail($id);
        $company->name = $request->name;
        $company->status = $request->status;
        $company->save();
        session()->flash('success','Company Updated Successfully');
        return redirect()->route('company.index');
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
