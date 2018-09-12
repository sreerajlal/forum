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

        foreach (static::eventsForActivity() as $event){
            static::$event(function ($modelName) use ($event){
                $modelName->recordActivity($event);
            });
        }

        static::deleting(function ($modelName){
            $modelName->activity()->delete();
        });
    }

    public static function eventsForActivity()
    {
        return ['created'];
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
