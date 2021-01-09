<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tag;

use App\Models\Hobby;

class HobbyTagController extends Controller
{
    public function getFilteredHobbies($tag_id) {
        $tag = new Tag();

        $hobbies = $tag::findOrFail($tag_id)->filteredHobbies()->paginate(10);

        $filter = $tag::find($tag_id);

        return view('hobby.index', [
            'hobbies' => $hobbies,
            'filter' => $filter
        ]);
    }

    public function attachTag($hobby_id, $tag_id){
        // dd('attach');
        $hobby = Hobby::find($hobby_id);
        $tag = Tag::find($tag_id);
        $hobby->tags()->attach($tag_id);
        return back()->with([
            'message_success' => "The tag <b>". $tag->name . "</b> was added."
        ]);
    }

    public function detachTag($hobby_id, $tag_id){
        // dd('detach');
        $hobby = Hobby::find($hobby_id);
        $tag = Tag::find($tag_id);
        $hobby->tags()->detach($tag_id);
        return back()->with([
            'message_warning' => "The tag <b>". $tag->name . "</b> was removed."
        ]);
    }


}
