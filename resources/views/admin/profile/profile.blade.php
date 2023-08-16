@extends('admin.layouts.layout')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Profile</h4>
                <h6>User Profile</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
               
                <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('patch')

                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Name</label>
                                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                                    required autofocus autocomplete="name">
                                @if ($errors->has('name'))
                                    <code>{{ $errors->first('name') }}</code>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" name="email" type="text" value="{{ old('email', $user->email) }}"
                                    required autocomplete="username">
                                @if ($errors->has('email'))
                                    <code>{{ $errors->first('email') }}</code>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" value="submit" class="btn btn-primary">Save</button>

                    </div>
                </form>
                <br>
                <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                    @csrf
                    @method('put')
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="current_password" value="{{ __('Current Password') }}">Password</label>
                            <div class="pass-group">
                                <input id="current_password" name="current_password" type="password"
                                    autocomplete="current-password" class=" pass-input">
                                <span class="fas toggle-password fa-eye-slash"></span>
                                @if ($errors->updatePassword->has('current_password'))
                                    <code>{{ $errors->updatePassword->first('current_password') }}</code>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="password" value="{{ __('New Password') }}">New Password</label>
                            <div class="pass-group">
                                <input id="password" name="password" type="password" autocomplete="new-password"
                                    class=" pass-input">
                                <span class="fas toggle-password fa-eye-slash"></span>
                                @if ($errors->updatePassword->has('password'))
                                    <code>{{ $errors->updatePassword->first('password') }}</code>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm
                                Password</label>
                            <div class="pass-group">
                                <input id="password_confirmation" name="password_confirmation" type="password"
                                    autocomplete="new-password" class=" pass-input">
                                <span class="fas toggle-password fa-eye-slash"></span>
                                @if ($errors->updatePassword->has('password_confirmation'))
                                    <code>{{ $errors->updatePassword->first('password_confirmation') }}</code>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" value="submit" class="btn btn-primary">Save</button>

                    </div>
                </form>

            </div>

        </div>
    </div>

    </div>
@endsection
