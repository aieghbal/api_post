<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::select('id', 'title', 'content')->paginate(20);
    }

    public function show($id)
    {
        return Post::select('id', 'title', 'content')->findOrFail($id);
    }
}
