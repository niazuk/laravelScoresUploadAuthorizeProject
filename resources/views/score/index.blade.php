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
                Scores</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Position</th>
                                <th>Name</th>
                                <th>Difficulty</th>
                                <th>Score</th>
                                <th>Status</th>
                                <th colspan="2" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($scores as $score)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $score->name }}</td>
                                <td>{{ $score->level }}</td>
                                <td>{{ $score->score }}</td>
                                <td>
                                    @if($score->authorize == '1') 
                                    Authorized 
                                    @else
                                    Unauthorized
                                    @endif
                                </td>
                                <td><form method="post" action="{{route('edit',['score' => $score->id] )}}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Edit</button></form>
                                </td>                                
                                   @if(Auth::user()->access_right == 'A') 
                                   <td>
                                   <form method="post" action="{{route('delete',['score' => $score->id] )}}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-primary">Delete</button></form>
                                </td>
                                    @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
