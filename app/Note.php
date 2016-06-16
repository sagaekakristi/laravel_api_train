<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'note';
    public $timestamps = false; // kalo gak ada created_at, updated_at

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'note_category', 'note_id', 'category_id');
    }
}
