@extends('userLayouts.app')
@section('content')

<div class="container">
    @forelse ($articles as $article)
    <a href="{{ route('article.show', $article->id) }}" class="text-decoration-none text-dark">
        <div class="mt-5 border-bottom">
            <div class="container">
                <div class="media mb-5">
                    <img style="margin-right: 10px;" src=" {{ asset($article->littleImage) }} " alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-3"><b>{{ $article->{'title_'. app()->getLocale()} }}</b></h5>
                        <p class="mb-5">{{ Str::limit($article->{'body_'. app()->getLocale()}, 200, '...') }}</p>
                    </div>
                    <p><i>{{ __('Category : ') }}</i><strong>{{ $article->category->{'name_'. app()->getLocale()} }}</strong></p>
                </div>
            </div>
        </div>
        @empty
        <div class="mt-3">
            <div class="container">
                <p class="text-center">{{__('There is no article here.')}}</p>
            </div>
        </div>
        @endforelse
    </a>
</div>
<div class='container'>
    <span class='d-flex justify-content-center'>{{$articles->links('pagination::bootstrap-4')}}</span>
</div>
@endsection