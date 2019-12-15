<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected $fillable = [
        'text', 'title', 'user_id', 'image'
    ];

     /** 
     * Get image uri
     * @return String
     */
     public function getAvatarUriAttribute() {
        return Storage::url($this->image);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
