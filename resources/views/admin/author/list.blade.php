@extends('admin.layout.master')

@section('custrom_top')
<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/lib/datatable/dataTables.bootstrap.min.css">
@endsection

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>{{ $page_name }}</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Category</a></li>
                    <li class="active">Lists</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">{{ $page_name }}</strong>
                    @permission(['Author Add', 'All'])
                    <a class="btn btn-sm btn-primary pull-right"href="{{ route('author.create') }}">Create Author</a>
                    @endpermission
                </div>
                <div class="card-body">
                    @if(Session::has('success'))
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-success">Success</span> {{ Session::get('success') }}
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">×</span>
                          </button>
                      </div>
                    @endif
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($authors as $i => $data)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        @if($data->roles())
                        <ul style="margin: 10px">
                            @foreach ($data->roles()->get() as $role)
                            <li>{{ $role->name }}</li>
                            @endforeach

                        </ul>
                        @endif
                    </td>
                    <td>
                        @permission(['Author Update', 'All'])
                        <a class="btn btn-sm btn-primary" href="{{ route('author.edit',$data->id) }}">Edit</a>
                        @endpermission
                        @permission(['Author Delete', 'All'])
                       {!! Form::open(['route' => ['author.destroy', $data->id],'style' => 'display:inline']) !!}
                       {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                       {!! Form::close() !!}
                       @endpermission

                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
                </div>
            </div>
        </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection

@section('custrom_bottom')
<script src="{{ asset('backend') }}/assets/js/lib/data-table/datatables.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/lib/data-table/jszip.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="{{ asset('backend') }}/assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/lib/data-table/datatables-init.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    } );
</script>
@endsection
