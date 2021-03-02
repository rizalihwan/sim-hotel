<?php
    namespace App\Traits;
    use Illuminate\Support\Str;

    /**
     * UUID Trait
     */
    trait Uuid
    {
        protected static function boot() {
        parent::boot();
        static::creating(function ($model) {
            if ( ! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}