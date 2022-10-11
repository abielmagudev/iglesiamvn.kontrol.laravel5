<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Member extends Model
{
   public static $all_marital_status = [
      'singular' => [
         'f' => 'soltera',
         'm' => 'soltero',
      ],
      'matrimonio' => [
         'f' => 'casada',
         'm' => 'casado',
      ],
      'separacion' => [
         'f' => 'separada',
         'm' => 'separado',
      ],
      'divorcio' => [
         'f' => 'divorciada',
         'm' => 'divorciado',
      ],
      'viudez' => [
         'f' => 'viuda',
         'm' => 'viudo',
      ],
      'union libre' => [
         'f' => 'unida',
         'm' => 'unido',
      ],
   ];

   protected $table = 'members';

   // public $timestamps = true;
   
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
      'lastname', 
      'marital_status',
      'mobilephone',
      'name', 
      'occupations',
      'postcode',
      'professions',
      'registered_at',
      'is_active',
   ];

   protected $dates = [
      'birthday',
      'registered_at'
   ];
   
   public static function allMaritalStatus()
   {
      return array_keys( self::$all_marital_status );
   }

   public function getEstadoCivilAttribute()
   {
      if( is_null($this->marital_status) )
         return 'desconocido';

      $marital_status = self::$all_marital_status[ $this->marital_status ]; 

      return $marital_status[ $this->gender ];
   }

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
