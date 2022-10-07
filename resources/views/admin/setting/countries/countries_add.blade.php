<x-layout>
    @section('title')
        Add Countries
    @endsection
    <div class="p-4">
        <div class="card p-4">
            <div class="card-header" style="margin: 1px;">
                <a href="{{route('countries.list')}}" class="dt-button create-new btn btn-primary"
                    tabindex="0" aria-controls="DataTables_Table_0" style="float: right;">
                    <span>
                        <span class="d-none d-sm-inline-block">Back</span>
                    </span>
                </a>
                <h5 style="width: 50%;margin: 10px;"> Add Countries!</h5>
          </div>
            <div style="padding-left: 100px;padding-right: 100px;">
                <form  action="{{ route('countries.add') }}" method="POST"class="pl-5">
                    @csrf
                    <div class="row form-group">

                        <div class="col-md-6">
                            <label for="sortname">Sort Name</label>
                            <input type="text" name="sortname"class="form-control" placeholder="Enter Sort Name">
                            @error('sortname')
                               <Span class="error-field text-danger">{{$message}}</Span>
                           @enderror
                        </div>

                        <div class="col-md-6">
                     <label for="name">Name</label>
                     <input type="text" name="name"class="form-control" placeholder="Enter Name">
                     @error('name')
                        <Span class="error-field text-danger">{{$message}}</Span>
                    @enderror
                        </div>



                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Phone Code</label>
                            <input type="number" name="phonecode" class="form-control" placeholder="Enter Phone Code">
                            @error('phonecode')
                               <Span class="error-field text-danger">{{$message}}</Span>
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
