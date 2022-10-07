<x-layout>
    @section('title')
        List of Countries
    @endsection
    <div class="card p-4">
        <div class="card-header" style="margin: 1px;">
            <a href="{{route('countries.view')}}" class="dt-button create-new btn btn-primary"
                tabindex="0" aria-controls="DataTables_Table_0" style="float: right;">
                <span><i class="bx bx-plus me-sm-2"></i>
                    <span class="d-none d-sm-inline-block">Add Countries</span>
                </span>
            </a>
            <h5 style="width: 50%;margin: 10px;">List of Countries</h5>
        </div>
        <div class="card-datatable table-responsive">
            <table id="myTable" class="datatables-basic table border-top ">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($countries as $list)
                        <tr>
                            <td>{{ $list->name }}</td>
                            <td>
                                <select class="form-control" onchange="change_status_countries($(this).find('option:selected').attr('data-id'),$(this).val())" >
                                    <option value="1" {{$list->status=='1'?'selected':''}} data-id="{{$list->id}}">Active</option>
                                    <option value="0" {{$list->status=='0'?'selected':''}} data-id="{{$list->id}}">Inactive</option>
                                </select>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ Route('countries.edit', $list->id) }}" title="Edit"><i class='bx bx-edit'></i></a>
                                <a class="btn btn-sm btn-danger " href="javascript:void(0);" onclick="deleted('{{$list->id}}');" title="Delete"><i class='bx bxs-message-x'></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function change_status_countries(countries_id,status)
        {
            $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "{{url('admin/countries-change-status')}}",
                    data: { status, countries_id,'_token':'{{csrf_token()}}'},
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
                window.location="{{url('/admin/countries-delete') }}/"+id;
             }
            });
        }
      </script>
</x-layout>
