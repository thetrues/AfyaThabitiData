<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QueryCategory extends Model
{
    
    protected $table = 'query_categories';
    protected $fillable = [
        'name',
        'description',
    ];

    public function queries()
    {
        return $this->hasMany(Query::class, 'query_category_id');
    }
}
