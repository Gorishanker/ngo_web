@extends('front.base')
@section('title')
    <title>Terms and Conditions</title>
@endsection
@section('content')


<section class="pri-content-men" style="padding-top:100px; padding-bottom: 50px ">
        <div class="pri-men d-flex align-items-center justify-content-center">
            <h1 class="text-center">{{ $term_and_condition->title }}</h1>
        </div>
        <div class="container">
            <div class="col-md-12">
                {!! $term_and_condition->content !!}
            </div>
        </div>
    </section>
