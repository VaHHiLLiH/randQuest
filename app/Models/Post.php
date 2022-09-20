<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mainPhoto',
        'preview',
        'description',
        'slug',
        'author_id',
        'readers',
        ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function getReaders()
    {
        return $this->belongsToMany(User::class, 'post_reader', relatedPivotKey:  'reader_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }


}
