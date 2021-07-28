@extends('adminLayouts.app')

@section('content')

<div class="container">
    <div class="mt-5">
        <div class="container">
            <div class="card">
                <div class="card-header mt-0 bg-dark text-white"><b>{{ __('About Us') }}</b></div>
                <div class="card-body border-bottom">
                    <form action="{{ route('about.update', $site_information->id) }}" method="post">
                        <textarea type="text" class="form-control" name="about" rows="10">{{ $site_information->about }}</textarea>
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