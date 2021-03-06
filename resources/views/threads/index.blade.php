@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-default">
                    <div class="card-header">Forum Threads</div>

                    <div class="card-body">
                        @forelse ($threads as $thread)
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
                            @empty
                            <p>No Threads available </p>
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        ss
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
