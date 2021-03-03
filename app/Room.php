<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use Uuid;
    protected $primaryKey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $with = ['category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    public function getRoomThumbnailAttribute()
    {
        return "/storage/".$this->thumbnail;
    }
    
    public function getRoomStatusAttribute()
    {
        return $this->status === 1 ? '<span class="badge badge-success">KOSONG<span>' : '<span class="badge badge-danger">TERISI<span>';
    }
    
    public function getRatingCountAttribute()
    {
        $rating = $this->rating;
        if($rating == 1)
        {
            return '<i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star-o font-primary"></i>
                    <i class="fa fa-star-o font-primary"></i>
                    <i class="fa fa-star-o font-primary"></i>
                    <i class="fa fa-star-o font-primary"></i>';
        } else if($rating == 2) {
            return '<i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star-o font-primary"></i>
                    <i class="fa fa-star-o font-primary"></i>
                    <i class="fa fa-star-o font-primary"></i>';
        } else if($rating == 3) {
            return '<i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star-o font-primary"></i>
                    <i class="fa fa-star-o font-primary"></i>';
        } else if($rating == 4) {
            return '<i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star-o font-primary"></i>';
        } else if($rating == 5) {
            return '<i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star font-primary"></i>
                    <i class="fa fa-star font-primary"></i>';
        } else {
            return '<span class="badge badge-light">-<span>';
        }
    }

}
