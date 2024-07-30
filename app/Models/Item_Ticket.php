<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Ticket extends Model
{
    use HasFactory;
    protected $table = 'item_ticket';
    protected $fillable=['item_id','ticket_id', 'status_id'];


    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
    public function item_progress()
    {
        return $this->hasMany(Item_Progress::class, 'item_ticket_id', 'id');
    }

}
