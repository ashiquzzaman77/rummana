<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    // All Blog
    public function AllBlog()
    {
        $blog = Blog::latest()->get();
        return view('backend.blog.all_blog', compact('blog'));
    }

    // Add Blog
    public function AddBlog()
    {
        return view('backend.blog.add_blog');
    }

    // Store Blog
    public function StoreBlog(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $image = $request->file('image');
        $name_gen = date('Y') . $image->getClientOriginalName();
        Image::make($image)->resize(770, 520)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;

        Blog::insert([

            'blog_name' => $request->blog_name,
            'blog_slug' => strtolower(str_replace('', '-', $request->blog_name)),
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'status' => 1,
            'image' => $save_url,
            'created_at' => now(),
        ]);

        $notification = array(
            'message' => 'Blog Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.blog')->with($notification);
    }

    // Edit Blog
    public function EditBlog($id)
    {
        $blog = Blog::find($id);

        return view('backend.blog.edit_blog', compact('blog'));
    }

    // Update Blog
    public function UpdateBlog(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $uid = $request->id;
        $old_img = $request->old_image;


        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = date('Y') . $image->getClientOriginalName();
            Image::make($image)->resize(770, 520)->save('upload/blog/' . $name_gen);
            $save_url = 'upload/blog/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Blog::find($uid)->update([

                'blog_name' => $request->blog_name,
                'blog_slug' => strtolower(str_replace('', '-', $request->blog_name)),
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                'status' => 1,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Blog Update With Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.blog')->with($notification);
        } else {

            Blog::find($uid)->update([

                'blog_name' => $request->blog_name,
                'blog_slug' => strtolower(str_replace('', '-', $request->blog_name)),
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                'status' => 1,
            ]);

            $notification = array(
                'message' => 'Blog Update WithOut Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.blog')->with($notification);
        }
    }

    // Delete Blog
    public function DeleteBlog($id)
    {
        $delete = Blog::find($id);
        $imgDel = $delete->image;
        unlink($imgDel);

        Blog::find($id)->delete();

        $notification = array(
            'message' => 'Blog Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    // Inactive Blog
    public function InactiveBlog($id)
    {
         Blog::find($id)->update([

            'status' => 0,

         ]);

         $notification = array(
            'message' => 'Blog Inactive Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    // Active Blog
    public function ActiveBlog($id)
    {
         Blog::find($id)->update([

            'status' => 1,

         ]);

         $notification = array(
            'message' => 'Blog Active Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    

}
