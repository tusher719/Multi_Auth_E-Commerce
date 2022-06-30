<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
            'division_name' => $request->division_name,
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
    }

    // Division Delete
    public function DivisionDelete($id) {
        ShipDivision::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Division Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }







}
