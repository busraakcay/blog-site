@extends('userLayouts.app')
@section('content')

<div class="container">
    <div style="margin-top: 100px;">
        <div class="container card">
            <div class=" text-wrap">
                <h3 class="text-center mt-5">{{__('About Us')}}</h3>
                <p class="mt-5 mb-5 text-justify">{{ $site_information->about }}</p>
            </div>
        </div>
    </div>
</div>

@endsection