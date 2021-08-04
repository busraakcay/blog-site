@extends('adminLayouts.app')

@section('content')

<div class="container" style="margin-top:60px">
    <div class="card">
        <div class="card-header bg-dark text-white"><b>{{ __('Categories')}}</b></div>
        <div class="card-body">
            <ul class="list-group">
                
                @forelse ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center border bottom">
                    <span class="d-inline-block w-75">{{ $category->name }}</span>
                    <div class="d-inline-block">
                        <span class="badge badge-primary badge-pill bg-dark text-white">{{$category->articles->count()}}</span>
                    </div>

                    <form action="{{ route('category.destroy', $category->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type='submit' class="btn btn-dark pull-right mt-5">
                            {{ __('Delete') }}
                        </button>
                    </form>

                    <form action="{{ route('category.update' , $category->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="status" name="status" @if ($category->status == 1) checked
                            @else unchecked
                            @endif>
                            <label class="form-check-label" for="status">{{__('Active')}}</label>
                        </div>
                        <div class='d-flex d-inline-block'>
                            <button type='submit' class="btn btn-dark">
                                {{ __('Confirm') }}
                            </button>
                        </div>
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