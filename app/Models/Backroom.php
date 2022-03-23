<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\BackroomStatus;
use Kyslik\ColumnSortable\Sortable;


class Backroom extends Model
{
    use HasFactory;
    use Sortable;


    protected $guarded = [];
    public $sortable = ['name', 'created_at'];

    public function scopeFilter($query, array $filters){

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhere('created_at', 'like', '%' . $search . '%');

        });
        
    }

    public function statuses() {
        return $this->belongsToMany(BackroomStatus::class);
    }
    
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
