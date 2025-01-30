<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportMessage extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message', 'reply', 'is_replied'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
