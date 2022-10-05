<x-layout>
    @section('title')
        Add Ameneties
    @endsection
    <div class="p-4">
        <div class="card p-4">
            <div style="padding-left: 100px;padding-right: 100px;">
                <form  action="{{ route('ameneties.add') }}" method="POST" enctype="multipart/form-data"
                    class="pl-5">
                    <h4> Add ameneties!</h4>
                    <hr />
                    @csrf
                    <div class="row form-group">

                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" name="name"  class="form-control" placeholder="Enter Name">
                            @error('name')
                               <Span class="error-field text-danger">{{$message}}</Span>
                            @enderror
                        </div>


                               <div class="col-md-6">
                                   <label for="status">Status</label>
                                   <select class="form-control" name="status" id="status">
                                       <option value="1">Active</option>
                                       <option value="0">Inactive</option>
                                      </select>
                                      @error('status')
                               <Span class="error-field text-danger">{{$message}}</Span>
                                 @enderror
                                 <br />  
                          
                          </div>
                          <button type="submit"  class="btn btn-success">Submit</button>
                         <div>  
                 
                 


        



                  
                </form>

            </div>
        </div>
    </div>

</x-layout>
