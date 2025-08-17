<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatResponse extends Model
{
    protected $fillable = ['keyword', 'response','is_quick'];
}
