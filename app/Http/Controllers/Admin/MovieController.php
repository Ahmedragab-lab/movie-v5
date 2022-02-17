<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::get();
        $actors = Actor::get();
        // $actor = null;
        // if (request()->actor_id) {
        //     $actor = Actor::find(request()->actor_id);
        // }
        return view('Admin.Movies.index',compact('genres','actors'));
    }

    public function data()
    {
        $movies = Movie::get();
        $movies = Movie::whenGenreId(request()->genre_id)
                       ->whenActorId(request()->actor_id)
                       ->whenType(request()->type)
                       ->get();

        return DataTables::of($movies)
            ->addColumn('record_select', 'admin.movies.data_table.record_select')
            ->addColumn('poster', function (Movie $movie) {
                return view('Admin.movies.data_table.poster', compact('movie'));
            })
            ->addColumn('genres', function (Movie $movie) {
                return view('Admin.movies.data_table.genres', compact('movie'));
            })
            ->addColumn('vote', 'Admin.movies.data_table.vote')
            ->editColumn('created_at', function (Movie $movie) {
                return $movie->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'Admin.movies.data_table.actions')
            ->rawColumns(['vote', 'actions'])
            ->toJson();

    }// end of data

    public function show( $id)
    {
        $movie= Movie::findorfail($id);
        return view('Admin.movies.show', compact('movie'));
    }

    // public function show(Movie $movie)
    // {
    //     $movie->load(['genres', 'actors', 'images']);
    //     return view('Admin.movies.show', compact('movie'));
    // }


    public function destroy($id)
    {
       Movie::destroy($id);
    //    session()->flash('success', __('site.deleted_successfully'));
       return response(__('movie deleted successfully'));
    }
}
