<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexPageController extends Controller
{
    public function index()
    {
        //$scores = Score::orderby('score','desc')->paginate(10);
        $scores = DB::select('select scores.id as id, users.name as user_id, scores.level as level, scores.score as score from scores join users on scores.user_id = users.id where scores.authorize = 1 order by scores.score desc');
        return view('index',['scores' => $scores]);
    }

    public function search(Request $request)
    {
    	$scores = DB::select('select scores.id as id, users.name as user_id, scores.level as level, scores.score as score from scores join users on scores.user_id = users.id where scores.authorize = 1 and (scores.level = "'.$request->search.'" or users.name like "%'.$request->search.'%" ) order by scores.score desc');
        return view('index',['scores' => $scores]);
    }
}
