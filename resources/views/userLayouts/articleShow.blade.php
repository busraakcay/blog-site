@extends('userLayouts.app')

@section('content')

<div class="container">
    <div class="container">
        <div class="card border-0 mb-5">
            <div class="card-header bg-transparent">
                <h3 class="mt-3 text-center"><b>{{ $article->{'title_'. app()->getLocale()} }}</b></h3>
            </div>
            <div class="card-body d-flex">
                <img class="img-fluid" style="margin-right: 30px" src="{{ asset($article->bigImage) }}" alt="Generic placeholder image">
            </div>
            <div class="text-justify text-body">
                <p>{{ $article->{'body_'. app()->getLocale()} }}</p>
            </div>
        </div>
    </div>
</div>
@endsection