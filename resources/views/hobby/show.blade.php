@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">Hobby Detail</div>

                <div class="card-body">
                    <b>{{ $hobby->name }}</b>
                    <br>
                    <small >Posted {{ $hobby->created_at->diffForHumans() }}</small> 
                    <br><br>
                    <p>{{ $hobby->description }}</p>
                    <div class="mt-2">
                        <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm"><i class="fas fa-arrow-circle-up"> Back to overview</i></a>

                    </div>
                    <br>
                    @if($hobby->tags->count() > 0)
                        <b>Used Tags (Click to Remove*) </b><br>
                        @foreach($hobby->tags as $tag)
                            <a href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/detach"><span class="badge badge-{{ $tag->style }}"> {{ $tag->name }}</span></a>
                        @endforeach
                    <br>
                    @endif
                    
                    @if($availTags->count() > 0)
                    <b>Available Tags (Click to Add*) </b><br>
                    
                    @foreach($availTags as $tag)
                        <a href="/hobby/{{$hobby->id}}/tag/{{$tag->id}}/attach"><span class="badge badge-{{ $tag->style }}"> {{ $tag->name }}</span></a>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
