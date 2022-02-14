<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GenereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $genres = Genre::get();
        // return view('Admin.Genres.index',compact('genres'));
        return view('Admin.Genres.index');
    }
    public function data()
    {
        $genres = Genre::withCount(['movies']);
        // $genres = Genre::get();

        return DataTables::of($genres)
            // ->addColumn('record_select', 'admin.genres.data_table.record_select')
            // ->addColumn('related_movies', 'admin.genres.data_table.related_movies')
            ->editColumn('created_at', function (Genre $genre) {
                return $genre->created_at->format('Y-m-d');
            })
            ->addColumn('actions', 'Admin.Genres.data_table.actions')
            ->rawColumns(['actions'])
            // ->rawColumns(['record_select', 'related_movies', 'actions'])
            ->toJson();

    }// end of data

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function destroy($id)
    {
       Genre::destroy($id);
    //    session()->flash('success', __('site.deleted_successfully'));
    //    return response(__('Genre deleted successfully'));
       return redirect()->route('genres.index');
    }
    // public function destroy(Genre $genre)
    // {
    //     $this->delete($genre);
    //     session()->flash('success', __('site.deleted_successfully'));
    //     return response(__('Genre deleted successfully'));

    // }// end of destroy
}
