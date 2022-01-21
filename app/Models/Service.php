<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerRequest;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customerRequests() {
        return $this->hasMany(CustomerRequest::class);
    }
}