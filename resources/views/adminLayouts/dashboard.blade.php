@extends('adminLayouts.app')

@section('content')

<div class="container" style="margin-top:80px">

        <div class="container">
            <div class="card">
            <h3 class="text-center mt-5">{{ __('Dashboard') }}</h3>
                <div class="row align-items-center">
                    <div class="mb-5" style="margin-left: 50px;">
                        <div class="col-md-3 p-lg-5 border m-5 text-center">
                            <a class="text-decoration-none text-dark" href=""><b>{{__('Number of Categories')}}</b></a>
                        </div>
                        <div class="col-md-3 p-lg-5 border m-5 text-center">
                            <a class="text-decoration-none text-dark" href=""><b>{{__('Number of Articles')}}</b></a>
                        </div>
                        <div class="col-md-3 p-lg-5 border m-5 text-center">
                            <a class="text-decoration-none text-dark" href=""><b>{{__('Number of Admins')}}</b></a>
                        </div>
                        <div class="col-md-3 p-lg-5 border m-5 text-center">
                            <a class="text-decoration-none text-dark" href=""><b>{{__('Total Messages')}}</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
</div>

@endsection