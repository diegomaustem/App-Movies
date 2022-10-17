<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieTag;
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
        $movieTagsRequest = $request->tags;
        $movieFileRequest = $request->file;
        $movieSizeRequest = $request->movieSize;
        $movieNameRequest = $request->name;

        $movieFile  = $this->uploadMovie($movieFileRequest);
        $movieSize  = $this->formatBytes($movieSizeRequest);

        $movie = [
            'name'      => $movieNameRequest,
            'file'      => $movieFile,
            'file_size' => $movieSize
        ];

        $idCreatedMovie = Movie::create($movie)->id;

        // Fazer a conversão de tag para id :::

        $arr = array(1,2,3,4,5);
        $movieTagsRequest = $arr;

        $this->insertRelationMovieTag($idCreatedMovie, $movieTagsRequest);
        // return response()->json([
        //     'message' => 'Filme criado com sucesso.',
        //     'code' => 200
        // ]);

        response()->json($movieTagsRequest);
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

    private function insertRelationMovieTag($idCreatedMovie, $movieTagsRequest)
    {
        $movieTag = new MovieTag();

        $movieTag->movie_id = $idCreatedMovie;
        $movieTag->tag_id   = 2;

        $movieTag->save();
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
