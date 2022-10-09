<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Member extends Model
{
   protected $table = 'members';
   public $timestamps = true;
   protected $fillable = [
      'address',
      'birthday',
      'citizenship',
      'city',
      'country',
      'email',
      'emergency',
      'fullname', 
      'gender',
      'homephone',
      'is_active',
      'lastnames', 
      'marital_status',
      'mobilephone',
      'names', 
      'occupations',
      'postcode',
      'professions',
      'registered',
      'state',
   ];

   protected $dates = ['birthday','registered'];
   
   public function hisFamily()
   {
      return $this->belongsToMany(Member::class, 'member_family', 'member_id', 'family_id')
         ->withPivot('id', 'member_relationship', 'family_relationship')
         ->withTimestamps();
   }
   
   public function hasFamily()
   {
      return $this->belongsToMany(Member::class, 'member_family', 'family_id', 'member_id')
         ->withPivot('id', 'member_relationship', 'family_relationship')
         ->withTimestamps();
   }
   
   public function family()
   {
      return $this->hisFamily->merge($this->hasFamily);
   }
   
   public function ministries()
   {
      return $this->belongsToMany(Ministry::class)->withPivot('id', 'position', 'description');
   }

   public function _setFirstnamesAttribute($value)
   {
      return ucwords( strtolower($value) );
   }

   public function _setLastnamesAttribute($value)
   {
      return ucwords( strtolower($value) );
   }

   public function getPictureSrc()
   {
      $picture_path = '/pictures/';
                                        // Storage::disk('public') with link-symbolic
      if( !is_null($this->picture_file) && Storage::disk('pictures')->exists($this->picture_file) )
      {
         return $picture_path.$this->picture_file;
      }

      return $this->gender === 'm' ? $picture_path.'male.jpg' : $picture_path.'female.jpg';
   }
}
