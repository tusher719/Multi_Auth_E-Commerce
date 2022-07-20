<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //
    public function BlogCategory(){

        $blogcategory = BlogPostCategory::OrderBy('blog_category_name_en')->get();
        return view('backend.blog.category.category_view',compact('blogcategory'));
    } // end method



    // Blog Category Store
    public function BlogCategoryStore(Request $request){

        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_ban' => 'required',

        ],[
            'blog_category_name_en.required' => 'Input Blog Category English Name',
            'blog_category_name_ban.required' => 'Input Blog Category Hindi Name',
        ]);

        BlogPostCategory::insert([
            'blog_category_name_en' => Str::ucfirst($request->blog_category_name_en),
            'blog_category_name_ban' => $request->blog_category_name_ban,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-',$request->blog_category_name_en)),
            'blog_category_slug_ban' => str_replace(' ', '-',$request->blog_category_name_ban),
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Blog Category Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // end method


    // Blog Category Edit
    public function BlogCategoryEdit($id){

        $blogcategory = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit',compact('blogcategory'));
    } // end method

    // Blog Category Update
    public function BlogCategoryUpdate(Request $request){

        $blogcar_id = $request->id;

        BlogPostCategory::findOrFail($blogcar_id)->update([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_ban' => $request->blog_category_name_ban,
            'blog_category_slug_en' => strtolower(str_replace(' ', '-',$request->blog_category_name_en)),
            'blog_category_slug_ban' => str_replace(' ', '-',$request->blog_category_name_ban),
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('blog.category')->with($notification);

    } // end method


    // Delete function
    public function BlogCategoryDelete($id){
        BlogPostCategory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    } // End Method




}
