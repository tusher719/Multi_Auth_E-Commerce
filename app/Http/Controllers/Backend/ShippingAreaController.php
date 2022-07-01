<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use Carbon\Carbon;
use PHPUnit\Framework\Constraint\Count;

class ShippingAreaController extends Controller
{

    // Division Page View
    public function DivisionView(){
        $total_division = ShipDivision::count();
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('backend.ship.division.view_division',compact('total_division','divisions'));

    }


    // Division Store
    public function DivisionStore(Request $request){
        $request->validate([
            'division_name' => 'required',
        ]);

        ShipDivision::insert([
            'division_name' => ucfirst($request->division_name),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method

    // Division Edit
    public function DivisionEdit($id) {
        $divisions = ShipDivision::findOrFail($id);
        return view('backend.ship.division.edit_division',compact('divisions'));
    }

    // Division Update
    public function DivisionUpdate(Request $request, $id) {
        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-division')->with($notification);
    } // end method

    // Division Delete
    public function DivisionDelete($id) {
        ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // end method







    //// Start Ship District

    public function DistrictView(){
        $total_district = ShipDistrict::count();
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::with('division')->orderBy('district_name')->get();
        return view('backend.ship.district.view_district',compact('total_district','division','district'));
    } // end method

    // District Store
    public function DistrictStore(Request $request){
        $request->validate([
            'division_id' => 'required',
            'district_name' => 'required',
        ]);

        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => ucfirst($request->district_name),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Division Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method

    // District Edit
    public function DistrictEdit($id) {
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.ship.district.edit_district',compact('division','district'));
    } // end method

    // District Update
    public function DistrictUpdate(Request $request, $id) {
        ShipDistrict::findOrFail($id)->update([
            'division_id' => $request->division_id,
            'district_name' => ucfirst($request->district_name),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'District Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage-district')->with($notification);
    } // end method

    // District Delete
    public function DistrictDelete($id) {
        ShipDistrict::findOrFail($id)->delete();

        $notification = array(
            'message' => 'District Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // end method


    //// End Ship District






}
