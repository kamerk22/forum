@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    {{--include search and create post modal and fab template--}}
    @include('layouts.create')
    <div class="row">
        <div class="col-md-8 col order-md-1 order-2">
            <div class="post-wrapper">

            </div>
        </div>

        <div class="col-md-4 order-1 order-md-2">
            @component('components/categories')
            @endcomponent
        </div>
    </div>

@endsection