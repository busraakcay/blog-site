@extends('adminLayouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header mt-0 bg-dark text-white">{{ $user->username }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <b>{{ __('Your Role :  ') }}</b>{{ $user->role->role }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
