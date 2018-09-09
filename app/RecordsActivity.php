<?php
/**
 * Created by PhpStorm.
 * User: Sreeraj.R
 * Date: 10-09-2018
 * Time: 01:50 AM
 */

namespace App;


trait RecordsActivity
{
    protected static function bootRecordsActivity(){
        if (auth()->guest()) return;

        static::created(function ($thread){
            $thread->recordActivity('created');
        });

    }

    public function recordActivity($event)
    {

        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event),
        ]);

    }

    public function activity()
    {
        return $this->morphMany(Activity::class,'subject');
    }

    public function getActivityType($event)
    {
        $type = strtolower((new \ReflectionClass($this))->getShortName());
        return $event . '_' . $type;
    }
}
