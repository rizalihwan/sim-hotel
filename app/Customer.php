<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use Uuid;
    protected $primaryKey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

}
