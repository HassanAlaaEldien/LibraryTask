@extends('layouts.master')
@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Horizontal Form</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @if(count($errors))
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    <span>{{ $error }}</span>
                </div>
            @endforeach
        @endif
        @if(\Illuminate\Support\Facades\Session::has('fail'))
            <div class="alert alert-danger">
                <span>{{ \Illuminate\Support\Facades\Session::get('fail') }}</span>
            </div>
        @endif
        <form class="form-horizontal" method="post" action="{{route('storeUser')}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3"
                               placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password Confirmation</label>

                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" class="form-control" id="inputPassword3"
                               placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                        <input type="number" step="1" pattern="\d+" class="form-control" id="inputEmail3" name="phone"
                               placeholder="Phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control" id="inputEmail3" placeholder="Address">
                    </div>
                </div>
            {{csrf_field()}}
            <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Create User</button>
                </div>
                <!-- /.box-footer -->
            </div>
        </form>
    </div>
@endsection