<?php

namespace App\Console\Commands;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all movies from TMDB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getMovies(){
        $response = Http::get(config('services.tmdb.base_url') . '/movie/popular?api_key=' . config('services.tmdb.api_key'). '&page=2');
        // dd($response->json());
        foreach( $response->json()['results'] as $result){
            $movie = Movie::create([
                'e_id'          => $result['id'],
                'title'         => $result['title'],
                'desc'          => $result['overview'],
                'poster'        => $result['poster_path'],
                'banner'        => $result['backdrop_path'],
                'release_date'  => $result['release_date'],
                'vote'          => $result['vote_average'],
                'vote_count'    => $result['vote_count'],
            ]);
            foreach( $result['genre_ids'] as $genreId ){
                $genre = Genre::where('e_id',$genreId)->first();
                $movie->genres()->attach($genre->id);
            }
        }
    }


    public function handle()
    {
         return $this->getMovies();

    }
}
