<?php

class Comment extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'comments';

	/**
	 * Timestamp fields are used by the model.
	 * @var boolean
	 */
    public $timestamps = true;

    /**
     * Soft delete timestamps are used by the model.
     * @var boolean
     */
    protected $softDelete = true;

	protected $guarded = [];

	public static $rules = [];

	/**
	 * The Story object that the Comment belongs to
	 * @return array
	 */
	public function story()
	{
		return $this->belongsTo('Story');
	}

	public function getCommentLife()
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

}
