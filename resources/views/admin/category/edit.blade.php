@extends('admin.layout.master')

@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">{{ $page_name }}</strong>
                        <a class="btn btn-sm btn-primary pull-right"href="{{ route('category.index') }}">Back</a>
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

                                {!! Form::model($category,['route' => ['category.update', $category->id], 'method' => 'post']) !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'Name',['class' => 'control-lablel mb-1']) !!}
                                    {!! Form::text('name',null,['class' => 'form-control mb-1', 'id' => 'name']) !!}
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
