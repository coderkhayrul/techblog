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
                    <li><a href="#">Post</a></li>
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
                <th>Post</th>
                @permission(['Comment Approval', 'All'])
                <th>Comment</th>
                @endpermission
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($comments as $i => $data)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->post->title }}</td>
                    <td>{{ $data->comment }}</td>
                    @permission(['Comment Approval', 'All'])
                    <td>
                        {!! Form::open(['route' => ['comment.status', $data->id],'style' => 'display:inline']) !!}
                            @if($data->status == 1)
                                {!! Form::submit('Unpublish', ['class' => 'btn btn-danger btn-sm']) !!}
                            @else
                                {!! Form::submit('Publish', ['class' => 'btn btn-success btn-sm']) !!}
                            @endif
                        {!! Form::close() !!}
                    </td>
                    @endpermission
                    <td>
                        @permission(['Comment Reply', 'All'])
                        <a class="btn btn-sm btn-primary" href="{{ route('comment.replay',$data->post_id) }}">Reply</a>
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
