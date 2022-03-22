<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Service;

class CustomerRequest extends Model
{
    use HasFactory;

    use Sortable;

    protected $guarded = [];
    public $sortable = ['business_key', 'name', 'service_id', 'capacity', 'created_at', 'updated_at', 'address', 'phoneNumber', 'latlong'];

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhere('phoneNumber', 'like', '%' . $search . '%')
                         ->orWhere('created_at', 'like', '%' . $search . '%')
                         ->orWhere('address', 'like', '%' . $search . '%')
                         ->orWhere('business_key', 'like', '%' . $search . '%')
                         ->orWhere('capacity', 'like', '%' . $search . '%');

        });
        
    }

    public function service() {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function statuses()
    {
        return $this->hasMany(BackroomStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
