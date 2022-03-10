<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\BackroomStatus;

class Backroom extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $sortable = ['business_key', 'name', 'service_id', 'bandwidth', 'created_at', 'updated_at', 'address', 'phoneNumber', 'latlong'];

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhere('phoneNumber', 'like', '%' . $search . '%')
                         ->orWhere('created_at', 'like', '%' . $search . '%')
                         ->orWhere('address', 'like', '%' . $search . '%')
                         ->orWhere('business_key', 'like', '%' . $search . '%')
                         ->orWhere('bandwidth', 'like', '%' . $search . '%')
                         ->orWhere('service_id.name', 'like', '%' . $search . '%');

        });
        
    }

    public function statuses() {
        return $this->belongsToMany(BackroomStatus::class);
    }
    
    // public function customerRequests()
    // {
    //     return $this->belongsToMany(CustomerRequest::class);
    // }
}
