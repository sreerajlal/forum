
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-default mb-3">
                    <div class="card-header">
                         {{ $profileUser->name }}
                    </div>
                    <div class="card-body">
                        @foreach ($profileThreads as $thread)
                            <article>
                                <div class="level">
                                    <h4 class="flex">
                                        <a href="{{ $thread->path() }}">
                                            {{ $thread->title }}
                                        </a>
                                    </h4>
                                    <strong> {{ $thread->replies_count }} {{ str_plural('Comment',$thread->replies_count) }}</strong>
                                </div>
                                <div class="body">{{ $thread->body }}</div>
                            </article>
                            <hr>
                        @endforeach

                            {{ $profileThreads->links() }}
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
