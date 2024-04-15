<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "user_id",
        "title",
        "body",
        "note_category_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function note_category()
    {
        return $this->belongsTo(NoteCategory::class);
    }
}
