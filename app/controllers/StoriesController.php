<?php

class StoriesController extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $paginator = Story::paginate(10);

        $stories = $paginator->getCollection()->sortBy(function($story)
        {
            return $story->getScore();
        })->reverse();

        if ( Input::get('sort') == 'newest' ) 
        {
            $stories = Story::orderBy('created_at', 'desc');
            $paginator = $stories->paginate(10);

            $stories = $stories->get();
        } 

        if ( Input::get('sort') == 'submitted' ) 
        {
            $stories = Story::where('author', '=', Auth::user()->username)->orderBy('created_at', 'desc');
            $paginator = $stories->paginate(10);
            
            $stories = $stories->get();
        }

        // if ( Input::get('sort') == 'favorited' ) 
        // {

        //     $pool = DB::table('stories')
        //         ->join('votes', 'stories.id', '=', 'votes.story')
        //         ->select('stories.id')
        //         ->where('author', '=', Auth::user()->username);
            
        //     $stories = Story::where('id', '')

        //     $paginator = $stories->paginate(10);
            
        //     $stories = $stories->get();
        // }

        return View::make('stories.index')->with('stories', $stories)->with('paginator', $paginator);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('stories.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validation = new Services\Validators\Story();

        if ( $validation->fails() ) 
        {
            return Redirect::back()->withErrors($validation->getErrors());
        }

        $url = new Services\HttpHelper( Input::get('url') );
        $url->add_http();

        if ( !$url->is_valid() ) 
        {
            return Redirect::back()->with('error', 'Invalid URL.');
        }

        Story::create(array(
            'title'  => Input::get('title'),
            'url'     => $url->get(),
            'author' => Auth::user()->username,
            'points' => 1
        ));

        return Redirect::back()->with('success', 'Story posted.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $story = Story::find($id);

        return View::make('stories.edit')->with('story', $story);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $validation = new Services\Validators\Story();

        if ( $validation->fails() ) {
            return Redirect::back()->withErrors($validation->getErrors());
        }
        
        $story = Story::find($id);

        $story->title = Input::get('title');
        $story->url = Input::get('url');

        $story->save();

        return Redirect::back()->with('success', 'Story information updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $story = Story::find($id);

        if ( Auth::user()->username == $story->author )
        {
            $story->delete();
            return Redirect::back()->with('success', 'Story removed.');
        }
        return Redirect::back();
    }

    public function search()
    {
        $search = Input::get('search');

        $stories = Story::where('title', 'LIKE', "%$search%");
        $paginator = $stories->paginate(15);

        $stories = $stories->get();

        return View::make('stories.index')->with('stories', $stories)->with('paginator', $paginator);
    }

    public function vote()
    {
        $id = Input::get('id');
        
        $story = Story::find($id);
        $story->addPoint();

        $vote = Vote::create(array(
            'user'  => Auth::user()->id, 
            'story' => $story->id 
        ));

        return Redirect::back();
    }

}
