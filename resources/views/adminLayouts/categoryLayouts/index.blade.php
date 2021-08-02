@extends('adminLayouts.app')

@section('content')

<div class="container" style="margin-top:60px">

    <div class="card">
        <div class="card-header bg-dark text-white"><b>{{ __('Categories')}}</b></div>
        <div class="card-body">
            <ul class="list-group">
                @forelse ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center border bottom">
                    <span class="d-inline-block w-75">{{ $category->{'name_'. app()->getLocale()} }}</span>
                    <div class="d-inline-block">
                        <span class="badge badge-primary badge-pill bg-dark text-white">{{$category->articles->count()}}</span>
                    </div>

                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type='submit' class="btn btn-dark pull-right my-3">
                            {{ __('Delete') }}
                    </form>
                </li>
                @empty
                <p>There is no category here.</p>
                @endforelse
            </ul>
        </div>
        <a href="{{ route('category.create') }}" class="btn btn-dark m-1">{{ __('Add New Category') }}</a>
    </div>
</div>
@endsection