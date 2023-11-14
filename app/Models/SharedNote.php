<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedNote extends Model
{
    protected $table = 'shared_notes';
    protected $fillable = ['note_id', 'url'];
    use HasFactory;
}
