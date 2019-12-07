<?php

namespace App\Repository;

use App\Models\PostModel;
use App\Support\Repository\EloquentRepository;

class PostRepository extends EloquentRepository
{
    /**
     * Constructor of NewsRepository
     *
     * @param \App\Models\News $news
     *
     * @return 
     */
    public function __construct(PostModel $post)
    {
        parent::__construct($post);
    }

    /**
     * Store data from model
     *
     * @param array $attributes
     *
     * @return $model
     */
    public function store(array $attributes)
    {
        $model = $this->newModel();

        // place attribute values to the model
        foreach ($attributes as $attribute => $value) {
            $model->setAttribute($attribute, $value);
        }

        return ($model->save()) ? $model : null;
    }

    public function showAll() {

        $model = $this->newModel();

        return $model->orderBy('created_at','desc')->get();
    }

    public function checkId($id)
    {
        $model = $this->newModel();

        $result = $model->where('id',$id)->first();

        //check if the  $model is null
        if (is_null($result)) {
            return;
        }

        return $result;
    }

}