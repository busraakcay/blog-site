@extends('adminLayouts.app')

@section('content')

<div class="container">
    <div class="mt-5">
        <div class="container">
            <div class="card">
                <div class="card-header mt-0 bg-dark text-white"><b>{{ __('Site Information') }}</b></div>
                <div class="card-body border-bottom">
                    <form action="{{ route('siteInfo.update', $site_information->id) }}" method="post">
                        <div class="form-group">
                            <label for="name">{{ __('Site Name') }}</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $site_information->name }}"></input>
                        </div>
                        <div class="form-group">
                            <label for="footer mt-5">{{ __('Footer') }}</label>
                            <textarea type="text" class="form-control" name="footer" id="footer" rows="3">{{ $site_information->footer }}</textarea>
                        </div>
                        @csrf
                        @method('put')
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