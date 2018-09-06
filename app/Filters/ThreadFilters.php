<?php

namespace App\Filters;

use App\Thread;

class ThreadFilters{

    public function apply($builder)
    {
        if ($userName = request('by')) {
            $user = \App\User::where('name', $userName)->firstOrFail();
            $threads = Thread::where('user_id', $user->id);
            return $threads;
        }

    }
}
