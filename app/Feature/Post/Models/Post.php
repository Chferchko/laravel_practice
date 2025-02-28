<?php

declare(strict_types=1);

namespace App\Feature\Post\Models;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $image
 * @property int $likes
 */

class Post extends Model
{
    use SoftDeletes;

    public const LIKES_INITIAL_VALUE = 0;

    protected $dates = ['deleted_at'];

    protected $fillable = ['title', 'description', 'content', 'image', 'likes'];
}
