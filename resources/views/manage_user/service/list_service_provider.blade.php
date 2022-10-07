<x-layout>
    @section('title')
        List of Service Providers
    @endsection
    <div class="card p-4">
        <div class="card-header">
            <a href="http://127.0.0.1:8000/admin/service-provider" class="dt-button create-new btn btn-primary"
                tabindex="0" aria-controls="DataTables_Table_0" style="float: right;">


                <span><i class="bx bx-plus me-sm-2"></i>
                    <span class="d-none d-sm-inline-block">Add Provider</span>
                </span></a>
            <h5 style="width: 50%;">

                List of Service Providers</h5>

        </div>

        <div class="card-datatable table-responsive">

            <table id="myTable" class="datatables-basic table border-top ">
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Logo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        {{-- <th>Website Link</th>
                        <th>Location</th> --}}
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($service_provider as $list)
                        <tr>
                            <td>{{ $list->provider }}</td>
                            <td>
                                <input type="hidden" name="oldlogo" value="{{$list->logo}}">
                                <img src="{{URL::to($list->logo)}}" style="width:30%;" alt="{{ $list->provider }}">
                            </td>
                            <td>{{ $list->name }}</td>
                            <td>{{ $list->email }}</td>
                            <td>{{ $list->phone }}</td>
                            {{-- <td>{{ $list->website_link }}</td>

                            <td>{{ $list->location }}</td> --}}
                           <td>

                            <select class="form-control"  onchange="change_status_service($(this).find('option:selected').attr('data-id'),$(this).val())">

                                <option value="Active" {{$list->status=='Active'?'selected':''}} data-id="{{$list->id}}"  >Active</option>
                                <option value="Inactive" {{$list->status=='Inactive'?'selected':''}} data-id="{{$list->id}}">InActive</option>
                            </select>
                            {{-- <input data-id="{{$list->id}}" onchange="change_status(this);" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $list->status=='Active' ? 'checked' : '' }}> --}}

                        </td>

                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ Route('edit.service.provider', $list->id) }}" title="Edit"><i class='bx bx-edit'></i></a>
                                <a class="btn btn-sm btn-danger " href="javascript:void(0);" onclick="deleted('{{$list->id}}');" title="Delete"><i class='bx bxs-message-x'></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">

function change_status_service(provider_id,status)
        {
            $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "{{url('admin/changeStatus')}}",
                    data: { status, provider_id,'_token':'{{csrf_token()}}'},
                    success: function(data){
                        window.location.reload(true)
                    console.log(data.success)
                    }
                });

        }
        function change_status(e)
        {
            var status = $(e).prop('checked') == true ? 'Active' : 'Inactive';
            var provider_id = $(e).data('id');
            $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "{{url('admin/changeStatus')}}",
                    data: { status, provider_id,'_token':'{{csrf_token()}}'},
                    success: function(data){
                    console.log(data.success)
                    }
                });
        }


        function deleted(id)
        {
            swal({
               title: `Are you sure you want to delete this record?`,
               text: "If you delete this, it will be gone forever.",
               icon: "warning",
               buttons: true,
               dangerMode: true,
            })
            .then((willDelete) => {
             if (willDelete) {
                window.location="{{url('/admin/delete-service-provider') }}/"+id;
             }
            });
        }
      </script>
</x-layout>
