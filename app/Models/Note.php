<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'content']; // Указываем, какие поля можно массово заполнять



    public function user()
    {
        return $this->belongsTo(User::class);
    }


    use HasFactory;
}
