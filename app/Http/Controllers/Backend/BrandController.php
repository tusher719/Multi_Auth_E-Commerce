<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    // Brand View
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', compact('brands'));
    } // End Method


    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_ban' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'In Brand English Name',
            'brand_name_ban.required' => 'In Brand Bangla Name',
            ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('uploads/brand/'.$name_gen);
        $save_url = 'uploads/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_ban' => $request->brand_name_ban,
            'brand_slug_en' => strtolower(str_replace('', '-',$request->brand_name_en)),
            'brand_slug_ban' => str_replace('', '-',$request->brand_name_ban),
            'brand_image' => $save_url,
        ]);

        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    } // End Method


    // Brand Edit
    public function BrandEdit($id){
        $brand = Brand::findOrFail($id);
        return view('backend.brand.brand_edit', compact('brand'));
    } // End Method

    public function BrandUpdate(Request $request){
        $brand_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('brand_image')) {
            unlink($old_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/brand/'.$name_gen);
            $save_url = 'uploads/brand/'.$name_gen;

            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ban' => $request->brand_name_ban,
                'brand_slug_en' => strtolower(str_replace('', '-',$request->brand_name_en)),
                'brand_slug_ban' => str_replace('', '-',$request->brand_name_ban),
                'brand_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
        }
        else{
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_ban' => $request->brand_name_ban,
                'brand_slug_en' => strtolower(str_replace('', '-',$request->brand_name_en)),
                'brand_slug_ban' => str_replace('', '-',$request->brand_name_ban),
            ]);

            $notification = array(
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('all.brand')->with($notification);
        }
    } // End Method


    // Delete Function
    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // End Method
}
