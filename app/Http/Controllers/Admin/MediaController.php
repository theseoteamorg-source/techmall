<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest()->paginate(15);
        return view('admin.media.index', compact('media'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:2048',
        ]);

        $file = $request->file('file');
        $path = $file->store('public');

        $media = new Media();
        $media->name = $file->getClientOriginalName();
        $media->file_name = $file->hashName();
        $media->path = $path;
        $media->mime_type = $file->getMimeType();
        $media->size = $file->getSize();
        $media->user_id = auth()->id();
        $media->save();

        return response()->json([
            'id' => $media->id,
            'name' => $media->name,
            'url' => asset('storage/' . $media->file_name),
        ]);
    }

    public function destroy(Media $medium)
    {
        Storage::delete($medium->path);
        $medium->delete();

        return redirect()->route('admin.media.index')->with('success', 'File deleted successfully.');
    }

    public function media_library(Request $request)
    {
        $media = Media::latest()->paginate(15);
        return view('admin.media.media-library', compact('media'));
    }
}
