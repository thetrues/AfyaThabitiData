<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class LocalSession extends Model
{
    
        
    public function getFromSession()
    {
        return Session::get('filter_parameters', []);
    }

    
}
