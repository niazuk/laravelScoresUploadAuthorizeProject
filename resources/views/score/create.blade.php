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
                Add A New Score</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form class="form-horizontal" method="post" action="{{route('store')}}">
                        @csrf
                        <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                        <div class="form-group">
                            <label class="control-label col-sm-6" for="level">Difficulty Level:</label>
                            <div class="col-sm-12">                                
                              <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="level" id="exampleRadios1" value="Easy" checked>
                                  <label class="form-check-label" for="exampleRadios1">
                                    Easy
                                  </label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="level" id="exampleRadios2" value="Medium">
                                  <label class="form-check-label" for="exampleRadios2">
                                    Medium
                                  </label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="level" id="exampleRadios3" value="Hard">
                                  <label class="form-check-label" for="exampleRadios3">
                                    Hard
                                  </label>
                                </div>
                        @error('title')
                        <p class="text-danger">{{ $errors->first('level')}} </p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-6" for="score">Your Score:</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="score" name="score" placeholder="Enter Your Score" value="{{old('score')}}" required>
                            @error('score')
                            <p class="text-danger">{{ $errors->first('score')}}</p>
                            @enderror
                        </div>
                </div>                
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
