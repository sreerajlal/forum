<?php

namespace App\Filters;

use App\User;

class ThreadFilters extends Filters {

    protected $filters = ['by','popular'];

    /**
     * @param $userName
     * @return mixed
     */
    protected function by($userName)
    {
        $user = User::where('name', $userName)->firstOrFail();
        return $this->builder->where('user_id', $user->id);
    }
    
    public function popular()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->orderBy('replies_count','desc');
    }
}
