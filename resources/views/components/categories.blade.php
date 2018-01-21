<div class="post-wrapper">
    <h4 class="sub-title">Categories</h4>
    <div class="divline"></div>
    <div class="sub-body">
        <ul>
            @foreach($categories as $data)
                <li><a href="{{url('category/'.$data->slug)}}">{{$data->name}}</a><span class="badge badge-pill float-right">{{$data->blog_count->count()}}</span></li>
            @endforeach

        </ul>
    </div>
</div>
