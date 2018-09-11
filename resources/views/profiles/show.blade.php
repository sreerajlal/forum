
@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Welcome back {{ $profileUser->name }}</h3>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($activities as $date => $activity)
                    <h3 class="card-header">{{ $date }}</h3>
                    @foreach ($activity as  $record)
                        @include("profiles.activity.{$record->type}", ['activity' => $record ])
                     @endforeach
                @endforeach
            </div>
        </div>
    </div>
@endsection
