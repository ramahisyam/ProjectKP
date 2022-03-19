<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerRequest;
use App\Models\Backroom;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customerRequests() {
        return $this->hasMany(CustomerRequest::class);
    }

    public function backrooms()
    {
        return $this->belongsToMany(Backroom::class);
    }
}
