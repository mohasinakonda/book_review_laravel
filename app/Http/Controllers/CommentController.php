<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = Auth::user();
        $blog = Blog::find($request->blog_id);

        if ($user->id === $request->user_id && $blog->id === $request->blog_id) {
            // dd($request->blog_id);
            $user->comment()->create([
                'blog_id' => 99,
                'comment' => $request->comment,
                'rating' => $request->rating,

            ]);
        } else {
            return response([
                'status' => false,
                'message' => 'something went wrong!'
            ]);
        }
        return redirect()->route('blog.show', ['blog' => $blog]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
