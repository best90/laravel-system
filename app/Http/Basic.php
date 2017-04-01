<?php

namespace App\Http;

use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{
    public $timestamps = false;
    
    public function __construct(array $attributes = [])
    {
        $this->table = Tables::TABLES[class_basename($this)] ?? null;
        parent::__construct($attributes);
    }
}
