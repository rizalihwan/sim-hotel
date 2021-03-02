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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
