<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    public function customer_list(){
        $customer=User::where('user_type',Auth::user()->user_type='customer')->get();
        return view('manage_user/customer/customer_list',compact('customer'));
    }
    public function customer_view(){
        return view('manage_user/customer/customer_add');
    }
    public function customer_add(Request $request){
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

        $customer= new User();
        $customer->user_type=Config::get('app.user_type.6');
        $customer->name=$request->name;
        $customer->email=$request->email;
        $customer->password=$request->password;
        $customer->phone=$request->phone;
        $customer->website_link=$request->website_link;
        $customer->description=$request->description;
        $customer->location=$request->location;
        $customer->latitude=76859870987;
        $customer->longitude=749879600989;
        $customer->logo=$logo_path;
        $customer->save();
        Alert::success('Success!','Added customer Successfuly.');
        return redirect()->route('customer.list');
       }

       public function customer_edit($id)
       {
       $customer=User::find($id);
       return view('manage_user/customer/customer_edit',compact('customer'));
       }

       public function customer_update(Request $request){
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

           $customer=User::find($request->id);


        if($request->logo){
            $logoName = $request->file('logo')->getClientOriginalName();
            // $logoName = $logo.'_'.time().'.'.$request->logo->extension();
            $request->logo->move(public_path('logo/'), $logoName);
            $logo_path = 'logo/'.$logoName;
            $customer->logo=$logo_path;
            if(!empty($request->oldlogo)&&file_exists(public_path('/').$request->oldlogo))
            {
                unlink(public_path('/').$request->oldlogo);
            }
        }

        $customer->provider=$request->provider;
        $customer->name=$request->name;
        $customer->email=$request->email;
       // $customer->password=$request->password;
        $customer->phone=$request->phone;
        $customer->website_link=$request->website_link;
        $customer->description=$request->description;
        $customer->location=$request->location;
        $customer->status=$request->status;
        // $service_provider->latitude=$request->latitude;
        // $service_provider->longitude=$request->longitude;
        $customer->save();

        Alert::success('Success!','Customer Updated Successfuly.');

        return redirect()->route('customer.list');


       }
       public function customer_delete($id){

        $logo =  User::find($id);
        if(file_exists(public_path('/').$logo->logo))
        {
            unlink(public_path('/').$logo->logo);
        }
        $logo->delete();
        Alert::Success('Success!','Deleted customer Successfuly.');
        return redirect()->route('customer.list');
    }

    public function customer_change_status(Request $request){
        //dd($request->all());
        $customer=User::find($request->customer_id);
        $customer->status=$request->status;
        $customer->save();
        return response()->json(['success'=>'success!!']);

       }

}
