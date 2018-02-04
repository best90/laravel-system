<?php

namespace App\Http\Model;

use App\Http\Common\Database;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public $timestamps = false;
    
    public function __construct(array $attributes = [])
    {
        $this->table = Database::TABLES[class_basename($this)] ?? null;
        parent::__construct($attributes);
    }
}
