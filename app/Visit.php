<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visits';
    protected $fillable = [
 		'attended',  	
 		'came_us',
 		'contact',
 		'fullname',
 		'notes',
 		'visited_at',
	];
	protected $dates = array('visited_at');
	public $timestamps = true;
}
