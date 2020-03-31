<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use dateTimeInterface;

class Product extends Model
{
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
