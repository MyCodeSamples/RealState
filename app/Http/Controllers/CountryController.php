<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CountryController extends Controller
{
    public function countries_list(){
        $countries=Country::get();
        return view('admin.setting.countries.countries_list',compact('countries'));

    }
    public function countries_view(){
        return view('admin.setting.countries.countries_add');
    }
    public function countries_add(Request $request){
        $request->validate([
           'sortname'=>'required',
           'name'=>'required',
           'phonecode'=>'required',
           'status'=>'required',

        ]);
        $countries= new Country();
        $countries->sortname=$request->sortname;
        $countries->name=$request->name;
        $countries->phonecode=$request->phonecode;
        $countries->status=$request->status;
        $countries->save();
        Alert::success('Success!','Added countries Successfuly.');
        return redirect()->route('countries.list');
       }

       public function countries_edit($id)
       {
       $countries=Country::find($id);
       return view('admin.setting.countries.countries_edit',compact('countries'));
       }

       public function countries_update(Request $request){
        $request->validate([
            'sortname'=>'required',
            'name'=>'required',
            'phonecode'=>'required',
            'status'=>'required',

         ]);

        $countries=Country::find($request->id);
        $countries->sortname=$request->sortname;
        $countries->name=$request->name;
        $countries->phonecode=$request->phonecode;
        $countries->status=$request->status;
        $countries->save();
        Alert::success('Success!','countries Updated Successfuly.');
        return redirect()->route('countries.list');
       }
       public function countries_delete($id){
        $countries=  Country::find($id);
        $countries->delete();
        Alert::Success('Success!','Deleted countries Successfuly.');
        return redirect()->route('countries.list');
    }

    public function countries_change_status(Request $request){
        $countries=Country::find($request->countries_id);
        $countries->status=$request->status;
        $countries->save();
        return response()->json(['success'=>'success!!']);

       }

}
