<x-layout>
    @section('title')
    Edit Ameneties
    @endsection
    <div class="p-4">
        <div class="card p-4">
            <div class="card-header" style="margin: 1px;">
                <a href="{{route('ameneties.list')}}" class="dt-button create-new btn btn-primary"
                    tabindex="0" aria-controls="DataTables_Table_0" style="float: right;">
                    <span>
                        <span class="d-none d-sm-inline-block">Back</span>
                    </span>
                </a>
                <h5 style="width: 50%;margin: 10px;">  Edit ameneties!</h5>
          </div>
    <div style="padding-left: 100px;padding-right: 100px;">
    <form action="{{Route('ameneties.update', $ameneties->id)}}" method="POST" enctype="multipart/form-data" >


        @csrf
    <div class="row form-group">



        <div class="col-md-6">
     <label for="name">Name</label>
     <input type="text" name="name" value="{{$ameneties->name}}" class="form-control" placeholder="Enter Name">
     @error('name')
        <Span class="error-field text-danger">{{$message}}</Span>
    @enderror
        </div>


        <div class="col-md-6">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
                <option value="1" {{ ($ameneties->status=='1')?'selected':'' }}>Active</option>
                <option value="0" {{ ($ameneties->status=='0')?'selected':'' }}>Inactive</option>
               </select>
         </div>
    </div>

    <br/>
    <button type="submit" class="btn btn-success">Submit</button>
    </form>

    </div>

        </div>
    </div>


    </x-layout>
