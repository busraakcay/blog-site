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

                        <div class="form-group row">
                            <label for="name_en" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }} (EN)</label>
                            <div class="col-md-6">
                                <input id="name_en" type="text" class="form-control" name="name_en" value="{{ old('name_en') }}" required autocomplete="name_en" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_tr" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }} (TR)</label>
                            <div class="col-md-6">
                                <input id="name_tr" type="text" class="form-control" name="name_tr" value="{{ old('name_tr') }}" required autocomplete="name_tr" autofocus>
                            </div>
                        </div>

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