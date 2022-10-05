<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use RealRashid\SweetAlert\Facades\Alert;

class BuilderController extends Controller
{
    public function builder_list(){
        $builder=User::where('user_type',Auth::user()->user_type='builder')->get();
        return view('manage_user/builder/builder_list',compact('builder'));
    }
    public function builder_view(){
        return view('manage_user/builder/builder_add');
    }
    public function builder_add(Request $request)
    {
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

        $builder= new User();
        $builder->user_type=Config::get('app.user_type.3');
        $builder->name=$request->name;
        $builder->email=$request->email;
        $builder->password=$request->password;
        $builder->phone=$request->phone;
        $builder->website_link=$request->website_link;
        $builder->description=$request->description;
        $builder->location=$request->location;
        $builder->latitude=76859870987;
        $builder->longitude=749879600989;
        $builder->logo=$logo_path;
        $builder->save();
        Alert::success('Success!','Added builder Successfuly.');
        return redirect()->route('builder.list'); 
    }

    public function builder_edit($id)
    {
       $builder=User::find($id);
       return view('manage_user/builder/builder_edit',compact('builder'));
    }

    public function builder_update(Request $request)
    {
        $request->validate([

            'name'=>'required',
            // 'email'=>'nullable|email:rfc,dns|unique:service_providers,email,'.$request->id,
           //'password'=>'required',
            'phone'=>'required|digits:10',
            'website_link'=>'required',
            'logo'=>'nullable|image|mimes:jpg,png,jpeg,pdf|max:2024',
            'description'=>'required',
            'location'=>'required',
         ]);

           $builder=User::find($request->id);


        if($request->logo){
            $logoName = $request->file('logo')->getClientOriginalName();
            // $logoName = $logo.'_'.time().'.'.$request->logo->extension();
            $request->logo->move(public_path('logo/'), $logoName);
            $logo_path = 'logo/'.$logoName;
            $builder->logo=$logo_path;
            if(!empty($request->oldlogo)&&file_exists(public_path('/').$request->oldlogo))
            {
                unlink(public_path('/').$request->oldlogo);
            }
        }

        $builder->provider=$request->provider;
        $builder->name=$request->name;
        $builder->email=$request->email;
       //$builder->password=$request->password;
        $builder->phone=$request->phone;
        $builder->website_link=$request->website_link;
        $builder->description=$request->description;
        $builder->location=$request->location;
        $builder->status=$request->status;
        // $service_provider->latitude=$request->latitude;
        // $service_provider->longitude=$request->longitude;
        $builder->save();

        Alert::success('Success!','Builder Updated Successfuly.');

        return redirect()->route('builder.list');
    }
    public function builder_delete($id){

        $logo =  User::find($id);
        if(file_exists(public_path('/').$logo->logo))
        {
            unlink(public_path('/').$logo->logo);
        }
        $logo->delete();
        Alert::Success('Success!','Deleted builder Successfuly.');
        return redirect()->route('builder.list');
    }

    public function builder_change_status(Request $request){
        //dd($request->all());
        $builder=User::find($request->builder_id);
        $builder->status=$request->status;
        $builder->save();
        return response()->json(['success'=>'success!!']);
    }
}
