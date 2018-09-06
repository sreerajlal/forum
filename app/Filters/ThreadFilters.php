<?php

namespace App\Filters;

use App\User;
use Illuminate\Http\Request;


class ThreadFilters{

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        if (!$userName = $this->request->by) return $builder;

            $user = User::where('name', $userName)->firstOrFail();
            return  $builder->where('user_id', $user->id);
            
    }
}
