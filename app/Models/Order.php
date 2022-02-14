<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    public $timestamps = false;
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'id_account',
        'id_ebook',
        'order_date'
    ];
}
