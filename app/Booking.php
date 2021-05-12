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
    protected $dates = ['check_in', 'check_out'];

    protected $with = ['room', 'customer'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
    public function getPaymentStatusAttribute()
    {
        return $this->status === 0 ? '<span class="badge badge-danger">NOT YET PAID<span>' : '<span class="badge badge-success">ALREADY PAID<span>';
    }

    public function getProofThumbnailAttribute()
    {
        return "/storage/".$this->thumbnail;
    }

}
