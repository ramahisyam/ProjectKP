<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class CustomerRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function statuses()
    {
        return $this->hasMany(BackroomStatus::class);
    }
}
