<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cover_image', 'description', 'project_url', 'source_code_url', 'category_id', 'user_id'];

    public function category() : BelongsTo {
        
        return $this->belongsTo(Category::class);

    }

    public function user() : BelongsTo {

        return $this->belongsTo(User::class);

    }

    public function technologies() : BelongsToMany {

        return $this->belongsToMany(Technology::class);

    }

}
