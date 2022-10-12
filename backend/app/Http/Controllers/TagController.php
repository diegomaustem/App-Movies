<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        
        return response()->json($tags);
    }

    public function create(Request $request)
    {
        $tag = new Tag();

        $tag->name_tag = $request->name_tag;

        $tag->save();

        return response()->json($tag);
    }

    public function store(Request $request)
    {

    }

    public function show()
    {
        
    }

    public function edit()
    {
        //
    }

    public function update()
    {
    
    }

    public function destroy()
    {

    }
}
