<?php

class Story extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'stories';

	/**
	 * Timestamp fields are used by the model.
	 * 
	 * @var boolean
	 */
    public $timestamps = true;

    /**
     * Soft delete timestamps are used by the model
     * 
     * @var boolean
     */
    protected $softDelete = true;

	protected $guarded = [];

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function comments()
	{
		return $this->hasMany('Comment');
	}

	public function getFuzzedPoints()
	{

	}

	/**
	 * The number count of comments for the story
	 * 	
	 * @return integer
	 */
	public function getCommentCount()
	{
		return Comment::whereStory($this->id)->count();
	}

	/**
	 * The calculated lifespan of the story
	 * 
	 * @return string
	 */
	public function getStoryLife()
	{
		$seconds = abs(strtotime($this->created_at)-strtotime(date("Y-m-d H:i:s"))); 
		
		switch (true)
		{
			case $seconds == 1:
				return '1 second ago';
			case $seconds < 59:
				return round($seconds) . ' seconds ago';
			case $seconds == 60:
				return '1 minute ago';
			case $seconds < 3599:
				return round($seconds / 60) . ' minutes ago'; 
			case $seconds == 3600:
				return '1 hour ago';
			case $seconds <= 86399:
				return round($seconds / 60 / 60) . ' hours ago'; 
			case $seconds == 86400:
				return '1 day ago';
			case $seconds > 86399:
				return round($seconds / 60 / 60 / 24) . ' days ago';
		}
	}

	public function calculateScore($gravity=1.8)
	{
		$age = abs(strtotime($this->created_at)-strtotime(date("Y-m-d H:i:s"))) / 60 / 60; 

    	return ($this->points - 1) / pow(($age+2), $gravity);
	}

	public function getScore()
    {
        return $this->calculateScore();
    }

    public function addPoint()
    {
    	$this->points += 1;
    	$this->save();
    }

    public function hasVoted()
    {
    	return DB::table('votes')->where('story', $this->id)->where('user', Auth::user()->id)->first();
    }

    public function displayURL()
    {

    	$display = parse_url($this->url);

    	return $display['host'];
    }
}
