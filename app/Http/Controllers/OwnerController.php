<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use RealRashid\SweetAlert\Facades\Alert;

class OwnerController extends Controller
{
    public function owner_list(){
        $owner=User::where('user_type',Auth::user()->user_type='owner')->get();
        return view('manage_user/owner/owner_list',compact('owner'));
    }
    public function owner_view(){
        return view('manage_user/owner/owner_add');
    }
    public function owner_add(Request $request){
        //dd($request->all());
        $request->validate([

           'name'=>'required',
           'email'=>'required|email:rfc,dns|unique:users',
           'password'=>'required',
           'phone'=>'required|digits:10',
           'logo'=>'required|image|mimes:jpg,png,jpeg,pdf|max:2024',
           'website_link'=>'required',
           'description'=>'required',
           'location'=>'required',
        ]);
    // logo....

       $logoName = $request->file('logo')->getClientOriginalName();
        // $logoName = $logo.'_'.time().'.'.$request->logo->extension();
        $request->logo->move(public_path('logo/'), $logoName);
        $logo_path = 'logo/'.$logoName;

        $owner= new User();
        $owner->user_type=Config::get('app.user_type.5');
        $owner->name=$request->name;
        $owner->email=$request->email;
        $owner->password=$request->password;
        $owner->phone=$request->phone;
        $owner->website_link=$request->website_link;
        $owner->description=$request->description;
        $owner->location=$request->location;
        $owner->latitude=76859870987;
        $owner->longitude=749879600989;
        $owner->logo=$logo_path;
        $owner->save();
        Alert::success('Success!','Added owner Successfuly.');
        return redirect()->route('owner.list');
       }

       public function owner_edit($id)
       {
       $owner=User::find($id);
       return view('manage_user/owner/owner_edit',compact('owner'));
       }

       public function owner_update(Request $request){
        $request->validate([

            'name'=>'required',
            // 'email'=>'nullable|email:rfc,dns|unique:service_providers,email,'.$request->id,
            // 'password'=>'required',
            'phone'=>'required|digits:10',
            'website_link'=>'required',
            'logo'=>'nullable|image|mimes:jpg,png,jpeg,pdf|max:2024',
            'description'=>'required',
            'location'=>'required',
         ]);

           $owner=User::find($request->id);


        if($request->logo){
            $logoName = $request->file('logo')->getClientOriginalName();
            // $logoName = $logo.'_'.time().'.'.$request->logo->extension();
            $request->logo->move(public_path('logo/'), $logoName);
            $logo_path = 'logo/'.$logoName;
            $owner->logo=$logo_path;
            if(!empty($request->oldlogo)&&file_exists(public_path('/').$request->oldlogo))
            {
                unlink(public_path('/').$request->oldlogo);
            }
        }

        $owner->provider=$request->provider;
        $owner->name=$request->name;
        $owner->email=$request->email;
        // $owner->password=$request->password;
        $owner->phone=$request->phone;
        $owner->website_link=$request->website_link;
        $owner->description=$request->description;
        $owner->location=$request->location;
        $owner->status=$request->status;
        // $service_provider->latitude=$request->latitude;
        // $service_provider->longitude=$request->longitude;
        $owner->save();

        Alert::success('Success!','Owner Updated Successfuly.');

        return redirect()->route('owner.list');


       }
       public function owner_delete($id){

        $logo =  User::find($id);
        if(file_exists(public_path('/').$logo->logo))
        {
            unlink(public_path('/').$logo->logo);
        }
        $logo->delete();
        Alert::Success('Success!','Deleted owner Successfuly.');
        return redirect()->route('owner.list');
    }

    public function owner_change_status(Request $request){
        //dd($request->all());
        $owner=User::find($request->owner_id);
        $owner->status=$request->status;
        $owner->save();
        return response()->json(['success'=>'success!!']);

       }

}
