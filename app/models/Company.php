<?php

class Company extends \Eloquent {
	protected $fillable = ['symbol','name'];
	public $timestamps = false;
	public function users()
    {
        return $this->belongsToMany('User');
    }
}