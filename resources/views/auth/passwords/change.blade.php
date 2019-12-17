@extends('layouts.master')




<style>
.changepassword {
    text-align: center;
}
</style>
@section('content')
<div class="card">
    <div class="card-header changepassword">
      <div class="changepassword_title">
          <h4 class="card-title">Change Password</h4>
      </div>
@if(session('error'))
<div class="alert alert-icon alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="close">
        <span aria-hidden="true">&times;</span>
    </button>
    <i class="mdi mdi-check-all"></i>
    <strong>Oh snap!</strong>
    {{session('error')}}
</div>
@endif
                    <form method="POST" action="{{ route('password.update') }}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label for="currentpassword" class="col-md-4 col-form-label text-md-right">{{ __('Current password') }}</label>

                            <div class="col-md-6">
                                <input id="currentpassword" type="password" class="form-control @error('currentpassword') is-invalid @enderror" name="currentpassword" value="{{ old('currentpassword') }}" required autocomplete="name" autofocus>

                                @error('currentpassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                    </form>


</div>
@endsection
