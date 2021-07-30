@extends('adminLayouts.app')

@section('content')

<div class="container">
    <div class="mt-5">
        <div class="container">
            <div class="card">
                <div class="card-header mt-0 bg-dark text-white"><b>{{ __('Edit Admin') }}</b></div>
                <div class="card-body border-bottom">
                    <form action="{{ route('manage.update', $admin->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">{{ __('Name Surname') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $admin->name }}"></input>
                        </div>
                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>
                            <input type="text" class="form-control" name="username" id="username" value="{{ $admin->username }}"></input>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ $admin->email }}"></input>
                        </div>
                        <div class="form-group">
                            <label for="role">{{ __('Admin Role') }}</label>
                            <select class="form-select form-control" name="role">
                                    <option selected value="$admin->role->id">{{ucfirst($admin->role->role)}}</option>
                                    <option value="2">Admin</option>
                                    <option value="1">Root</option>
                                </select>
                        </div>
                        <button type='submit' class="btn btn-dark pull-right my-3 ml-auto mr-3">
                            {{ __('Edit') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection