@extends('userLayouts.app')
@section('content')

<div class="container">
    <div style="margin-top: 100px;">
        <div class="container card">
            <div class=" text-wrap">
                <h3 class="text-center mt-5">{{__('Contact Us')}}</h3>
                <form action="#" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">{{ __('Name Surname') }}</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>

                    <div class="form-group">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    
                    <div class="form-group">
                        <label for="message">{{ __('Message') }}</label>
                        <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                    </div>

                    <button class='btn btn-dark my-3 pull-right'>{{ __('Send') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection