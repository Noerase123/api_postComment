<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    protected $table = 'post_models';

    public $primaryKey = 'id';

    protected $fillable = ['title', 'description'];
}
