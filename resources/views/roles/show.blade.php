@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('roles.index') }}">Role</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                                  <a href="{{ route('roles.index') }}" class="btn btn-light">Back</a>
                             </div>
                             <div class="card-body">
                                 @include('roles.show_fields')
                                 <div class="row">
                                    <h4>permissions</h4>
                                    @include('permissions.table')

                                    {{-- @include('roles.table_permissions') --}}
                                </div>
                             </div>

                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
@push('scripts')

    <script>




    // $('#permissions-table').pagination({
    //     dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 40],
    //     pageSize: 5,
    //     showGoInput: true,
    //     showGoButton: true,
    //     callback: function(data, pagination) {
    //         // template method of yourself
    //         var html = template(data);
    //         dataContainer.html(html);
    //     }
    // })
    // $('#permissions-table').dataTable({
    //         "scrollY": "350px",
    //         "scrollCollapse": true,
    //         "bSort": false,
    //         "paging": true
    //     });




        function getMessage(roleId,permissionId) {
            console.log(roleId,permissionId);
            jQuery.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
            jQuery.ajax({
                headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  },
                  url: "/roles/"+roleId+"/permissions/"+permissionId,
                  method: 'post',
                  success: function(result){
                     console.log(result);
                  }
                });
        }
    </script>
@endpush
