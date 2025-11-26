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


    //get region by distinct snu_region
    public static function getRegions()
    {
        return self::select('snu_region')
            ->distinct()
            ->orderBy('snu_region')
            ->get();
    }

    //get councils by distinct psnu_council filtered by region
    public static function getCouncils($region){
        return self::select('psnu_council')
            ->distinct()
            ->where('snu_region', $region)
            ->orderBy('psnu_council')
            ->get();
    }

    //get facility by hfr_code filtered 
    public static function getFacilityByHfrCode($hfr_code){
        return self::where('hfr_code', $hfr_code)->first();
    }
    
}
