<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteCategory extends Model
{
    //
    protected $table = 'note_category';
    public $timestamps = false; // kalo gak ada created_at, updated_at
}
