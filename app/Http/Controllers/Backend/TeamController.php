<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
     // All Team
     public function AllTeam()
     {
         $team = Team::latest()->get();
         return view('backend.team.all_team', compact('team'));
     }
 
     // Add Team
     public function AddTeam()
     {
         return view('backend.team.add_team');
     }
 
     // Store Team
     public function StoreTeam(Request $request)
     {
        $validateData = $request->validate(
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );

         $image = $request->file('image');
         $name_gen = date('YmdHi') . $image->getClientOriginalName();
         Image::make($image)->resize(370, 420)->save('upload/team/' . $name_gen);
         $save_url = 'upload/team/' . $name_gen;
 
         Team::insert([
 
             'name' => $request->name,
             'position' => $request->position,
             'description' => $request->description,
             'status' => $request->status,
             'image' => $save_url,
             'created_at' => now(),
         ]);
 
         $notification = array(
             'message' => 'Team Inserted Successfully',
             'alert-type' => 'info',
         );
 
         return redirect()->route('all.team')->with($notification);
     }
 
     // Edit Team
     public function EditTeam($id)
     {
         $team = Team::find($id);
         return view('backend.team.edit_team', compact('team'));
     }
 
     // Update Team
     public function UpdateTeam(Request $request)
     {
        $validateData = $request->validate(
            [
                'image' => 'mimes:jpeg,png,jpg,gif,svg,webp',
            ],
        );
 
         $uid = $request->id;
         $old_img = $request->old_image;
 
         if($request->file('image'))
         {
             $image = $request->file('image');
             $name_gen = date('YmdHi') . $image->getClientOriginalName();
             Image::make($image)->resize(370, 420)->save('upload/team/' . $name_gen);
             $save_url = 'upload/team/' . $name_gen;
 
             if(file_exists($old_img))
             {
                 unlink($old_img);
             }
     
             Team::find($uid)->update([
     
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $save_url,
             ]);
     
             $notification = array(
                 'message' => 'Team Update With Image Successfully',
                 'alert-type' => 'info',
             );
     
             return redirect()->route('all.team')->with($notification);
         }
 
         else{
 
             Team::find($uid)->update([
     
                'name' => $request->name,
                'position' => $request->position,
                'description' => $request->description,
                'status' => $request->status,
             ]);
     
             $notification = array(
                 'message' => 'Team Update WithOut Image Successfully',
                 'alert-type' => 'info',
             );
     
             return redirect()->route('all.team')->with($notification);
 
         }
     }
 
     // Delete Team
     public function DeleteTeam($id)
     {
         $team = Team::find($id);
         $del_img = $team->image;
         unlink($del_img);
 
         Team::find($id)->delete();
 
         $notification = array(
             'message' => 'Team Delete Successfully',
             'alert-type' => 'info',
         );
 
         return redirect()->route('all.team')->with($notification);
 
     }
}
