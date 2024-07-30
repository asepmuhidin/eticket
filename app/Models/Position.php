<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'department_id',
        'description'
    ] ;

    public function department(): BelongsTo{
        return $this->belongsTo(Department::class);
    }
}
