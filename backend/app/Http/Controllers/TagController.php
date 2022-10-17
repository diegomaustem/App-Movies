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

        return response()->json([
            'message' => 'Tag criada com sucesso.',
            'code' => 200
        ]);
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

        return response()->json([
            'message' => 'Tag atualizada com sucesso.',
            'code' => 200
        ]);

        return response()->json('Não foi possível atualizar Tag.');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);

        if($tag) {

            $tag->delete();

            return response()->json([
                'message' =>'Tag excluída com sucesso.',
                'code' => 200
            ]);

        } else {
            return response()->json(['Não foi possível excluir Tag.']);
        }
    }
}
