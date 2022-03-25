<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // View Method
    public function CategoryView(){
        $category = Category::latest()->get();
        return view('backend.category.category_view', compact('category'));
    } // End Method


    // Category Store
    public function CategoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_ban' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'In Category English Name',
            'category_name_ban.required' => 'In Category Bangla Name',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_ban' => $request->category_name_ban,
            'category_slug_en' => strtolower(str_replace('', '-',$request->category_name_en)),
            'category_slug_ban' => str_replace('', '-',$request->category_name_ban),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    // Edit Function
    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit', compact('category'));
    }

    // Update Function
    public function CategoryUpdate(Request $request){
        $cat_id = $request->id;

        Category::findOrFail($cat_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_ban' => $request->category_name_ban,
            'category_slug_en' => strtolower(str_replace('', '-',$request->category_name_en)),
            'category_slug_ban' => str_replace('', '-',$request->category_name_ban),
            'category_icon' => $request->category_icon,
        ]);

        $notification = array(
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.category')->with($notification);
    } // End Method


    // Delete function
    public function CategoryDelete($id){
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // End Method


}
