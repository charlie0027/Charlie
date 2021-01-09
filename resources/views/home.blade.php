@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Hello {{ auth()->user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @isset($hobbies)
                    @if($hobbies->count() > 0)
                    <h4>My Hobbies:</h4>
                    @endif
                    <ul class="list-group">
                        @foreach($hobbies as $hobby)
                            <li class="list-group-item">
                                <a href="/hobby/{{ $hobby->id }}" title="Show details here">{{ $hobby->name }}</a> 
                                @auth()
                                <a href="/hobby/{{ $hobby->id}}/edit" class="btn btn-sm btn-light ml-2"><i class="fas fa-edit"></i> Edit hobby</a>
                                @endauth()
                                
                                @auth()
                                <form style="display: inline" class="float-right" action="/hobby/{{$hobby->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" value="Delete" class="btn btn-small btn-outline-danger">
                                </form>
                                @endauth()
                                <span class="float-right mx-2">{{ $hobby->created_at->diffForHumans() }}</span>
                                <br>
                                @foreach($hobby->tags as $tag)
                                    <a href="/hobby_tag/tag/{{ $tag->id }}"><span class="badge badge-{{ $tag->style }}"> {{ $tag->name }}</span></a>
                                @endforeach
                            </li>

                            <!-- <li class="list-group-item">
                                {{ $hobby->description }}
                            </li> -->
                            
                        @endforeach
                    </ul>
                    @endisset

                    <a href="/hobby/create" class="btn btn-success btn-sm"> <i class="fas fa-plus-circle"></i> Create a Hobby</a>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
