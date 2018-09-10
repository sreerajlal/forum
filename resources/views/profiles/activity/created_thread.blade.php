@component('profiles.activity.activity')
    @slot('header')
        {{ $profileUser->name }} Published a Thread <a href="{{ $activity->subject->path() }}">{{ $activity->subject->title }}</a>
    @endslot

    @slot('body')
        {{ $activity->subject->body }}
    @endslot
@endcomponent

