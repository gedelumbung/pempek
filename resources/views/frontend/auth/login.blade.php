@extends("frontend.layout.login")

@section("title", "Log In - ".cache('NamaInstansi'))

@section("content")
<form action="{{ url("login") }}" method="post">
    {!! csrf_field() !!}

    <div class="form-group mb-lg {{ $errors->has('nip') ? 'has-error' : '' }}">
        <label>NIP</label>
        <div class="input-group input-group-icon">
            <input name="nip" type="text" class="form-control input-lg" value="{{ old('nip') }}" />
            <span class="input-group-addon">
                <span class="icon icon-lg">
                    <i class="fa fa-user"></i>
                </span>
            </span>
        </div>

        @if ($errors->has('nip'))
            <span class="help-block">
                <strong>{{ $errors->first('nip') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group mb-lg {{ $errors->has('password') ? 'has-error' : '' }}">
        <div class="clearfix">
            <label class="pull-left">Kata Sandi</label>
            <!-- <a href="{{ url('/password/reset') }}" class="pull-right">Lupa Password?</a> -->
        </div>
        <div class="input-group input-group-icon">
            <input name="password" type="password" class="form-control input-lg" />
            <span class="input-group-addon">
                <span class="icon icon-lg">
                    <i class="fa fa-lock"></i>
                </span>
            </span>
        </div>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-8">
            <div class="checkbox-custom checkbox-default">
                <input id="RememberMe" name="remember" type="checkbox"/>
                <label for="RememberMe">Ingat Saya</label>
            </div>
        </div>
        <div class="col-sm-4 text-right">
            <button type="submit" class="btn btn-primary hidden-xs">Log In</button>
            <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Log In</button>
        </div>
    </div>

  <!--   <span class="mt-lg mb-lg line-thru text-center text-uppercase">
        <span>or</span>
    </span>

    <p class="text-center">Don't have an account yet? <a href="{{ url("register") }}">Sign Up!</a> -->
</form>
@endsection