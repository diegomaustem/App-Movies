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
        // No implemented
    }

    public function store(Request $request)
    {
        $tag = new Tag();

        $tag->name_tag = $request->name_tag;

        $tag->save();

        return response()->json($tag);
    }

    public function show(Tag $tag)
    {
        return response()->json($tag);
    }

    public function edit()
    {
        // No implemented
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->name_tag = $request->name_tag;

        $tag->save();

        return response()->json('Tag atualizada com sucesso.');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->json('Tag deletada com sucesso.');
    }
}
