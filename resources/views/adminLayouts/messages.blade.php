@extends('adminLayouts.app')

@section('content')

<div class="container">
    <div class="mt-5">
        <div class="container">
            <div class="card">
                <div class="card-header mt-0 bg-dark text-white"><b>{{ __('Messages') }}</b></div>
                @forelse ($messages as $message)
                <div class="card-body border-bottom">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            {{ $message->name }}
                        </div>
                        <div class="card-body">
                            {{ $message->message }}
                        </div>
                    </div>
                    <form action=" {{ route('messages.destroy', $message->id) }} " method="post">
                        @csrf
                        @method('delete')
                        <button type='submit' class="btn btn-dark pull-right my-3 ml-auto mr-3">
                            {{ __('Delete') }}
                        </button>
                    </form>
                </div>
                @empty
                <div class="card">
                    <div class="card-body">
                        {{ __('There is no message') }}
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection