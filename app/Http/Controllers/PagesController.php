<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Project;

class PagesController extends Controller
{
    public function index() {
        $posts = Post::orderBy('created_at', 'DESC')->paginate(3);

        $projects = Project::orderBy('created_at', 'DESC')->paginate(3);

        return view('pages.index', compact('posts', 'projects'));
    }
}