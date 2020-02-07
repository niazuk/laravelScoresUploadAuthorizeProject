@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Scores</div>

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
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; ?>
                            @foreach($scores as $score)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $score->user_id }}</td>
                                <td>{{ $score->level }}</td>
                                <td>{{ $score->score }}</td>
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
