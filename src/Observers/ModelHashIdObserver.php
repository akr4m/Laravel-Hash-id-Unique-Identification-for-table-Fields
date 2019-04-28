<?php

namespace akr4m\hashid\Observers;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;

class ModelHashIdObserver
{
    /**
     * Hash id will be created after creating a field.
     *
     * Hash id will be added first 4 letters of your table
     *
     * Hash id is encoded by id field
     */
    public function created(Model $model)
    {
        $model->update([
            'hash_id' => $model->getHashShortName() . '_' . Hashids::encode($model->id) . '_' . uniqid(true),
        ]);
    }
}
