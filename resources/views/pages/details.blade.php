@extends('layouts.master')

@section('title', 'Page Title')

@section('content')
    {{--include search and create post modal and fab template--}}
    {{--@include('layouts.create')--}}
    <div class="row">
        <div class="col-md-8 col order-md-1 order-2">
            <div class="post-wrapper">
                <div class="post">
                    <div class="row">
                        <div class="col-2 col-md-1">
                            <div class="post-info">
                                <div class="upvotes">
                                    <div class="upvotes-container">
                                        <a href="#!" class="vote vote-up" id="1">
                                            <i class="fa fa-3x fa-angle-up"></i>
                                        </a>
                                        <span id="upvote-count">{{$data['post']->upvotes->where('status', 1)->count() - $data['post']->upvotes->where('status', 2)->count()}}</span>
                                        <a href="#!" class="vote vote-down" id="2">
                                            <i class="fa fa-3x fa-angle-down"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-10 col-md-9">
                            <h4>{{$data['post']->title}}</h4>
                            <p>{{$data['post']->body}}</p>
                            <div class="row">
                                <div class="col col-md-2 username">
                                    <p>by
                                        <span class="brand-color"><strong>{{$data['post']->user->name}}</strong></span>
                                    </p>
                                </div>
                                <div class="col">
                                    <div class="views">
                                        <i class="fa fa-clock-o"></i>
                                        <span>{{ \Carbon\Carbon::parse($data['post']->created_at)->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1 hidden-xs"></div>
                        <div class="col col-md-2 mt-3">
                            <div id="reaction">
                                <div class="box post-feed">
                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                    <div class="toolbox"></div>
                                    <label class="overlay" for="like"></label>
                                    @foreach($data['like'] as $newdata)
                                        <button class="reaction-{{strtolower($newdata->like_type)}}"
                                                id="{{$newdata->id}}"><span
                                                    class="legend-reaction">{{$newdata->like_type}}</span></button>
                                    @endforeach
                                    <span class="ml-2" id="reaction-count">{{$data['post']->like->count()}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col  col-md-7 mt-3">
                            <div class="post-feed">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                &nbsp;&nbsp;<span>{{$data['post']->comments->count()}}</span>
                            </div>
                        </div>
                        <div class="col mt-3">
                            <div class="post-feed">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                &nbsp;<span>{{$data['post']->view_count}}</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comments">
                <div class="row no-gutters">
                    <div class="col-1"></div>
                    <div class="col-11 p-3 pt-4">
                        <div class="">
                            <form class="form-inline custom" method="post" action="{{route('comments.store')}}">
                                <label class="sr-only" for="comment">Comments</label>
                                <div class="input-group mb-2 mr-sm-2 col-md-12">
                                    <input type="text" class="form-control" id="comment" name="comment"
                                           placeholder="Write a comment...">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$data['post']->id}}">
                                    <button class="btn btn-custom" type="submit"><i class="fa fa-paper-plane"
                                                                                    aria-hidden="true"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 order-1 order-md-2">
            @component('components/categories', ['categories' => $data["categories"]])
            @endcomponent
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-8 col">
            <div class="comment-wrapper">
                @foreach($data["post"]->comments as $newdata)
                    <div class="post-comment">
                        <span class="brand-color"><strong>{{$newdata->user->name}}</strong></span>
                        <p>{{$newdata->comment}}</p>
                        <span><small>{{\Carbon\Carbon::parse($newdata->created_at)->diffForHumans()}}</small></span>
                    </div>
                    <div class="divline"></div>
                @endforeach
            </div>
        </div>
    </div>
@section('js')
    <script>
        $("#reaction").find("button").click(function () {
            var data = {
                "like_type_id": (this.id),
                "post_id": {!! $data['post']->id !!},
                "_token": "{{ csrf_token() }}"
            };

            $.ajax({
                type: 'POST',
                url: "{!! route('like.store') !!}",
                data: data,
                dataType: "json",
                success: function (resultData) {
                    $("#reaction-count").text(resultData.count);
                    console.log(resultData);
                },
                error: function (resultData) {

                }
            });
        });

        var ownLike = {!! $data['post']->ownLike or 'undefined'!!};
        if (ownLike !== undefined) {
            $("#reaction").find("button[id=" + ownLike.like_type_id + "]").focus();
        }

        var ownUpvote = {!! $data['post']->ownUpvote or 'undefined' !!};
        if (ownUpvote !== undefined){
            $(".upvotes").find("a[id=" + ownUpvote.status + "]").addClass("up")
        }

        $(".vote").click(function () {
            var self = this;
            var data = {
                "status": this.id,
                "post_id": {!! $data['post']->id !!},
                "_token": "{{ csrf_token() }}"
            }

            $.ajax({
                type: 'POST',
                url: "{!! route('upvote.store') !!}",
                data: data,
                dataType: "json",
                success: function (resultData) {
                    $("#upvote-count").text(resultData.count);
                    if (resultData.class == 0) {
                        $(".upvotes").find(".vote").removeClass('up');
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