<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CityController extends Controller
{
    // public function cities_list(){
    //     $cities=City::get();
    //     return view('admin/setting/cities/cities_list',compact('cities'));
    // }

    public function cities_list(Request $request){
        if ($request->ajax()) {
            $data = City::select('*');
                   return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('state',function($row){
                        $state = State::where('id',$row->state_id)->select('name')->get();
                        return $state[0]->name;
                    })
                    ->addColumn('status',function($row){
                        $btn = '<select class="form-control" onchange="change_status_cities(`'.$row->id.'`,this.value);"><option value="1" '.($row->status==1?'selected':'').'>Active</option><option value="0" '.($row->status==0?'selected':'').'>Inactve</option></select>';
                           return $btn;
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a herf="'.url("admin/cities-edit/".$row->id).'" class="btn btn-primary btn-sm" title="Edit"><i class="bx bx-edit text-white"></i></a>'
                           ." ".'<a class="btn btn-sm btn-danger" href="javascript:void(0);" onclick="deleted('.$row->id.');" title="Delete"><i class="bx bxs-message-x"></i></a>';
                           return $btn;
                    })
                    ->rawColumns(['status','action'])
                    ->make(true);
        }

        return view('admin/setting/cities/cities_list');
    }
    public function cities_view(){
        $states=State::get();
        return view('admin/setting/cities/cities_add',compact('states'));
    }
    public function cities_add(Request $request){
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

        $cities= new City();
        $cities->name=$request->name;
        $cities->state_id=$request->states_id;
        $cities->status=$request->status;
        $cities->image=$Image_path;
        $cities->save();
        Alert::success('Success!','Added cities Successfuly.');
        return redirect()->route('cities.list');
       }

       public function cities_edit($id)
       {
            $states=State::get();
            $cities=City::find($id);
            return view('admin/setting/cities/cities_edit',compact('cities','states'));
       }

       public function cities_update(Request $request){
        $request->validate([
            'name'=>'required',
            'countries_id'=>'required',
            // 'image'=>'nullable|image|mimes:jpg,png,jpeg,pdf|max:2024',
            'status'=>'required',
         ]);

           $cities=City::find($request->id);
        if($request->image){
            $ImageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('logo/'), $ImageName);
            $Image_path = 'logo/'.$ImageName;
            $cities->image=$Image_path ;
            if(!empty($request->oldimage)&&file_exists(public_path('/').$request->oldimage))
            {
                unlink(public_path('/').$request->oldimage);
            }
        }
        $cities->name=$request->name;
        $cities->state_id=$request->states_id;
        $cities->status=$request->status;
        $cities->save();
        Alert::success('Success!','cities Updated Successfuly.');
        return redirect()->route('cities.list');
       }
       public function cities_delete($id){

        $image =  City::find($id);
        // if(file_exists(public_path('/').$image->image))
        // {
        //     unlink(public_path('/').$image->image);
        // }
        $image->delete();
        Alert::Success('Success!','Deleted cities Successfuly.');
        return redirect()->route('cities.list');
    }

    public function cities_change_status(Request $request){
        //dd($request->all());
        $cities=City::find($request->cities_id);
        $cities->status=$request->status;
        $cities->save();
        return response()->json(['success'=>'success!!']);

       }

}
