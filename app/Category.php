<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false; // kalo gak ada created_at, updated_at

    public function notes()
    {
        return $this->belongsToMany('App\Note', 'note_category', 'category_id', 'note_id');
    }
}
