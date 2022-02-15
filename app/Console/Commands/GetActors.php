<?php

namespace App\Console\Commands;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetActors extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:actors';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all actors from TMDB';

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

            $response = Http::get(config('services.tmdb.base_url') . '/movie/{movie_id}/credits?api_key=' . config('services.tmdb.api_key'));
            // dd($response->json());
            foreach( $response->json()['results'] as $result){
                $movie = Movie::create([
                    'e_id'          => $result['id'],
                    'name'         => $result['title'],
                    'image'        => $result['profile_path'],

                ]);
                // foreach( $result['genre_ids'] as $genreId ){
                //     $genre = Genre::where('e_id',$genreId)->first();
                //     $movie->genres()->attach($genre->id);
                // }
            }

    }


    public function handle()
    {
         return $this->getMovies();

    }
}
