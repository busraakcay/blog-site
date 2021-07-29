@extends('adminLayouts.app')

@section('content')

<div class="container">
    <div class="mt-5">
        <div class="container">
            <div class="card">
                <div class="card-header mt-0 bg-dark text-white"><b>{{ __('Add New Admin') }}</b></div>
                <div class="card-body border-bottom">
                    <form action="{{ route('manage.store') }}" method="post">
                        <div class="form-group">
                            <label for="name">{{ __('Name Surname') }}</label>
                            <input type="text" class="form-control" name="name" id="name"></input>
                        </div>
                        <div class="form-group">
                            <label for="username">{{ __('Username') }}</label>
                            <input type="text" class="form-control" name="username" id="username"></input>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com"></input>
                        </div>
                        <div class="form-group">
                            <label for="role">{{ __('Admin Role') }}</label>
                            <input type="text" class="form-control" name="role" id="role"></input>
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>
                            <input type="password" class="form-control" name="password" id="password"></input>
                        </div>
                        @csrf
                        <button type='submit' class="btn btn-dark pull-right my-3 ml-auto mr-3">
                            {{ __('Add') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection