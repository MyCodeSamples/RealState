<?php

namespace App\Http\Controllers;

use App\Models\Amenety;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AmenetyController extends Controller
{
    public function ameneties_list(){
        $ameneties=Amenety::get();
        return view('manage_user.amenities.ameneties_list',compact('ameneties'));

    }
    public function ameneties_view(){
        return view('manage_user.amenities.ameneties_add');
    }
    public function ameneties_add(Request $request){

        $request->validate([

           'name'=>'required',
           'status'=>'required',

        ]);


        $ameneties= new Amenety();
        $ameneties->name=$request->name;
        $ameneties->status=$request->status;
        $ameneties->save();
        Alert::success('Success!','Added ameneties Successfuly.');
        return redirect()->route('ameneties.list');
       }

       public function ameneties_edit($id)
       {
       $ameneties=Amenety::find($id);
       return view('manage_user.amenities.ameneties_edit',compact('ameneties'));
       }

       public function ameneties_update(Request $request){
        $request->validate([

            'name'=>'required',
            'status'=>'required',

         ]);

           $ameneties=Amenety::find($request->id);



        $ameneties->name=$request->name;
        $ameneties->status=$request->status;


        $ameneties->save();

        Alert::success('Success!','ameneties Updated Successfuly.');

        return redirect()->route('ameneties.list');


       }
       public function ameneties_delete($id){

        $ameneties=  Amenety::find($id);

        $ameneties->delete();
        Alert::Success('Success!','Deleted ameneties Successfuly.');
        return redirect()->route('ameneties.list');
    }

    public function ameneties_change_status(Request $request){

        $ameneties=Amenety::find($request->ameneties_id);
        $ameneties->status=$request->status;
        $ameneties->save();
        return response()->json(['success'=>'success!!']);

       }

}
