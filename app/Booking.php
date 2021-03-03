<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use Uuid;
    protected $primaryKey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
}
