<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    protected $table = 'queries';
    protected $fillable = [
        'name',
        'description',
        'sql_statement',
        'keyword',
        'query_category_id',
        'parameters1',
        'parameters_type1',
        'parameters2',
        'parameters_type2',
        'parameters3',
        'parameters_type3',
        'parameters4',
        'parameters_type4',
        'is_active',
        'created_by',
        'updated_by',
        'last_executed_at',
        'execution_count',
        'has_external_query_dependences',
        'graph_type',
    ];

    public function category()
    {
        return $this->belongsTo(QueryCategory::class, 'query_category_id');
    }
}
