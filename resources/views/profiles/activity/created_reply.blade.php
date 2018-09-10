
<div class="card card-default mb-3">
    <div class="card-header">
        {{ $profileUser->name }} Reply to <a href="{{ $activity->subject->thread->path() }}">{{ $activity->subject->thread->title }}</a>
    </div>
    <div class="card-body">
        <article>
            <div class="body">{{ $activity->subject->body }}</div>
        </article>
    </div>
</div>
