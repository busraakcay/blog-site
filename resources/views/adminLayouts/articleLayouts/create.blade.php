@extends('adminLayouts.app')

@section('content')

<div class="container">
    <div class="mt-5">
        <div class="container">
            <div class="card">
                <div class="card-header mt-0 bg-dark text-white"><b>{{ __('Add New Article') }}</b></div>
                <div class="card-body border-bottom">
                    <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Choose Category') }}</label>
                            <div class="col-md-6">
                                <select class="form-select form-control" name="category" required autocomplete="category" autofocus id="category" aria-label="Default select example">
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->{'name_'. app()->getLocale()} }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="littleImage" class="col-md-4 col-form-label text-md-right">{{ __('Little Article Image') }}</label>
                            <div class="col-md-6">
                                <input id="littleImage" type="file" class="form-control" name="littleImage" required autocomplete="littleImage" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bigImage" class="col-md-4 col-form-label text-md-right">{{ __('Big Article Image') }}</label>
                            <div class="col-md-6">
                                <input id="bigImage" type="file" class="form-control" name="bigImage" required autocomplete="bigImage" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title_en" class="col-md-4 col-form-label text-md-right">{{ __('Article Title') }} (EN)</label>
                            <div class="col-md-6">
                                <input id="title_en" type="text" class="form-control" name="title_en" required autocomplete="title_en" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title_tr" class="col-md-4 col-form-label text-md-right">{{ __('Article Title') }} (TR)</label>
                            <div class="col-md-6">
                                <input id="title_tr" type="text" class="form-control" name="title_tr" required autocomplete="title_tr" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body_en" class="col-md-4 col-form-label text-md-right">{{ __('Article Body') }} (EN)</label>
                            <div class="col-md-6">
                                <textarea id="body_en" type="text" class="form-control" name="body_en" rows="10" required autocomplete="body_en" autofocus></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body_tr" class="col-md-4 col-form-label text-md-right">{{ __('Article Body') }} (TR)</label>
                            <div class="col-md-6">
                                <textarea id="body_tr" type="text" class="form-control" name="body_tr" rows="10" required autocomplete="body_tr" autofocus></textarea>
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