@extends('admin.layout.master')

@section('custrom_top')
<link rel="stylesheet" href="{{ asset('backend') }}/assets/css/lib/chosen/chosen.min.css">
@endsection

@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{ $page_name }}</strong>
                        <a class="btn btn-sm btn-primary pull-right"href="{{ route('comment.view',$id) }}">Back</a>
                    </div>
                    <div class="card-body">
                        <!-- Credit Card -->
                        <div id="pay-invoice">
                            <div class="card-body">
                                @if(count($errors)> 0)
                                <div class="alert  alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                  </div>
                                @endif
                                @if(Session::has('success'))
                                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                    <span class="badge badge-pill badge-success">Success</span> {{ Session::get('success') }}
                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">×</span>
                                      </button>
                                  </div>
                                @endif
                                <div class="card-title">
                                    <h3 class="text-center">{{ $page_name }}</h3>
                                </div>
                                <hr>

                                {!! Form::open(['route' => 'comment.store', 'method' => 'post']) !!}
                                {!! Form::hidden('post_id',$id) !!}
                                <div class="form-group">
                                    {!! Form::label('comment', 'Comment',['class' => 'control-lablel mb-1']) !!}
                                    {!! Form::textarea('comment',null, ['class' => 'form-control mb-1', 'id' => 'comment']) !!}
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Replay</span>
                                    </button>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>

                    </div>
                </div> <!-- .card -->

            </div>
            <!--/.col-->
        </div>

    </div><!-- .animated -->
</div><!-- .content -->

@endsection

@section('custrom_bottom')
<script src="{{ asset('backend') }}/assets/js/lib/chosen/chosen.jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>

<script type="text/javascript">
CKEDITOR.replace('editor', {
filebrowserUploadUrl: "{{route('ckeditor.store', ['_token' => csrf_token() ])}}",
filebrowserBrowseUrl: "{{ url('/laravel-filemanager') }}",
filebrowserUploadMethod: 'form',
});
</script>

@endsection
