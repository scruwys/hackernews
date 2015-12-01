<?php

class StoryCommentsController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        $story = Story::find($id);
        $comments = Comment::whereStory($id)->orderBy('created_at')->get();

        return View::make('comments.index')->with('comments', $comments)->with('story', $story);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validation = new Services\Validators\Comment();

        if ( $validation->onCreate()->fails() )
        {
            return Redirect::back()->withErrors($validation->getErrors());
        }

        Comment::create(array(
            'body'   => Input::get('body'),
            'story'  => Input::get('story'),
            'author' => Auth::user()->username
        ));

        return Redirect::back()->with('success', 'Comment posted.');

    }


    // Still on the fence about the bottom...also, nested comments?

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return 'GET - Edit a comment for this story.';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        return 'POST - Edit a comment for this story.';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        return 'Soft delete this comment.';
    }

}
