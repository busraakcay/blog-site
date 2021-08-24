@extends('adminLayouts.app')

@section('content')

<div class="container">
    <div class="mt-5">
        <div class="container">
            <div class="card">
                <div class="card-header mt-0 bg-dark text-white"><b>{{ __('Add New Category') }}</b></div>
                <div class="card-body border-bottom">
                    <form action="{{ route('category.store') }}" method="post">
                        @csrf
                        @foreach(config('app.locales') as $locale)
                        <div class="form-group row">
                            <label for="name:{{ $locale }}" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }} ({{strtoupper($locale)}})</label>
                            <div class="col-md-6">
                                <input id="name:{{ $locale }}" type="text" class="form-control" name="name:{{ $locale }}" value="{{ old($locale . 'name') }}" required autocomplete="name:{{ $locale }}" autofocus>
                            </div>
                        </div>
                        @endforeach
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