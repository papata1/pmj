@extends('layouts1.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-md-12 text-center">    <br/> </div>
            <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">  <div class="text-center">
                    <img src="images/t20131216155010_1298.png" width="50" />
                    </div><div class="text-center">เข้าสู่ระบบ</div></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-0">
                                <button type="submit" class="btn btn-lg btn-primary btn-block">
                                    Login
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
