@extends('userLayouts.app')
@section('content')

<div class="container" style="margin-top:80px">
    <div class="mt-5">
        <div class="container">
            <div class="card">
                <h3 class="text-center mt-5">{{ __('Categories') }}</h3>
                <div class="row align-items-center">
                    <div class="mb-5" style="margin-left: 50px;">
                     
                        @forelse ($categories as $category)
                        <div class="col-md-3 p-lg-5 border m-5 text-center">
                            <a class="text-decoration-none text-dark" href=""><b>{{ $category->name }}</b></a>
                            <span class="badge badge-primary badge-pill bg-dark text-white">{{$category->articles->count()}}</span>
                        </div>
                        @empty
                        <p>There is no category here.</p>
                        @endforelse
               
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection