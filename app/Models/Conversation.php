<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $guarded = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function secondUser()
    {
        if(auth()->user()->id == $this->user_1_id) {
            return $this->belongsTo(User::class, 'user_2_id');
        } else {
            return $this->belongsTo(User::class, 'user_1_id');
        }
    }
}
