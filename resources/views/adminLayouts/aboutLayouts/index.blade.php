@extends('adminLayouts.app')

@section('content')

<div>
    <p>About Text:</p><br>
    {{$site_information->about}}
</div>

@endsection