<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Gallery;
use App\Models\Project;
use App\Models\ProjectMsg;
use App\Models\Subscribe;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    // Index
    public function Index()
    {
        return view('frontend.index');
    }

    // Team Section
    public function AllTeam()
    {
        return view('frontend.pages.all_team');
    }

    // Team Details
    public function TeamDetails($id)
    {
        $team = Team::find($id);
        return view('frontend.pages.team_details', compact('team'));
    }

    // Contact
    public function Contact()
    {
        return view('frontend.pages.contact');
    }

    // Store Message
    public function StoreMessage(Request $request)
    {
        if (Auth::check()) {

            Contact::insert([

                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'created_at' => now(),
            ]);

            $notification = array(

                'message' => 'Send Message Successfully',
                'alert-type' => 'success',

            );

            return redirect()->back()->with($notification);
        } else {

            $notification = array(
                'message' => 'Please Login First',
                'alert-type' => 'error',
            );

            return redirect()->back()->with($notification);
        }
    }

    // Project Details
    public function ProjectDetails($id,$slug)
    {
        $project = Project::find($id);
        $gallery = Gallery::where('project_id',$id)->get();

        return view('frontend.pages.project.project_details',compact('project','gallery'));
    }

    // All Project
    public function FrontendAllProject()
    {
        $project = Project::latest()->paginate(4);

        return view('frontend.pages.project.all_project',compact('project'));
    }

    // User Logout
    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(

            'message' => 'Logout Successfully',
            'alert-type' => 'success',

        );

        return redirect()->route('index')->with($notification);
    }

    // Project Message
    public function StoreProjectMessage(Request $request)
    {
        $pid = $request->project_id;

        ProjectMsg::insert([

            'project_id' => $pid,
            'user_id' => Auth::user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => now(),
        ]);

        $notification = array(

            'message' => 'Message Send Successfully',
            'alert-type' => 'success',

        );

        return redirect()->back()->with($notification);
    }

    // Blog Details
    public function BlogDetails($id,$slug)
    {
        $blog = Blog::find($id);
        return view('frontend.blog.blog_details',compact('blog'));
    }

    // All Blog
    public function FrontendAllBlog()
    {
        $blog = Blog::latest()->paginate(3);

        return view('frontend.blog.all_blog',compact('blog'));
    }

    // All Subscribe
    public function Subscribe(Request $request)
    {
        Subscribe::insert([

            'email' => $request->email,
            'created_at' => now(),

        ]);

        $notification = array(

            'message' => 'User Subscribe Successfully',
            'alert-type' => 'success',

        );

        return redirect()->back()->with($notification);
    }


}
