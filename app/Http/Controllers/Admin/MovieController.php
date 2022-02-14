<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        // $movies = Movie::with('genres');
        // $movies = Movie::orderByDesc('vote_count')->get();
        // $movies = Movie::whenGenreId(request()->genre_id)->get();
        $genres = Genre::get();
        return view('Admin.Movies.index',compact('genres'));
    }

    public function data()
    {
        $movies = Movie::whenGenreId(request()->genre_id)->get();
        // $movies = Movie::whenGenreId(request()->genre_id)
            // ->whenActorid(request()->actor_id)
            // ->whenType(request()->type)
            // ->with(['genres'])
            // ->withCount(['favoriteByUsers'])
            ;

        return DataTables::of($movies)
            // ->addColumn('record_select', 'admin.movies.data_table.record_select')
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Movie::destroy($id);
    //    session()->flash('success', __('site.deleted_successfully'));
       return response(__('movie deleted successfully'));
    }
}
