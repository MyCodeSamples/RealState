<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function admin_list(){
        $admin=User::where('user_type',Auth::user()->user_type='admin')->get();
        return view('manage_user/admin/admin_list',compact('admin'));
    }

    public function admin_view(){
        return view('manage_user/admin/admin_add');
    }

    public function admin_add(Request $request){
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

        $admin= new User();
        $admin->user_type=Config::get('app.user_type.1');
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->password=$request->password;
        $admin->phone=$request->phone;
        $admin->website_link=$request->website_link;
        $admin->description=$request->description;
        $admin->location=$request->location;
        $admin->latitude=76859870987;
        $admin->longitude=749879600989;
        $admin->logo=$logo_path;
        $admin->save();
        Alert::success('Success!','Added Admin Successfuly.');
        return redirect()->route('admin.list');
    }

    public function admin_edit($id)
    {
       $admin=User::find($id);
       return view('manage_user/admin/admin_edit',compact('admin'));
    }

    public function admin_update(Request $request)
    {
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

        $admin=User::find($request->id);
        if($request->logo){
            $logoName = $request->file('logo')->getClientOriginalName();
            // $logoName = $logo.'_'.time().'.'.$request->logo->extension();
            $request->logo->move(public_path('logo/'), $logoName);
            $logo_path = 'logo/'.$logoName;
            $admin->logo=$logo_path;
            if(!empty($request->oldlogo)&&file_exists(public_path('/').$request->oldlogo))
            {
                unlink(public_path('/').$request->oldlogo);
            }
        }

        $admin->provider=$request->provider;
        $admin->name=$request->name;
        $admin->email=$request->email;
        // $admin->password=$request->password;
        $admin->phone=$request->phone;
        $admin->website_link=$request->website_link;
        $admin->description=$request->description;
        $admin->location=$request->location;
        $admin->status=$request->status;
        // $service_provider->latitude=$request->latitude;
        // $service_provider->longitude=$request->longitude;
        $admin->save();

        Alert::success('Success!','Admin Updated Successfuly.');

        return redirect()->route('admin.list');
    }
    
    public function admin_delete($id){

        $logo =  User::find($id);
        if(file_exists(public_path('/').$logo->logo))
        {
            unlink(public_path('/').$logo->logo);
        }
        $logo->delete();
        Alert::Success('Success!','Deleted Admin Successfuly.');
        return redirect()->route('admin.list');
    }

    public function admin_change_status(Request $request){
        //dd($request->all());
        $admin=User::find($request->admin_id);
        $admin->status=$request->status;
        $admin->save();
        return response()->json(['success'=>'success!!']);
    }
}
