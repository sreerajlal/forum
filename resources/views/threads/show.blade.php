
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card card-default mb-3">
                    <div class="card-header">
                        <div class="level">
                            <div class="flex">
                                <a href="{{ route('profile', $thread->creator->name) }}">{{ $thread->creator->name }}</a> posted:
                                {{ $thread->title }}
                            </div>

                            @if (Auth::check())
                                <form action="{{ $thread->path() }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-link" type="submit">Delete</button>
                                </form>
                            @endif

                        </div>

                    </div>

                    <div class="card-body">
                        {{ $thread->body }}
                    </div>
                </div>


                @foreach ($replies as $reply)
                    @include ('threads.reply')
                @endforeach

               {{ $replies->links() }}

                @if (auth()->check())

                    <form method="POST" action="{{ $thread->path() . '/replies' }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Post</button>
                    </form>

                @else
                    <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p>
                @endif
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <p>This thread was published at {{ $thread->created_at->diffForHumans() }} by
                            <a href="/threads?by={{ $thread->creator->name }} ">{{ $thread->creator->name }} </a>
                            and Currently has {{ $thread->replies_count }} {{ str_plural('Comment',$thread->replies_count) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
