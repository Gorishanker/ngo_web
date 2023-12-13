@extends('front.base')
@section('title')
    <title>Privacy and Policy</title>
    <title>{{ webSiteTitleName() }}</title>
@endsection
@section('content')
    <section class="pri-content-men" style="padding-top:100px; padding-bottom: 50px ">
        <div class="container">
            <div class="pri-men d-flex align-items-center justify-content-center">
                <h1 class="text-center">{{ $privacy_policy->title }}</h1>
            </div>
            <div class="col-md-12">
                {!! $privacy_policy->content !!}
            </div>
        </div>
    </section>
@endsection
