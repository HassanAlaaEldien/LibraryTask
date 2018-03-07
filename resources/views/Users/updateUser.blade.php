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

        <form class="form-horizontal" method="post" action="{{ route('updateUser',['user' => $user->id]) }}">
            <div class="box-body">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control"
                               value="{{  Request::old('name') ? Request::old('name') : isset($user) ? $user->name : '' }}"
                               name="name" id="name" placeholder="name">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control"
                               value="{{  Request::old('email') ? Request::old('email') : isset($user) ? $user->email : '' }}"
                               id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10">
                        <input type="number" step="1" pattern="\d+"
                               value="{{  Request::old('phone') ? Request::old('phone') : isset($user) ? $user->phone : '' }}"
                               class="form-control" id="inputEmail3" name="phone" placeholder="Phone">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                        <input type="text" name="address" class="form-control"
                               value="{{  Request::old('address') ? Request::old('address') : isset($user) ? $user->address : '' }}"
                               id="inputEmail3" placeholder="Address">
                    </div>
                </div>
            {{csrf_field()}}

            <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Update User</button>
                </div>
                <!-- /.box-footer -->
            </div>
        </form>
    </div>
@endsection