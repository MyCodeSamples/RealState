<x-layout>
    @section('title')
        List of Customer
    @endsection
    <div class="card p-4">

        <div class="card-header">
            <a href="{{route('customer.view')}}" class="dt-button create-new btn btn-primary"
                tabindex="0" aria-controls="DataTables_Table_0" style="float: right;">


                <span><i class="bx bx-plus me-sm-2"></i>
                    <span class="d-none d-sm-inline-block">Add Customer</span>
                </span></a>
            <h5 style="width: 50%;">

                List of Customer!</h5>

        </div>

        <div class="card-datatable table-responsive">

            <table id="myTable" class="datatables-basic table border-top ">
                <thead>
                    <tr>

                        <th>Logo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Website Link</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer as $list)
                        <tr>

                            <td>
                                <input type="hidden" name="oldlogo" value="{{$list->logo}}">
                                <img src="{{URL::to($list->logo)}}" style="width: 100%;" alt="{{ $list->provider }}">
                            </td>

                            <td>{{ $list->name }}</td>
                            <td>{{ $list->email }}</td>
                            <td>{{ $list->phone }}</td>
                            <td>{{ $list->website_link }}</td>

                            <td>{{ $list->location }}</td>
                           <td>
                            <select class="form-control" name="" id="" onchange="change_status_customer($(this).find('option:selected').attr('data-id'),$(this).val())" style="size: 40px;">
                                <option value="Active" {{$list->status=='Active'?'selected':''}} data-id="{{$list->id}}">Active</option>
                                <option value="Inactive" {{$list->status=='Inactive'?'selected':''}} data-id="{{$list->id}}">Inactive</option>
                            </select>
                            {{-- <input data-id="{{$list->id}}" onchange="change_status(this);" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="Inactive" {{ $list->status=='Active' ? 'checked' : '' }}> --}}
                            </td>

                            <td>
                                <a class="btn ntn-sm btn-primary" href="{{ Route('customer.edit', $list->id) }}" title="Edit"><i class='bx bx-edit'></i></a>
                                <a class="btn ntn-sm btn-danger " href="javascript:void(0);" onclick="deleted('{{$list->id}}');" title="Delete"><i class='bx bxs-message-x'></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">

function change_status_customer(customer_id,status)
        {
            $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "{{url('admin/customer-change-status')}}",
                    data: { status, customer_id,'_token':'{{csrf_token()}}'},
                    success: function(data){
                    console.log(data.success)
                    }
                });
        }
        function change_status(e)
        {
            var status = $(e).prop('checked') == true ? 'Active' : 'Deactive';
            var agent_id = $(e).data('id');
            $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "{{url('admin/customer-change-status')}}",
                    data: { status, agent_id,'_token':'{{csrf_token()}}'},
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
                window.location="{{url('/admin/customer-delete') }}/"+id;
             }
            });
        }
      </script>
</x-layout>
