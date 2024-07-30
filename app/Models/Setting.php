<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_approve',
        'person_delegate',
        'pm_approve',
        'cs',
        'pl',
        'title',
        'description',
        'auto_email_ss',
        'auto_email_pm'        
    ]; 
}
