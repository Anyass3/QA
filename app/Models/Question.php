<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'anonymous', 'tags', 'user_id', 'created_at', 'updated_at', 'attachments'];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['tag']))
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        elseif (isset($filters['search']))
            $query->where('question', 'like', '%' . $filters['search'] . '%')
                ->orWhere('tags', 'like', '%' . $filters['search'] . '%');
    }
}
