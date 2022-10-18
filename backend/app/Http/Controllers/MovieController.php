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

        $movieFile               = $this->uploadMovie($movieFileRequest);
        $movieSize               = $this->formatBytes($movieSizeRequest);
        $movieTagsRequestTreated = $this->treatmentIdTags($movieTagsRequest);

        $movie = [
            'name'      => $movieNameRequest,
            'file'      => $movieFile,
            'file_size' => $movieSize,
        ];

        $idCreatedMovie = Movie::create($movie)->id;

        $this->insertRelationMovieTag($idCreatedMovie, $movieTagsRequestTreated);

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
        $movie    = Movie::find($id);

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

    private function insertRelationMovieTag($idCreatedMovie, $movieTagsRequestTreated)
    {
        foreach($movieTagsRequestTreated as $TagTreated){

            $movieTag = new MovieTag();

            $movieTag->movie_id = $idCreatedMovie;
            $movieTag->tag_id   = $TagTreated;

            $movieTag->save();
        }
    }

    private function treatmentIdTags($movieTagsRequest)
    {
        $movieTagsRequest = str_split(str_replace("-","",filter_var($movieTagsRequest, FILTER_SANITIZE_NUMBER_INT)));

        return $movieTagsRequest;
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
