<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_Progress extends Model
{
    use HasFactory;
    protected $table = 'item_progress';
    protected $fillable=['item_ticket_id','status_id','change_date','note','remarks', 'reason', 'attachment'];


    public function item_ticket()   
    {
        return $this->belongsTo(Item_Ticket::class, 'item_ticket_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
