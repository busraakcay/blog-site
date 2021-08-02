@extends('adminLayouts.app')

@section('content')

<div class="container">
    <div class="mt-5">
        <div class="container">
            <div class="card mb-5">
                <div class="card-header mt-0 bg-dark text-white"><b>{{ __('Articles') }}</b></div>
                @forelse ($articles as $article)
                <div class="card-body my-2 border-bottom">

                    <div class="row">
                        <div class="media col-md-11">
                            <img style="margin-right: 10px;" src=" {{ asset($article->littleImage) }} " alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-3"><b>{{ $article->{'title_'. app()->getLocale()} }}</b></h5>
                                <p class="mb-5">{{ Str::limit($article->{'body_'. app()->getLocale()}, 200, '...') }}</p>
                            </div>
                        </div>

                        <div class="col-md-1 d-flex justify-content-right">
                            <div class="row">
                                <form action="{{ route('article.edit', $article->id) }}" method="get">
                                    @csrf
                                    <button type='submit' class="btn btn-dark pull-right my-3">
                                        {{ __('Edit') }}
                                    </button>
                                </form>
                                <form action="{{ route('article.destroy', $article->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type='submit' class="btn btn-dark pull-right my-3">
                                        {{ __('Delete') }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="mt-3">
                    <div class="container">
                        <p>{{__('There is no article here.')}}</p>
                    </div>
                </div>
                @endforelse
                <a href="{{ route('article.create') }}" class="btn btn-dark m-1">{{ __('Add New Article') }}</a>
            </div>
        </div>
    </div>
    <div class='container'>
        <span class='d-flex justify-content-center'>{{$articles->links('pagination::bootstrap-4')}}</span>
    </div>
</div>
@endsection