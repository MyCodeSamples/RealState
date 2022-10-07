<x-layout>
    @section('title')
        Add Cities
    @endsection
    <div class="p-4">
        <div class="card p-4">
            <div class="card-header" style="margin: 1px;">
                <a href="{{route('cities.list')}}" class="dt-button create-new btn btn-primary"
                    tabindex="0" aria-controls="DataTables_Table_0" style="float: right;">
                    <span>
                        <span class="d-none d-sm-inline-block">Back</span>
                    </span>
                </a>
                <h5 style="width: 50%;margin: 10px;">Add Cities!</h5>
            </div>
            <div style="padding-left: 100px;padding-right: 100px;">
                <form  action="{{ route('cities.add') }}" method="POST"class="pl-5" enctype="multipart/form-data">

                    @csrf
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="states_id">State</label>
                            <select class="form-control" name="states_id" >
                                @foreach ($states as $list)
                               <option value="{{$list->id}}" >{{$list->name}}</option>
                                 @endforeach
                            </select>
                            @error('states_id')
                               <Span class="error-field text-danger">{{$message}}</Span>
                           @enderror
                      </div>
                        <div class="col-md-6">
                            <label for="name">State</label>
                            <input type="text" name="name"class="form-control" placeholder="Enter Name">
                            @error('name')
                               <Span class="error-field text-danger">{{$message}}</Span>
                           @enderror
                         </div>


                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                                <span class="field_error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" >Active</option>
                                <option value="0">Inactive</option>
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
