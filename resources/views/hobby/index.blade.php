@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                @isset($filter)
                    <div class="card-header">Filtered hobbies by <span style="font-size:120%;" class="badge badge-{{ $filter->style }}">{{ $filter->name }}</span>
                    <a href="/hobby" class="float-right"> <span> Show all Hobbies</span></a>
                @else
                    <div class="card-header">All the Hobbies
                @endisset
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($hobbies as $hobby)
                            <li class="list-group-item">
                                <a href="/hobby/{{ $hobby->id }}" title="Show details here">{{ $hobby->name }}</a> 
                                @auth()
                                <a href="/hobby/{{ $hobby->id}}/edit" class="btn btn-sm btn-light ml-2"><i class="fas fa-edit"></i> Edit hobby</a>
                                @endauth()
                                <span class="mx-2">Posted by: <a href="/user/{{ $hobby->user_id }}">{{ $hobby->user->name }} </a>( {{ $hobby->user->hobbies->count() }} Hobbies)</span>
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
                    
                    </div>
                    @auth()
                    <div class="mt-2">
                        <a href="/hobby/create" class="btn btn-success btn-sm"><i class="fas fa-plus-circle">Create New Hobby</i></a>

                    </div>
                    @endauth()
                </div>
                <div class="mt-2">
                    {{ $hobbies->links() }}
                </div>
                    
                    
                
            </div>
        </div>
        
    </div>
</div>
@endsection
