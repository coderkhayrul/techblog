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
                    @permission(['Post Add', 'All'])
                        <a class="btn btn-sm btn-primary pull-right"href="{{ route('post.create') }}">Create Post</a>
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
                <th>Image</th>
                <th>Title</th>
                <th>Author</th>
                <th>Total View</th>
                <th>Hot News</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($posts as $i => $data)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>
                        @if (file_exists(public_path('/upload/post/').$data->list_image))
                            <img class="img img-responsive" src="{{ asset('upload/post/').'/'.$data->thumb_image }}" alt="" width="122px">
                        @else

                        @endif
                    </td>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->view_count }}</td>
                    <td>
                        {!! Form::open(['route' => ['post.hot-news', $data->id],'style' => 'display:inline']) !!}
                            @if($data->hot_news == 1)
                                {!! Form::submit('No', ['class' => 'btn btn-danger btn-sm']) !!}
                            @else
                                {!! Form::submit('Yes', ['class' => 'btn btn-success btn-sm']) !!}
                            @endif
                        {!! Form::close() !!}
                    </td>
                    <td>
                        {!! Form::open(['route' => ['post.post-status', $data->id],'style' => 'display:inline']) !!}
                            @if($data->status == 1)
                                {!! Form::submit('Unpublish', ['class' => 'btn btn-danger btn-sm']) !!}
                            @else
                                {!! Form::submit('Publish', ['class' => 'btn btn-success btn-sm']) !!}
                            @endif
                        {!! Form::close() !!}
                    </td>
                    <td>
                        @permission(['Comment View', 'All'])
                            <a class="btn btn-sm btn-info" href="{{ route('comment.view',$data->id) }}">Comments</a>
                        @endpermission
                        @permission(['Post Update', 'All'])
                        <a class="btn btn-sm btn-primary" href="{{ route('post.edit',$data->id) }}">Edit</a>
                    @endpermission
                        @permission(['Post Delete', 'All'])
                            {!! Form::open(['route' => ['post.destroy', $data->id],'style' => 'display:inline']) !!}
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
