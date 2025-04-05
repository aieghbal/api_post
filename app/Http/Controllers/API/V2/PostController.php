<?php

namespace App\Http\Controllers\API\V2;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Post::with(['tags', 'tags.categories'])->paginate(20);
    }

    public function show($id)
    {
        return Post::with(['tags', 'tags.categories'])->findOrFail($id);
    }
}
