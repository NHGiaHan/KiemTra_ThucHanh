<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    // 7.1: Danh sách các thể loại phim
    public function listGenres() 
    {
        $genres = DB::table('genre')->get(); 
        
        return view('phim_71', ['genres' => $genres]);
    }

    // 7.2: Top 10 phim có điểm bình chọn cao nhất
    public function topMovies() 
    {
        $movies = DB::table('movie')
            ->orderBy('vote_average', 'desc')
            ->limit(10)
            ->get();

        return view('phim_72', ['movies' => $movies]);
    }

    // 7.3: Top 10 doanh thu (budget) cao nhất
    public function getTopBudget() 
    {
        $movies = DB::table('movie')
                    ->orderBy('budget', 'desc')
                    ->limit(10)
                    ->get();
                    
        return view('movies_list', [
            'movies' => $movies, 
            'title' => '10 Bộ Phim Có Doanh Thu (Budget) Cao Nhất'
        ]);
    }

    // 7.4: Phim thời lượng (runtime) > 120 phút
    public function getLongMovies() 
    {
        $movies = DB::table('movie')
                    ->where('runtime', '>', 120)
                    ->limit(10) 
                    ->get();
                    
        return view('movies_list', [
            'movies' => $movies, 
            'title' => '10 Bộ Phim Có Thời Lượng (Runtime) > 120 Phút'
        ]);
    }

    // 7.5: Danh sách phim sản xuất tại Canada (Hàm này Hằng giữ lại từ đầu)
    public function getCanadaMovies()
    {
        $movies = DB::table('movie')
                    ->where('country_name', 'Canada')
                    ->get();

        return view('phim_75', compact('movies'));
    }

    // 7.6: Danh sách phim có thể loại là Action
    public function getActionMovies() 
    {
        $movies = DB::table('movie')
            ->join('movie_genre', 'movie.id', '=', 'movie_genre.id_movie') 
            ->join('genre', 'movie_genre.id_genre', '=', 'genre.id') 
            ->where('genre.genre_name', 'Action')
            ->select('movie.movie_name', 'movie.release_date', 'movie.overview', 'movie.image_link')
            ->get();

        return view('phim_76', ['movies' => $movies]);
    }

    // 7.7: Phim có điểm bình chọn > 8.0 và số lượt bình chọn > 10000
    public function getPopularMovies()
    {
        $movies = DB::table('movie')
            ->where('vote_average', '>', 8.0)
            ->where('vote_count', '>', 10000)
            ->get();

        return view('phim_77', compact('movies'));
    }
}