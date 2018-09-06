<?php

namespace App\Filters;

use App\User;


class ThreadFilters extends Filters {

    /**
     * @param $userName
     * @return mixed
     */
    protected function by($userName)
    {
        $user = User::where('name', $userName)->firstOrFail();
        return $this->builder->where('user_id', $user->id);
    }
}
