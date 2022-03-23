<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CustomerRequest;
use App\Models\Backroom;
use Kyslik\ColumnSortable\Sortable;


class Service extends Model
{
    use HasFactory;
    use Sortable;
    public $sortable = ['name', 'created_at'];

    protected $guarded = [];

    public function customerRequests() {
        return $this->hasMany(CustomerRequest::class);
    }

    public function backrooms()
    {
        return $this->belongsToMany(Backroom::class);
    }

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        });
        
    }
}
