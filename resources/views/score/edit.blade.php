@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @if(session('message'))
                    {{session('message')}}
                    @endif
                Update Score</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form class="form-horizontal" method="post" action="{{route('update',['score' => $scores->id] )}}">
                        @csrf
                        @method('put')
                        @if(Auth::user()->access_right == 'A') 

                        <div class="form-group">
                            <label class="control-label col-sm-6" for="authorize">Score Authorize:</label>
                            <div class="col-sm-12">                                
                              <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="authorize" id="exampleRadios1" value="0" checked>
                                  <label class="form-check-label" for="exampleRadios1">
                                    Unauthorize
                                </label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="authorize" id="exampleRadios2" value="1">
                              <label class="form-check-label" for="exampleRadios2">
                                Authorize
                            </label>
                        </div>
                        @error('title')
                        <p class="text-danger">{{ $errors->first('level')}} </p>
                        @enderror
                    </div>
                </div>
                
                <!--input type="text" name="authorize" value="{{ $scores->authorize}}" hidden -->
                @endif
                <div class="form-group">
                    <label class="control-label col-sm-6" for="level">Difficulty Level (Easy, Medium, Hard):</label>                                
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="level" name="level" value="{{ $scores->level}}" required>
                        @error('score')
                        <p class="text-danger">{{ $errors->first('score')}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-6" for="score">Your Score:</label>
                    <div class="col-sm-12">
                        <input type="number" class="form-control" id="score" name="score" value="{{ $scores->score}}" required>
                        @error('score')
                        <p class="text-danger">{{ $errors->first('score')}}</p>
                        @enderror
                    </div>
                </div>                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-warning">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
