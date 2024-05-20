<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProjectMsg;
use Illuminate\Http\Request;

class ProjectMsgController extends Controller
{
    //Project Message
    public function ProjectMessage()
    {
        $msg = ProjectMsg::latest()->get();
        return view('backend.project.project_message',compact('msg'));
    }

    //View Project Message
    public function ViewProjectMessage($id)
    {
        $msg = ProjectMsg::find($id);
        return view('backend.project.view_project_message',compact('msg'));
    }

    //Delete Project Message
    public function DeleteProjectMessage($id)
    {
        ProjectMsg::findOrFail($id)->delete();

        $notification = array(

            'message' => 'Message Delete Successfully',
            'alert-type' => 'info',

        );

        return redirect()->back()->with($notification);
    }
}
