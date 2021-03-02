<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Category extends Model
{
    use Uuid;
    protected $primaryKey = "id";
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
