<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Project;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProjectController extends Controller
{
    // All Project
    public function AllProject()
    {
        $project = Project::latest()->get();
        return view('backend.project.all_project', compact('project'));
    }

    // Add Project
    public function AddProject()
    {
        return view('backend.project.add_project');
    }

    // Store Project
    public function StoreProject(Request $request)
    {
        $validateData = $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

        $image = $request->file('image');
        $name_gen = date('Y') . $image->getClientOriginalName();
        Image::make($image)->resize(370, 250)->save('upload/project/project_image/' . $name_gen);
        $save_url = 'upload/project/project_image/' . $name_gen;

        $project_id = Project::insertGetId([

            'project_name' => $request->project_name,
            'project_slug' => strtolower(str_replace('', '-', $request->project_name)),
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'status' => 1,
            'image' => $save_url,
            'created_at' => now(),
        ]);

        // Gallery Image //

        $images = $request->file('multi_img');

        foreach ($images as $img) {

            $make_gen = date('Y') . $img->getClientOriginalName();
            Image::make($img)->resize(370, 250)->save('upload/project/multi_image/' . $make_gen);
            $uploadPath = 'upload/project/multi_image/' . $make_gen;

            Gallery::insert([

                'project_id' => $project_id,
                'photo' => $uploadPath,
                'created_at' => now(),

            ]);
        }
        // Multi Image

        $notification = array(
            'message' => 'Project Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.project')->with($notification);
    }

    // Edit Project
    public function EditProject($id)
    {
        $project = Project::find($id);
        $multimg = Gallery::where('project_id', $id)->get();

        return view('backend.project.edit_project', compact('project', 'multimg'));
    }

    // Update Project
    public function UpdateProject(Request $request)
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
            Image::make($image)->resize(370, 250)->save('upload/project/project_image/' . $name_gen);
            $save_url = 'upload/project/project_image/' . $name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Project::find($uid)->update([

                'project_name' => $request->project_name,
                'project_slug' => strtolower(str_replace('', '-', $request->project_name)),
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                'status' => 1,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Project Update With Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.project')->with($notification);
        } else {

            Project::find($uid)->update([

                'project_name' => $request->project_name,
                'project_slug' => strtolower(str_replace('', '-', $request->project_name)),
                'short_descp' => $request->short_descp,
                'long_descp' => $request->long_descp,
                'status' => 1,
            ]);

            $notification = array(
                'message' => 'Project Update WithOut Image Successfully',
                'alert-type' => 'info',
            );

            return redirect()->route('all.project')->with($notification);
        }
    }

    // Store Gallery Image

    public function StoreGalleryImage(Request $request)
    {
        $galleryImg = $request->imgId;
        $images = $request->file('multi_img');

        $make_gen = date('Y') . $images->getClientOriginalName();
        Image::make($images)->resize(370, 250)->save('upload/project/multi_image/' . $make_gen);
        $uploadPath = 'upload/project/multi_image/' . $make_gen;

        Gallery::insert([

            'project_id' => $galleryImg,
            'photo' => $uploadPath,

        ]);

        // Multi Image

        $notification = array(
            'message' => 'Gallery Image Inserted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    // Update Gallery Image

    public function UpdateGalleryImage(Request $request)
    {
        $images = $request->multi_img;

        foreach ($images as $id => $img) {

            $imgDel = Gallery::find($id);
            unlink($imgDel->photo);

            $make_gen = date('Y') . $img->getClientOriginalName();
            Image::make($img)->resize(370, 250)->save('upload/project/multi_image/' . $make_gen);
            $uploadPath = 'upload/project/multi_image/' . $make_gen;

            Gallery::where('id', $id)->update([

                'photo' => $uploadPath,
                'created_at' => now(),

            ]);
        }
        // Multi Image

        $notification = array(
            'message' => 'Gallery Image Update Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    // Delete Gallery Image
    public function DeleteGalleryImage($id)
    {
        $delete = Gallery::find($id);
        $imgDel = $delete->photo;
        unlink($imgDel);

        Gallery::find($id)->delete();

        $notification = array(
            'message' => 'Gallery Image Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }

    // Delete Project
    public function DeleteProject($id)
    {
        $delete = Project::find($id);
        $imgDel = $delete->image;
        unlink($imgDel);
        Project::find($id)->delete();

        $images = Gallery::where('project_id', $id)->get();

        foreach ($images as $img) {
            unlink($img->photo);
            Gallery::where('project_id', $id)->delete();
        }

        $notification = array(
            'message' => 'Full Project Delete Successfully',
            'alert-type' => 'info',
        );

        return redirect()->back()->with($notification);
    }
}
