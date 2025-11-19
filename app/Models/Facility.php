<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facilities';
    protected $fillable = [
        'dhis2_code',
        'hfr_code',
        'datim_id',
        'snu_region',
        'psnu_council',
        'facility_name',
        'council_monthly_portal',
        'facility_name_monthly_portal',
        'dhis2_m6_tx_curr',
        'cop25_fy26',
    ];
}
