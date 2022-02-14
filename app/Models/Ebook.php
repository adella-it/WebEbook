<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;
    protected $table = 'ebook';
    public $timestamps = false;
    protected $primaryKey = 'ebook_id';

    protected $fillable = [
        'title',
        'author',
        'description'
    ];
}
