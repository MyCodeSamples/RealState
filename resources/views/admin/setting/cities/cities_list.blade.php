<x-layout>
    @section('title')
        List of Cities
    @endsection
    <div class="card p-4">
        <div class="card-header" style="margin: 1px;">
            <a href="{{route('cities.view')}}" class="dt-button create-new btn btn-primary"
                tabindex="0" aria-controls="DataTables_Table_0" style="float: right;">
                <span><i class="bx bx-plus me-sm-2"></i>
                    <span class="d-none d-sm-inline-block">Add Cities</span>
                </span>
            </a>
            <h5 style="width: 50%;margin: 10px;">List of Cities</h5>
        </div>
        <div class="card-datatable table-responsive">
            <table  class="table table-bordered data-table">
                <thead>
                    <tr>
                        {{-- <th style="width: 10%;">Country</th> --}}
                        <th style="width: 10%;">City</th>
                        <th style="width: 10%;">State</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 10%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($cities as $list)
                        <tr>
                            <td>{{ $list->countries}}</td>
                            <td>{{ $list->name }}</td>
                            <td>
                                <img src="{{URL::to($list->image)}}" style="width: 20%;" alt="{{ $list->name}}">
                            </td>
                            <td>
                                <select class="form-control" onchange="change_status_cities($(this).find('option:selected').attr('data-id'),$(this).val())" >
                                    <option value="1" {{$list->status=='1'?'selected':''}} data-id="{{$list->id}}">Active</option>
                                    <option value="0" {{$list->status=='0'?'selected':''}} data-id="{{$list->id}}">Inactive</option>
                                </select>
                            </td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ Route('cities.edit', $list->id) }}" title="Edit"><i class='bx bx-edit'></i></a>
                                <a class="btn btn-sm btn-danger " href="javascript:void(0);" onclick="deleted('{{$list->id}}');" title="Delete"><i class='bx bxs-message-x'></i></a>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function change_status_cities(cities_id,status)
        {
            $.ajax({
                    type: "post",
                    dataType: "json",
                    url: "{{url('admin/cities-change-status')}}",
                    data: { status, cities_id,'_token':'{{csrf_token()}}'},
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
                window.location="{{url('/admin/cities-delete') }}/"+id;
             }
            });
        }


        $(function () {

    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('cities.list') }}",
        columns: [
          
            {data: 'name', name: 'name'},
            {data: 'state', name: 'state'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

  });
      </script>
</x-layout>
