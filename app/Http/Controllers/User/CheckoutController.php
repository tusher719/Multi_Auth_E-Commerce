<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipState;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function DistrictGetAjax($division_id) {
        $district = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($district);
    } // end method

    public function StateGetAjax($district_id){

        $ship = ShipState::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
        return json_encode($ship);

    } // end method
}
