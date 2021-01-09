@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ $user->name }} </div>

                <div class="card-body">
                    <b>Motto: {{ $user->motto }}</b>
                    
                    <br>
                    <br>
                    <p><b> About Me</b> <br>
                    {{ $user->about_me }}</p>
                    <div class="mt-2">
                        <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-circle-up"> Back to overview</i></a>

                    </div>
                    <br>
                    @if($user->hobbies->count() > 0)
                    <h5>Hobbies of {{ $user->name }} </h5>
                    <ul class="list-group">
                        @foreach($user->hobbies as $hobby)
                            <li class="list-group-item">
                                <a href="/hobby/{{ $hobby->id }}" title="Show details here">{{ $hobby->name }}</a> 
                                
                                <span class="mx-2">Posted by: <a href="/user/{{ $hobby->user_id }}">{{ $hobby->user->name }} </a>( {{ $hobby->user->hobbies->count() }} Hobbies)</span>
                                
                                
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
                    @else
                    <h4>{{ $user->name }} has not created any hobbies yet</h4>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
