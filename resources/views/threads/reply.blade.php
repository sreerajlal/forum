<div class="card card-default mb-2">
    <div class="card-header">
        <div class="level">
            <div class="flex">
            <a href="{{ route('profile', $reply->owner->name) }}">
                {{ $reply->owner->name }}
            </a> said {{ $reply->created_at->diffForHumans() }}...
            </div>
            <div>
                <form action="/replies/{{ $reply->id }}/favorites" method="post">
                    @csrf
                    <button class="btn btn-primary {{ $reply->isFavorited() ? 'disabled':''  }}" type="submit">
                        {{ $reply->favorites_count}} Like
                    </button>
                </form>
            </div>
        </div>

    </div>

    <div class="card-body">
        {{ $reply->body }}
    </div>
</div>
