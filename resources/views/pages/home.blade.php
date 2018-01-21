@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    {{--include search and create post modal and fab template--}}
    @include('layouts.create' , ['categories' => $data["categories"]])
    <div class="row">
        <div class="col-md-8 col order-md-1 order-2">
            <div class="post-wrapper">
                @if(count($data['posts']) <= 0)
                    <h1 class="text-center p-5">No Data</h1>
                @endif
                @foreach($data["posts"] as $newdata)
                    <div class="post" id="{{$newdata->id}}">
                        <div class="row">
                            <div class="col-2 col-md-1">
                                <div class="post-info">
                                    <div class="upvotes">
                                        <div class="upvotes-container">
                                            @if($newdata->ownUpvote)
                                                @if($newdata->ownUpvote->status == 1)
                                                    <a href="#!" class="vote vote-up up" id="1">
                                                        <i class="fa fa-3x fa-angle-up"></i>
                                                    </a>
                                                @else
                                                    <a href="#!" class="vote vote-up" id="1">
                                                        <i class="fa fa-3x fa-angle-up"></i>
                                                    </a>
                                                @endif
                                                <span id="upvote-count">{{$newdata->upvotes->where('status', 1)->count() - $newdata->upvotes->where('status', 2)->count()}}</span>
                                                @if($newdata->ownUpvote->status == 2)
                                                    <a href="#!" class="vote vote-down up" id="2">
                                                        <i class="fa fa-3x fa-angle-down"></i>
                                                    </a>
                                                @else
                                                    <a href="#!" class="vote vote-down" id="2">
                                                        <i class="fa fa-3x fa-angle-down"></i>
                                                    </a>
                                                @endif
                                            @else
                                                <a href="#!" class="vote vote-up" id="1">
                                                    <i class="fa fa-3x fa-angle-up"></i>
                                                </a>
                                                <span id="upvote-count">{{$newdata->upvotes->where('status', 1)->count() - $newdata->upvotes->where('status', 2)->count()}}</span>
                                                <a href="#!" class="vote vote-down" id="2">
                                                    <i class="fa fa-3x fa-angle-down"></i>
                                                </a>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-10 col-md-9">
                                <h4><a href="{{ url('posts/'.$newdata->id) }}"> {{mb_substr($newdata->title, 0, 100)}}
                                        ...</a></h4>
                                <p>{{mb_substr($newdata->body, 0, 150)}}...</p>
                                <div class="views">
                                    <i class="fa fa-clock-o"></i>
                                    <span>{{\Carbon\Carbon::parse($newdata->created_at)->diffForHumans()}}</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-2">
                                <div class="post-info float-right">
                                    <div>
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        &nbsp;<span>{{$newdata->view_count}}</span>
                                    </div>
                                    <div>
                                        <i class="fa fa-comment-o" aria-hidden="true"></i>
                                        &nbsp;&nbsp;<span>{{$newdata->comments->count()}}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="divline"></div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4 order-1 order-md-2">
            @component('components/categories', ['categories' => $data["categories"]])
            @endcomponent
        </div>
        <div class="col-6 offset-2 col-md-6 offset-md-0 order-3">
            <ul class="pagination">
                {{ $data["posts"]->links('vendor.pagination.bootstrap-4') }}
            </ul>
        </div>
    </div>
@section('js')
    <script>
        $(".vote").click(function () {
            var self = this;
            console.log($(self).parent().find(".vote"))
            var data = {
                "status": this.id,
                "post_id": $(self).closest(".post").attr('id'),
                "_token": "{{ csrf_token() }}"
            }

            $.ajax({
                type: 'POST',
                url: "{!! route('upvote.store') !!}",
                data: data,
                dataType: "json",
                success: function (resultData) {
                    $(self).parent().find("#upvote-count").text(resultData.count);
                    if (resultData.class == 0) {
                        $(self).parent().find(".vote").removeClass('up');
                    } else {
                        $(self).addClass('up')
                    }
                },
                error: function (resultData) {

                }
            });
        });
    </script>
@endsection
@endsection