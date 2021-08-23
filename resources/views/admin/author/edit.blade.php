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
                        <a class="btn btn-sm btn-primary pull-right"href="{{ route('author.index') }}">Back</a>
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

                                {!! Form::model($author,['route' => ['author.update', $author->id], 'method' => 'post']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'Name',['class' => 'control-lablel mb-1']) !!}
                                    {!! Form::text('name',null,['class' => 'form-control mb-1', 'id' => 'name']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('email', 'Email',['class' => 'control-lablel mb-1']) !!}
                                    {!! Form::email('email',null, ['class' => 'form-control mb-1', 'id' => 'email']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('password', 'Password',['class' => 'control-lablel mb-1']) !!}
                                    {!! Form::password('password', ['class' => 'form-control mb-1', 'id' => 'password']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::label('roles', 'Roles',['class' => 'control-lablel mb-1']) !!}
                                    {!! Form::select('roles[]',$roles, null, ['class' => 'form-control mb-1 myselect','data-placeholder' => 'Select Roles', 'multiple']) !!}
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-lg btn-info btn-block">
                                        <i class="fa fa-lock fa-lg"></i>&nbsp;
                                        <span id="payment-button-amount">Update</span>
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
<script>
    jQuery(document).ready(function() {
        jQuery(".myselect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Oops, nothing found!",
            width: "100%"
        });
    });
</script>
@endsection
