<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog\BlogPost;
use App\Models\Blog\BlogPostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

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
            'blog_category_name_ban.required' => 'Input Blog Category Bangla Name',
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




    ///////////////////////////// Blog Post ALL Methods //////////////////

    public function ListBlogPost(){
        $blogpost = BlogPost::with('category')->latest()->get();
        return view('backend.blog.post.post_list',compact('blogpost'));
    } // end method

    public function AddBlogPost(){

        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();
        return view('backend.blog.post.post_view',compact('blogpost','blogcategory'));

    } // end method


    public function BlogPostStore(Request $request){

        $request->validate([
            'post_title_en' => 'required',
            'post_title_ban' => 'required',
            'post_image' => 'required',
        ],[
            'post_title_en.required' => 'Input Post Title English Name',
            'post_title_ban.required' => 'Input Post Title Bangla Name',
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(780,433)->save('uploads/post/'.$name_gen);
        $save_url = 'uploads/post/'.$name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'post_title_en' => $request->post_title_en,
            'post_title_ban' => $request->post_title_ban,
            'post_slug_en' => strtolower(str_replace(' ', '-',$request->post_title_en)),
            'post_slug_ban' => str_replace(' ', '-',$request->post_slug_ban),
            'post_image' => $save_url,
            'post_details_en' => $request->post_details_en,
            'post_details_ban' => $request->post_details_ban,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Blog Post Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('list.post')->with($notification);

    } // end mehtod




}
