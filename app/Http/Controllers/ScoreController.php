<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->access_right == 'A')
            $where = "";
        else
            $where = "where scores.user_id = ".Auth::user()->id;

        $scores = DB::select('select scores.id as id, users.name as name, scores.level as level, scores.score as score, scores.authorize as authorize from scores join users on scores.user_id = users.id '.$where.' order by scores.score desc');
        return view('score.index',['scores' => $scores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('score.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        Score::create($this->validateScore());

        return redirect()->route("create")->with('message','Score was successful added!  ');

        //return view('score.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {

        $scores = Score::find($score->id);

        //dd($scores);

        return view('score.edit',compact('scores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        $scores = Score::find($score->id);

        $scores->level = $request->level;
        $scores->score = $request->score;
        if (isset($request->authorize))
            $scores->authorize = $request->authorize;
        //dd($request->all());
        $scores->save();

        return redirect()->route("home")->with('message','Score was successful Updated!  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }

    protected function validateScore()
    {
        return request()->validate([
            'user_id' => 'required',
            'level' => 'required',
            'score' => 'required | integer'
        ]);
    }
}
