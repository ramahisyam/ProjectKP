<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackroomStatus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function customerRequests() {
        return $this->belongsTo(CustomerRequest::class, 'customer_request_id');
    }

    public function backroom() {
        return $this->belongsTo(Backroom::class, 'backroom_id');
    }
}
