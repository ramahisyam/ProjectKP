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

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhere('phoneNumber', 'like', '%' . $search . '%')
                         ->orWhere('created_at', 'like', '%' . $search . '%')
                         ->orWhere('address', 'like', '%' . $search . '%');
        });
        
    }

    public function status() {
        return $this->hasOne(BackroomStatus::class);
    }
    
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
