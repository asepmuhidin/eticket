<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Kyslik\ColumnSortable\Sortable;
use DB;

class Ticket extends Model
{
    use HasFactory;
    use Sortable;
    protected $fillable = [
        'user_id',
        'type_id',
        'status_id',
        'subject',
        'message',
        'attachment',
        'delegateTo',
        
        'level_confirm',
        'level_confirm_date',
        'leve2_confirm',
        'leve2_confirm_date',
        'custname',
        'complain_date',
        'complain_id',
        'cluster_id',
        'house_id',
        'block',
        'block_no',
        'block_sub',
        'bast_date',
        'renov_date',
        'complain_count',
        'war_date'
    ];

    public $sortable=[
        'created_at','subject','user.name','status.name','type.type'
    ];
    /**
     * Get the status that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    public function complain(): BelongsTo
    {
        return $this->belongsTo(Complain::class);
    }

    public function cluster(): BelongsTo        
    {
        return $this->belongsTo(Cluster::class);
    }

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }

 
    /**
     * Get the user that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the type that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Tictype::class, 'type_id');
    }

    /**
     * Get the delegate that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function delegate(): BelongsTo
    {
        return $this->belongsTo(User::class, 'delegateTo');
    }

    public function items()
    {
        return $this->hasMany(Item_Ticket::class);
    }
    /**
     * Dapatkan daftar tiket berdasarkan role user
     * jika role='Customer Service', ambil tiket hanya tiket user / punya dia sendiri
     * jika bukan ambil semua daftar tiket 
     public function scopeTicketByRole($query,$role,$user_id)
     {
        if($role=='Customer Service'){
            return $query->where('user_id',$user_id);
        }else{
            return ;
        }
     }
    **/
     public function scopeTicketByRole($query,$position,$user_id)
     {
        $idUserCompalin=Complain::all()->pluck('user_id');
        $isPICcomplain=in_array($user_id,$idUserCompalin->toArray())?true:false;
    /*     dd('USER ID :'.$user_id, 
          ' position :'.$position, 
          'CS :'. Setting::get()->first()->cs,
          'PL:'.Setting::get()->first()->pl,
          'isuser complain :'.$isPICcomplain  
        ); */
         
        if($position==Setting::get()->first()->cs){
            return $query->where('user_id',$user_id);
        }elseif($isPICcomplain){
            $complain_id=Complain::where('user_id',$user_id)->pluck('id');
            //dd($complain_id[0]);
            return $query->where('complain_id',$complain_id[0]);
        }
        else{
            return ;
        }
     }

     public function TicketProgress($ticket_id)
     {
       $sql_item_ticket="SELECT ticket_id ,count(item_id)as y FROM `item_ticket` WHERE ticket_id=$ticket_id group by ticket_id;";
       
       //close jika status close atau cancel
       $sql_item_close="SELECT t.id as id_ticket,count(ip.item_ticket_id)as x  
        FROM `tickets` t left join item_ticket it on t.id=it.ticket_id 
        left join item_progress ip on it.id=ip.item_ticket_id
        WHERE t.id=$ticket_id  and (ip.status_id=3 or ip.status_id=4)
        group by t.id;";
      //  dd($sql_item_ticket,$sql_item_close);
        $res_item=DB::select($sql_item_ticket);
        $res_item_close=DB::select($sql_item_close);
        
        //dd($res_item,$res_item_close);
        
        $x=$res_item?$res_item[0]->y:1;
        $y=$res_item_close?$res_item_close[0]->x:0;
        
        $progress=$y/$x * 100;
        
        return $progress;

     }

     public function getTicket_n($block,$block_no, $block_sub)
     {
      //  dd('block :'.$block.', block_no :'.$block_no.', block_sub :'.$block_sub);
        $n=Ticket::select(DB::raw('count(id) as n'))
           ->where('block',$block)
           ->where('block_no',$block_no)
           ->where('block_sub',$block_sub)
           ->groupBy('block','block_no','block_sub')
           ->get()->first();
        //dd($n); 
        
            return $n->n;
        
     }
}
