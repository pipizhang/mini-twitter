<?php

class Post extends \Eloquent {

	protected $table = 'posts';
	protected $fillable = ['user_id', 'body'];

	public function user() {
		return $this->belongsTo('User');
	}

}