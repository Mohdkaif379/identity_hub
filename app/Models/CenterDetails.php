<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CenterDetails extends Model
{
    use HasFactory;

    protected $table = 'center_details';

    protected $fillable = [
        'alias',
        'ecn',
        'doj',
        'centername',
        'name',
        'role',
        'projectscode',
        'crmid',
        'password',
        'email',
        'gender',
        'kyc_status',
        'created_by_my_side',
        'created_by',
        'approved_by',
        'generate_link_id',
        'ip_address'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'doj' => 'date',
    ];
}
