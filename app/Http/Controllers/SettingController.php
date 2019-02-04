<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function ajaxCategoryLoadByCompanyId($id){
        $data['categories'] = Item::leftjoin('categories', 'items.category_id', '=', 'categories.id' )
            ->where(['items.company_id'=>$id,'items.status'=>'Active'])->pluck('categories.name','categories.id');
        return view('admin.setting.ajaxCategoryLoad',$data);
    }

    public function  ajaxItemLoadByCategoryId($category_id,$company_id){

        $data['items'] = Item::where(['category_id'=>$category_id,'status'=>'Active'])->where('company_id',$company_id)->pluck('name','id');
        return view('admin.setting.ajaxItemLoad',$data);

    }

    public function  ajaxQuantityLoadByItemId($id){
        $items = new Item();
        $items = $items->select('available_quantity','unit_price','total_price')->where(['id'=>$id,'status'=>'Active'])->first();
        return view('admin.setting.ajaxQuantityUnit_PriceLoad',$items);

    }



    public function application_settings(){
        $data['title'] = "Edit Shop Settings";
        $data['settings']['logo']= Setting::where(['type'=>'logo'])->first();
        $data['settings']['shop_name']= Setting::where(['type'=>'shop_name'])->first();
        return view('admin.setting.shop_settings',$data);
    }
    public function update_application_settings(Request $request){
        $request->validate([
            'logo' => 'mimes:png'
        ]);
        $setting = Setting::where('type','shop_name')->first();
        $setting->value = $request->shop_name;
        $setting->save();

        if($request->hasFile('logo')){
            $setting = Setting::where('type','logo')->first();
            $old_file = $setting->value;

            $image = $request->file('logo');
            $image->move('assets', $image->getClientOriginalName());
            $setting->value = 'assets/' . $image->getClientOriginalName();
            $setting->save();

            unlink($old_file);
        }
        session()->flash('success','Shop setting updated');
        return redirect()->back();
    }

}
