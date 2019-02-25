<?php

namespace akr4m\hashid\Traits;

use ReflectionClass;
use akr4m\hashid\Observers\ModelHashIdObserver;

trait UsesHashIds
{
    public static function bootUsesHashIds()
    {
        static::observe(new ModelHashIdObserver());

        /**
         * No avoid adding extra fillable for 'hash_id'
         * Merged to existing fillable data
         */

        static::creating(function ($model) {
            $model->fillable(array_merge($model->fillable, ['hash_id']));
        });
    }

    /**
     * Route key is changed from 'id' to 'hash_id'
     *
     * You can override this
     */
    public function getRouteKeyName()
    {
        return 'hash_id';
    }

    /**
     * To get hash_id
     */
    public function getId()
    {
        return $this->hash_id;
    }

    /**
     * This is a 4 characters shortname of the table's model.
     * You can customize it.
     * If model name is: Invoice.php
     * Outpute will be: invo
     */
    public function getHashShortName()
    {
        return strtolower(str_limit((new ReflectionClass($this))->getShortName(), 4, ''));
    }
}
