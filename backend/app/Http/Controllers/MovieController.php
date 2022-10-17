<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::all();

        return response()->json($movies);
    }

    public function store(Request $request)
    {
        $movie = new Movie();

        $movieTags = $request->tags;
        $movieFile = $request->file;
        $movieSize = $request->movieSize;

        $movie->name      = $request->name;
        $movie->file      = $this->uploadMovie($movieFile);
        $movie->file_size = $this->formatBytes($movieSize);

        $movie->save();

        return response()->json([
            'message' => 'Filme criado com sucesso.',
            'code' => 200
        ]);
    }

    public function show(Movie $movie)
    {
        return response()->json($movie);
    }

    public function destroy($id)
    {
        $movie = Movie::find($id);

        if($movie) {

            $movie->delete();

            return response()->json([
                'message' =>'Filme excluído com sucesso.',
                'code' => 200
            ]);
        } else {
            return response()->json(['Não foi possível excluir Filme.']);
        }
    }

    private function uploadMovie($movieFile)
    {
        $movieFile = $movieFile->store('movies','public');

        return $movieFile;
    }

    private function formatBytes($movieSize, $precision = 2)
    {
        $unit = ["B", "KB", "MB", "GB"];
        $exp = floor(log($movieSize, 1024)) | 0;

        return round($movieSize / (pow(1024, $exp)), $precision).$unit[$exp];
    }



}
