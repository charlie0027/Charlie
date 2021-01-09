@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach($tags as $tag)
                            <li class="list-group-item">
                                <a href="/tag/{{ $tag->id }}" title="Show details here" class="btn btn-{!!lcfirst($tag->style)!!}">{{ $tag->name }}</a> 
                                @auth
                                <a href="/tag/{{ $tag->id}}/edit" class="btn btn-sm btn-priimary ml-2 btn-outline-primary"><i class="fas fa-edit"></i> Edit Tag</a>
                                <form style="display: inline" action="/tag/{{$tag->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <input type="submit" value="Delete" class="btn btn-small btn-outline-danger">
                                </form>
                                @endauth
                                
                                <a href="/hobby_tag/tag/{{$tag->id}}" class="float-right">Used {{ $tag->hobbies()->count() }} Times</a>
                                
                            </li>

                            <!-- <li class="list-group-item">
                                {{ $tag->style }}
                            </li> -->
                        @endforeach
                    </ul>

                    <div class="mt-2">
                        <a href="/tag/create" class="btn btn-success btn-sm"><i class="fas fa-plus-circle">Create New Tag</i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
