<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceProviderController extends Controller
{
    public function List_Service_provider(){
        $service_provider=User::where('user_type',Auth::user()->user_type='service provider')->get();
        return view('manage_user.service.list_service_provider',compact('service_provider'));
       }

    public function Show_Service_provider(){
        return view('manage_user.service.service_provider');
    }
   public function Add_Service_provider(Request $request){
    //dd($request->all());
    $request->validate([
       'provider'=>'required',
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

    $service_provider= new User();
    $service_provider->user_type=Config::get('app.user_type.2');
    $service_provider->provider=$request->provider;
    $service_provider->name=$request->name;
    $service_provider->email=$request->email;
    // $service_provider->password=$request->password;
    $service_provider->phone=$request->phone;
    $service_provider->website_link=$request->website_link;
    $service_provider->description=$request->description;
    $service_provider->location=$request->location;
    $service_provider->latitude=76859870987;
    $service_provider->longitude=749879600989;
    $service_provider->logo=$logo_path;
    $service_provider->save();
    Alert::success('Success!','Added Service Provider Successfuly.');
    return redirect()->route('list.service.provider');
   }

   public function Edit_Service_provider($id)
   {
   $service_provider=User::find($id);
   return view('manage_user.service.edit_service_provider',compact('service_provider'));
   }

   public function Update_Service_provider(Request $request){
    $request->validate([
        'provider'=>'required',
        'name'=>'required',
        'email'=>'nullable|email:rfc,dns|unique:service_providers,email,'.$request->id,
        // 'password'=>'required',
        'phone'=>'required|digits:10',
        'website_link'=>'required',
        'logo'=>'nullable|image|mimes:jpg,png,jpeg,pdf|max:2024',
        'description'=>'required',
        'location'=>'required',
     ]);

       $service_provider=User::find($request->id);


    if($request->logo){
        $logoName = $request->file('logo')->getClientOriginalName();
        // $logoName = $logo.'_'.time().'.'.$request->logo->extension();
        $request->logo->move(public_path('logo/'), $logoName);
        $logo_path = 'logo/'.$logoName;
        $service_provider->logo=$logo_path;
        if(!empty($request->oldlogo)&&file_exists(public_path('/').$request->oldlogo))
        {
            unlink(public_path('/').$request->oldlogo);
        }
    }

    $service_provider->provider=$request->provider;
    $service_provider->name=$request->name;
    $service_provider->email=$request->email;
    // $service_provider->password=$request->password;
    $service_provider->phone=$request->phone;
    $service_provider->website_link=$request->website_link;
    $service_provider->description=$request->description;
    $service_provider->location=$request->location;
    $service_provider->status=$request->status;
    // $service_provider->latitude=$request->latitude;
    // $service_provider->longitude=$request->longitude;
    $service_provider->save();

    Alert::success('Success!','Updated Service Provider Successfuly.');

    return redirect()->route('list.service.provider');


   }

   public function Delete_Service_provider($id){

        $logo =  User::find($id);
        if(file_exists(public_path('/').$logo->logo))
        {
            unlink(public_path('/').$logo->logo);
        }
        $logo->delete();
        Alert::Success('Success!','Deleted Service Provider Successfuly.');
        return redirect()->route('list.service.provider');
    }



   public function Change_service_provider_status(Request $request){
    //dd($request->all());
    $service_provider=User::find($request->provider_id);
    $service_provider->status=$request->status;
    $service_provider->save();
    return response()->json(['success'=>'success!!']);

   }
}
