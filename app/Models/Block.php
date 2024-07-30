<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;
    protected $fillable=[
        'cluster_id',
        'alpha1',
        'alpha2',
        'num1',
        'num2',
    ];

    public function cluster(){
        return $this->belongsTo(Cluster::class);
    }
}
