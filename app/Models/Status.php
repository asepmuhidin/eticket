<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table='status';
    
    protected $fillable=[
        'name',
        'description',
        'color'
    ];
    
    /**
     * Get all of the tickets for the Status
     *
     * @return \Illuminate\Database\Ticket\Relations\HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

}
