<?php

namespace App\Console\Commands;

use App\Models\Genre;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetGenres extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:genres';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all genres from TMDB';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        // dd('hellooooooooo');
        $response = Http::get(config('services.tmdb.base_url') . '/genre/movie/list?api_key=' . config('services.tmdb.api_key'));
        // dd($response->json()['genres']);
        // dd($response->json()->genres);
        foreach( $response->json()['genres'] as $genre){
            Genre::create([
                'e_id' => $genre['id'],
                'name' => $genre['name'],
            ]);
        }

    }
}
