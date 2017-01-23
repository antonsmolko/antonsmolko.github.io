<?php

namespace App\Models;

abstract class BaseModel
{
    public function getSomeRequest($objects, $name = 'name', $models)
    {
        foreach ($objects as $object) {
            $model = $object->$models;

            foreach ($model as $key) {
                $respond[$object['id']][] = $key[$name];
            }
        }

        if (empty($respond)) {
            return false;
        } else {
            return $respond;
        }
    }
}
