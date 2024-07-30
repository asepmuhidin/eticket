<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;
class Complain extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'user_id',
        'initial',
        'description',
    ];
    protected $table='complains';
    /**
     * Get the user that owns the complain
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo{
        return $this->belongsTo(User::class,'user_id','id');
    }
}