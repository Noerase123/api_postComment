<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = 'comment_models';

    protected $fillable = ['comment'];
    
    public function comments()
    {
        return $this->hasMany(\App\Models\PostCommentModel::class);
    }
}
