<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class MediaController extends Controller
{
    public function index() {
        $photos = Photo::paginate(2);
        return view('admin.media.index', compact('photos'));
    }

    public function create() {
        Session::flash('added_photo', 'The photo(s) have been successfully uploaded');
        return view('admin.media.create');
    }

    public function store(Request $request){
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['file'=>$name]);
    }

    public function destroy($id) {
        $photo = Photo::findOrFail($id);
        unlink(public_path() . $photo->file);
        $photo->delete();
        Session::flash('deleted_photo', 'The photo has been successfully deleted');
        return redirect('admin/media');
    }


}
