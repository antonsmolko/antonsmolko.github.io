<?php

namespace App\Models;

abstract class BaseModel
{
    public function getSomeRequest($object, $name = 'name', $model)
    {
        foreach ($object as $array) {
            $model = $array->$model;

            foreach ($model as $key) {
                $respond[$array['id']] = $key['display_name'];
            }
        }

        return $respond;
    }
}
