<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'slug', 'title', 'content', 'status', 'image'];

    protected $appends = ['description'];

    public function setTitleAttribute($value)
    {
        return $this->attributes['title'] = ucwords($value);
    }
    
    public function getDescriptionAttribute()
    {
        return substr($this->attributes['content'], 0, 140);
    }

    public function getStatusAttribute($value)
    {
        switch ($value) {
            case 'publish':
                $value = 'Publicado';
                break;
            case 'draft':
                $value = 'Rascunho';
                break;
        }

        return $value;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
