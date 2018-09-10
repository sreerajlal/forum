@component('profiles.activity.activity')
    @slot('header')
        {{ $profileUser->name }} Reply to <a href="{{ $activity->subject->thread->path() }}">{{ $activity->subject->thread->title }}</a>
    @endslot

    @slot('body')
      {{ $activity->subject->body }}
    @endslot
@endcomponent
