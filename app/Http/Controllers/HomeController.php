<?php

namespace App\Http\Controllers;
use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    

    public function home()
    {
        $id =Auth::user()->id;
        $scores = DB::select('select scores.id as id, users.name as user_id, scores.level as level, scores.score as score from scores join users on scores.user_id = users.id where scores.user_id = '.$id.' order by scores.score desc');
        return view('index',['scores' => $scores]);
    }
}
