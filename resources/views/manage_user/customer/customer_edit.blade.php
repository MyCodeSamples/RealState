<x-layout>
    @section('title')
    Edit Customer
    @endsection
    <div class="p-4">
        <div class="card p-4">
            <div class="card p-4">
                <div class="card-header" style="margin: 1px;">
                    <a href="{{route('customer.list')}}" class="dt-button create-new btn btn-primary"
                        tabindex="0" aria-controls="DataTables_Table_0" style="float: right;">
                        <span>
                            <span class="d-none d-sm-inline-block">Back</span>
                        </span>
                    </a>
                    <h5 style="width: 50%;margin: 10px;"> Edit Customer!</h5>
            </div>
    <div style="padding-left: 100px;padding-right: 100px;">
    <form action="{{Route('customer.update', $customer->id)}}" method="POST" enctype="multipart/form-data" class="pl-5" >

        @csrf
    <div class="row form-group">
        {{-- <div class="col-md-6">
    <label for="provider">Providers</label>


</select>
    <select name="provider" id="provider" class="form-control">
        <option selected disabled>Select Service Providers</option>
        <option value="Builder Developers" {{ ($service_provider->provider=='Builder Developers')?'selected':'' }}>Builder Developers</option>
        <option value="Architect" {{ ($service_provider->provider=='Architect')?'selected':'' }}>Architect</option>
        <option value="Interior Designers" {{ ($service_provider->provider=='Interior Designers')?'selected':'' }}>Interior Designers</option>
        <option value="Vastu Consultants" {{ ($service_provider->provider=='Vastu Consultants')?'selected':'' }}>Vastu Consultants</option>
        <option value="Building Contractors" {{ ($service_provider->provider=='Building Contractors')?'selected':'' }}>Building Contractors</option>
        <option value="Property Due Diligence" {{ ($service_provider->provider=='Property Due Diligence')?'selected':'' }}>Property Due Diligence</option>

    </select>
    @error('provider')
        <Span class="error-field text-danger">{{$message}}</Span>
    @enderror
        </div> --}}
        <div class="col-md-6">
     <label for="name">Name</label>
     <input type="text" name="name" value="{{$customer->name}}" class="form-control" placeholder="Enter Name">
     @error('name')
        <Span class="error-field text-danger">{{$message}}</Span>
    @enderror
        </div>

        <div class="col-md-6">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{$customer->email}}" class="form-control" placeholder="Enter Email">
            @error('email')
            <Span class="error-field text-danger">{{$message}}</Span>
        @enderror
        </div>
    </div>
    <div class="row form-group">

        {{-- <div class="col-md-6">
            <label for="password">Password</label>
            <input type="password" value="{{$customer->password}}" name="password" class="form-control" placeholder="Enter Password*">
            @error('password')
            <Span class="error-field text-danger">{{$message}}</Span>
        @enderror
        </div> --}}



    </div>
    <div class="row form-group">

        <div class="col-md-6">
            <label for="phone">Phone</label>
            <input type="number" value="{{$customer->phone}}" name="phone" class="form-control" placeholder="Enter Phone*">
            @error('phone')
            <Span class="error-field text-danger">{{$message}}</Span>
        @enderror
        </div>

        <div class="col-md-6">
            <label for="website_link">Website Link</label>
            <input type="text" value="{{$customer->website_link}}" name="website_link" class="form-control" placeholder="Enter Website Link">
            @error('website_link')
            <Span class="error-field text-danger">{{$message}}</Span>
        @enderror
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-6">
            <label for="description">Description</label>
            <textarea type="text" class="form-control" name="description" placeholder="Enter Description...">{{$customer->description}}</textarea>
            @error('description')
            <Span class="error-field text-danger">{{$message}}</Span>
        @enderror
        </div>
            <div class="col-md-6">
                <label for="location">Location</label>
                <input type="text" name="location" value="{{$customer->location}}" class="form-control" placeholder="Enter Location">
                @error('location')
            <Span class="error-field text-danger">{{$message}}</Span>
            @enderror
            </div>
            <div class="col-md-6">

                <input type="hidden" name="latitude" id="latitude" class="form-control" placeholder="Enter latitude">
            </div>
            <div class="col-md-6">

                <input type="hidden" name="longitude" id="longitude" class="form-control" placeholder="Enter longitude">
            </div>
            <div class="col-md-6">
                <label for="logo">Logo</label>
                <input type="hidden" name="oldlogo" id="oldlogo" class="form-control" value="{{$customer->logo}}">
                <input type="file" name="logo" id="logo" class="form-control">
                @error('logo')
                    <span class="field_error text-danger">{{ $message }}</span>
                @enderror
                @if(!empty($customer->logo))
                <img src="{{URL::to($customer->logo)}}">
                @endif
            </div>
            <div class="col-md-4">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    <option value="Active" {{ ($customer->status=='Active')?'selected':'' }}>Active</option>
                    <option value="Inactive" {{ ($customer->status=='Inactive')?'selected':'' }}>Inactive</option>
                   </select>
             </div>

    </div>
    <br/>
    <button type="submit" class="btn btn-success">Submit</button>
    </form>
    {{--
    <button onclick="getLocation()">Try It</button>

    <p id="demo"></p> --}}
    </div>

        </div>
    </div>
    <script>
        var x = document.getElementById("demo");
        function getLocation(){
            if(navigator.geolocation){
                navigator.geolocation.getCurrentPosition(showPosition);
            }else{
                x.innerHTML="GeoLocation is not supported by this browser.";
            }
        }
        function showPosition(position){
            // x.innerHTML = "Latitude: " + position.coords.latitude +
            // "<br>Longitude: " + position.coords.longitude;

            document.querySelector("#latitude").value=position.coords.latitude;

            document.querySelector("#longitude").value=position.coords.longitude;

        }
    </script>
    </x-layout>
