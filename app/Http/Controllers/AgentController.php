<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use RealRashid\SweetAlert\Facades\Alert;

class AgentController extends Controller
{
    public function agent_list(){
        $agent=User::where('user_type',Auth::user()->user_type='agent')->get();
        return view('manage_user/agent/agent_list',compact('agent'));
    }

    public function agent_view(){
        return view('manage_user/agent/agent_add');
    }

    public function agent_add(Request $request)
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

        $agent= new User();
        $agent->user_type=Config::get('app.user_type.4');
        $agent->name=$request->name;
        $agent->email=$request->email;
        $agent->password=$request->password;
        $agent->phone=$request->phone;
        $agent->website_link=$request->website_link;
        $agent->description=$request->description;
        $agent->location=$request->location;
        $agent->latitude=76859870987;
        $agent->longitude=749879600989;
        $agent->logo=$logo_path;
        $agent->save();
        Alert::success('Success!','Added agent Successfuly.');
        return redirect()->route('agent.list');
    }

    public function agent_edit($id)
    {
        $agent=User::find($id);
        return view('manage_user/agent/agent_edit',compact('agent'));
    }

    public function agent_update(Request $request)
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

           $agent=User::find($request->id);


        if($request->logo)
        {
            $logoName = $request->file('logo')->getClientOriginalName();
            // $logoName = $logo.'_'.time().'.'.$request->logo->extension();
            $request->logo->move(public_path('logo/'), $logoName);
            $logo_path = 'logo/'.$logoName;
            $agent->logo=$logo_path;
            if(!empty($request->oldlogo)&&file_exists(public_path('/').$request->oldlogo))
            {
                unlink(public_path('/').$request->oldlogo);
            }
        }


        $agent->user_type=Config::get('app.user_type.4');
        $agent->name=$request->name;
        $agent->email=$request->email;
        //$agent->password=$request->password;
        $agent->phone=$request->phone;
        $agent->website_link=$request->website_link;
        $agent->description=$request->description;
        $agent->location=$request->location;
        $agent->status=$request->status;
        // $service_provider->latitude=$request->latitude;
        // $service_provider->longitude=$request->longitude;
        $agent->save();

        Alert::success('Success!','Agent Updated Successfuly.');

        return redirect()->route('agent.list');
    }
    public function agent_delete($id)
    {

        $logo =  User::find($id);
        if(file_exists(public_path('/').$logo->logo))
        {
            unlink(public_path('/').$logo->logo);
        }
        $logo->delete();
        Alert::Success('Success!','Deleted agent Successfuly.');
        return redirect()->route('agent.list');
    }

    public function agent_change_status(Request $request)
    {
        //dd($request->all());
        $agent=User::find($request->agent_id);
        $agent->status=$request->status;
        $agent->save();
        return response()->json(['success'=>'success!!']);
    }
}
