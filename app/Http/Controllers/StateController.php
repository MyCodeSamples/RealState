<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\datatables;
use RealRashid\SweetAlert\Facades\Alert;

class StateController extends Controller
{
    public function states_list(){
        $states=State::get();
        return view('admin/setting/states/states_list',compact('states'));
    }


    // public function states_list(Request $request){
    //     if($request->ajax()){
    //     $data=State::latest()->get();
    //     return datatables::of($data)
    //     ->addIndexColumn()
    //     ->addColumn('action',function($row){
    //    $actionBtn='<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a>
    //      <a href="javascript:void(0)" class="delete btn btn-success btn-sm">Delete</a>';
    //    return $actionBtn;
    //     })
    //     ->rawCoumns(['action'])
    //     ->make(true);
    //     }
    // }
    public function states_view(){
        $countries=Country::get();
        return view('admin/setting/states/states_add',compact('countries'));
    }
    public function states_add(Request $request){
        //dd($request->all());
        $request->validate([
            'name'=>'required',
            'countries_id'=>'required',
            // 'image'=>'nullable|image|mimes:jpg,png,jpeg,pdf|max:2024',
            'status'=>'required',
        ]);
    // Image....

       $ImageName = $request->file('image')->getClientOriginalName();
        $request->image->move(public_path('logo/'), $ImageName);
        $Image_path = 'logo/'.$ImageName;

        $states= new State();
        $states->name=$request->name;
        $states->country_id=$request->countries_id;
        $states->status=$request->status;
        $states->image=$Image_path;
        $states->save();
        Alert::success('Success!','Added states Successfuly.');
        return redirect()->route('states.list');
       }

       public function states_edit($id)
       {
        $countries=Country::get();
       $states=State::find($id);
       return view('admin/setting/states/states_edit',compact('states','countries'));
       }

       public function states_update(Request $request){
        $request->validate([
            'name'=>'required',
            'countries_id'=>'required',
            // 'image'=>'nullable|image|mimes:jpg,png,jpeg,pdf|max:2024',
            'status'=>'required',
         ]);

           $states=State::find($request->id);
        if($request->image){
            $ImageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('logo/'), $ImageName);
            $Image_path = 'logo/'.$ImageName;
            $states->image=$Image_path ;
            if(!empty($request->oldimage)&&file_exists(public_path('/').$request->oldimage))
            {
                unlink(public_path('/').$request->oldimage);
            }
        }
        $states->name=$request->name;
        $states->country_id=$request->countries_id;
        $states->status=$request->status;
        $states->save();
        Alert::success('Success!','states Updated Successfuly.');
        return redirect()->route('states.list');
       }
       public function states_delete($id){

        $image =  State::find($id);
        if(file_exists(public_path('/').$image->image))
        {
            unlink(public_path('/').$image->image);
        }
        $image->delete();
        Alert::Success('Success!','Deleted states Successfuly.');
        return redirect()->route('states.list');
    }

    public function states_change_status(Request $request){
        //dd($request->all());
        $states=State::find($request->states_id);
        $states->status=$request->status;
        $states->save();
        return response()->json(['success'=>'success!!']);

       }

}
