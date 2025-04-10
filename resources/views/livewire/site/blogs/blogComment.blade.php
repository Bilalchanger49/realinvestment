<div class="mt-5">
    <h4>Comments ({{ $comments->count() }})</h4>

    @auth
        <form wire:submit.prevent="addComment" class="mb-4">
            <textarea wire:model.defer="newComment" class="form-control mb-2" rows="3"
                      placeholder="Write a comment..."></textarea>
            @error('newComment') <span class="text-danger">{{ $message }}</span> @enderror
            <button class="btn btn-primary" type="submit">Post Comment</button>
        </form>
    @else
        <p>Please <a href="{{ route('login') }}">login</a> to post a comment.</p>
    @endauth

    <div class="blog-comment">
        <div class="section-title style-small">
            <h3>Comments</h3>
        </div>

        @foreach ($comments as $comment)
            <div class="media mb-4">
                <a href="#"><img src="{{ asset('assets/img/blog/comment3.png') }}" alt="comment"></a>
                <div class="media-body">
                    <h5><a href="#">{{ $comment->user->name }}</a></h5>
                    <div class="date">{{ $comment->created_at->diffForHumans() }}</div>
                    <p>{{ $comment->body }}</p>

                    @auth
                        <textarea wire:model.defer="replyText.{{ $comment->id }}" class="form-control mb-1" rows="2" placeholder="Write a reply..."></textarea>
                        <button class="btn btn-sm btn-outline-secondary mb-3" wire:click="replyTo({{ $comment->id }})">Reply</button>
                        @error('replyText.'.$comment->id) <span class="text-danger">{{ $message }}</span> @enderror
                    @endauth

                    @if($comment->replies)
                        <div class="ms-4">
                            @foreach ($comment->replies as $reply)
                                <div class="media mt-3">
                                    <a href="#"><img src="{{ asset('assets/img/blog/comment3.png') }}" alt="reply"></a>
                                    <div class="media-body">
                                        <h6><a href="#">{{ $reply->user->name }}</a></h6>
                                        <div class="date">{{ $reply->created_at->diffForHumans() }}</div>
                                        <p>{{ $reply->body }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
