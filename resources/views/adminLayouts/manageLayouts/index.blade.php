@extends('adminLayouts.app')

@section('content')

<div class="container">
    <div class="mt-5">
        <div class="container">
            <div class="card">
                <div class="card-header mt-0 bg-dark text-white"><b>{{ __('Admins') }}</b></div>
                @foreach ($admins as $admin)
                <div class="card-body border-bottom">
                    <div class="border-bottom">
                        <h5><b>{{ $admin->username }}</b></h5>
                    </div>
                    <div class="row">
                        <div class="mt-3 col-md-6">
                            <p><b>{{ __('Admin Name') }} : </b>{{ $admin->name }}</p>
                            <p><b>{{ __('Admin E-Mail') }} : </b>{{ $admin->email }}</p>
                            <p><b>{{ __('Admin Role') }} : </b>{{ $admin->role }}</p>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <form action="{{ route('manage.edit', $admin->id) }}" method="post">
                                    @csrf
                                    <button type='submit' class="btn btn-dark pull-right my-3">
                                        {{ __('Edit') }}
                                    </button>
                                </form>
                                <form action=" {{ route('manage.destroy', $admin->id) }} " method="post">
                                    @csrf
                                    @method('delete')
                                    <button type='submit' class="btn btn-dark pull-right my-3 @if ($admin->role == 'root') disabled @else '' @endif">
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <a href="{{ route('manage.create' , $admin->id) }} " class = "btn btn-dark m-1">{{ __('Add New Admin') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection