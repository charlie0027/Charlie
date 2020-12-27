@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($hobbies as $hobby)
                            <li class="list-group-item">
                                <a href="/hobby/{{ $hobby->id }}" title="Show details here">{{ $hobby->name }}</a> 
                                <a href="/hobby/{{ $hobby->id}}/edit" class="btn btn-sm btn-light ml-2"><i class="fas fa-edit"></i> Edit hobby</a>
                                <form style="display: inline" class="float-right" action="/hobby/{{$hobby->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" value="Delete" class="btn btn-small btn-outline-danger">
                                </form>
                            </li>

                            <!-- <li class="list-group-item">
                                {{ $hobby->description }}
                            </li> -->
                        @endforeach
                    </ul>

                    <div class="mt-2">
                        <a href="/hobby/create" class="btn btn-success btn-sm"><i class="fas fa-plus-circle">Create New Hobby</i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
