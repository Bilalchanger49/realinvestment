<div class="widget widget-news">
    <h5 class="widget-title">Latest Feeds</h5>
    @foreach($latestBlogs as $blog)
        <div class="single-news-wrap media">
            <div class="thumb">
                <img src="{{ asset('storage/' . $blog->thumbnail) }}" alt="img">
            </div>
            <div class="media-body align-self-center">
                <h6><a href="{{ route('site.blogs.details', $blog->id) }}">{{$blog->title}}</a></h6>
                <p class="date"><i class="far fa-calendar-alt"></i>{{ $blog->created_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach
</div>
