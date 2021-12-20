<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['deaf_id', 'employee_id', 'status'];

    public function messages()
    {
        return $this->hasMany(Message::class, 'chat_id', 'id');
    }
}
