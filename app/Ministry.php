<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
   protected $table = 'ministries';
   public $timestamps = true;
   protected $fillable = [
      'name',
      'description'
   ];
   
   public function members()
   {
      return $this->belongsToMany(Member::class)
         ->withPivot('id', 'position', 'description')
         ->orderBy('pivot_id', 'desc')
         ->withTimestamps();
   }

   public function member($pivot_id)
   {
      return $this->members()->wherePivot('id', $pivot_id); 
   }
}
