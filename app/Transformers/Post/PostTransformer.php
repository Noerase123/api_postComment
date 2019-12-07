<?php
/**
 * @author Jeselle Bacosmo <jeselle@circus.ac>
 */

namespace App\Transformers\Post;

use App\Support\Resource\ResourceItem;
use League\Fractal\TransformerAbstract;
use Illuminate\Support\Facades\Storage;
use App\Models\PostModel;


class PostTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(PostModel $post)
    {
        return [
            'id' => $post->getKey(),
            'post' => $post->post,
            'created_at' => $post->created_at->format(config('app.default_datetime_format')),
        ];
    }

}
