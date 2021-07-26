@extends('userLayouts.app')
@section('content')

<div class="container" style="margin-top:80px">
    <div class="mt-5">
        <div class="container">
            <div class="card">
                <h3 class="text-center mt-5">{{ __('Categories') }}</h3>
                <div class="row align-items-center">
                    <div class="mb-5" style="margin-left: 50px;">
                        <div class="col-md-3 p-lg-5 border m-5 text-center">
                            <a class="text-decoration-none text-dark" href=""><b>{{__('Health')}}</b></a>
                        </div>
                        <div class="col-md-3 p-lg-5 border m-5 text-center">
                            <a class="text-decoration-none text-dark" href=""><b>{{__('Education')}}</b></a>
                        </div>
                        <div class="col-md-3 p-lg-5 border m-5 text-center">
                            <a class="text-decoration-none text-dark" href=""><b>{{__('Sport')}}</b></a>
                        </div>
                        <div class="col-md-3 p-lg-5 border m-5 text-center">
                            <a class="text-decoration-none text-dark" href=""><b>{{__('Art')}}</b></a>
                        </div>
                        <div class="col-md-3 p-lg-5 border m-5 text-center">
                            <a class="text-decoration-none text-dark" href=""><b>{{__('Technology')}}</b></a>
                        </div>
                        <div class="col-md-3 p-lg-5 border m-5 text-center">
                            <a class="text-decoration-none text-dark" href=""><b>{{__('Science')}}</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection