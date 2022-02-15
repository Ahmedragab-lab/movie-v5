<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ActorController extends Controller
{
    public function index()
    {
        // $movies = Movie::with('genres');
        // $movies = Movie::orderByDesc('vote_count')->get();
        // $movies = Movie::whenGenreId(request()->genre_id)->get();
        // $genres = Genre::get();
        return view('Admin.actors.index');
    }

    public function data()
    {
        $actors = Actor::withCount(['movies']);
        return DataTables::of($actors)
            // ->addColumn('record_select', 'admin.movies.data_table.record_select')
            ->addColumn('image', function (Actor $actor) {
                return view('Admin.actors.data_table.image', compact('actor'));
            })
            ->editColumn('created_at', function (Actor $movie) {
                return $movie->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'Admin.Actors.data_table.actions')
            ->rawColumns(['actions','image'])
            ->toJson();

    }// end of data

    public function destroy($id)
    {
       Actor::destroy($id);
       return response(__('actor deleted successfully'));
    }
}
