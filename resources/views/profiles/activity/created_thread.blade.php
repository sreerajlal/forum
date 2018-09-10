<div class="card card-default mb-3">
    <div class="card-header">
        {{ $profileUser->name }} Published a Thread <a href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}</a>
    </div>
    <div class="card-body">
        <article>
                {{-- <strong> {{ $thread->replies_count }} {{ str_plural('Comment',$thread->replies_count) }}</strong>--}}
            <div class="body">{{ $activity->subject->body }}</div>
        </article>
    </div>
</div>
