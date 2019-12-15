<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_picture', 'bio'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
