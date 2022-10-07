<x-layout>
    @section('title')
        Add Customer
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
                    <h5 style="width: 50%;margin: 10px;"> Add Customer!</h5>
            </div>
            <div style="padding-left: 100px;padding-right: 100px;">
                <form  action="{{ route('customer.add') }}" method="POST" enctype="multipart/form-data"
                    class="pl-5">

                    @csrf
                    <div class="row form-group">

                        <div class="col-md-6">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name">
                            @error('name')
                                <Span class="error-field text-danger">{{ $message }}</Span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
                            @error('email')
                                <Span class="error-field text-danger">{{ $message }}</Span>
                            @enderror
                        </div>

                    </div>
                    <div class="row form-group">

                        <div class="col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password*">
                            @error('password')
                                <Span class="error-field text-danger">{{ $message }}</Span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="phone">Phone</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Phone*">
                            @error('phone')
                                <Span class="error-field text-danger">{{ $message }}</Span>
                            @enderror
                        </div>


                    </div>
                    <div class="row form-group">



                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="website_link">Website Link</label>
                            <input type="text" name="website_link" class="form-control"
                                placeholder="Enter Website Link">
                            @error('website_link')
                                <Span class="error-field text-danger">{{ $message }}</Span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" name="description" placeholder="Enter Description..."></textarea>
                            @error('description')
                                <Span class="error-field text-danger">{{ $message }}</Span>
                            @enderror
                        </div>




                    </div>
                    <div class="row form-group">
                    <div class="col-md-6">
                        <label for="location">Location</label>
                        <input type="text" name="location" class="form-control" placeholder="Enter Location">
                        @error('location')
                            <Span class="error-field text-danger">{{ $message }}</Span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="logo">Logo</label>
                        <input type="file" name="logo" id="logo" class="form-control">
                        @error('logo')
                            <span class="field_error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    </div>
                    <br />
                    <div class="col-md-6">

                        <input type="hidden" name="latitude" id="latitude" class="form-control"
                            placeholder="Enter latitude">
                    </div>
                    <div class="col-md-6">

                        <input type="hidden" name="longitude" id="longitude" class="form-control"
                            placeholder="Enter longitude">
                    </div>
                    <button onclick="getLocation()" type="submit"  class="btn btn-success">Submit</button>
                </form>

                {{-- <button onclick="getLocation()">Try It</button>

                 <p id="demo"></p> --}}
            </div>
        </div>
    </div>
    <script>
        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "GeoLocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;

            document.querySelector("#latitude").value = position.coords.latitude;

            document.querySelector("#longitude").value = position.coords.longitude;

        }
    </script>
</x-layout>
