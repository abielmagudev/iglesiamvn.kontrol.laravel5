<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Ahex\Tool\Calendario;
use DB;

class Member extends Model
{
   protected $table = 'members';

   public static $all_genders = [
      'f' => 'female',
      'm' => 'male',
   ];

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
   
   protected $fillable = [
      // Personal
      'name', 
      'lastname', 
      'fullname', 
      'gender',
      'date_birth',
      'place_birth',

      // Contact
      'address',
      'postcode',
      'city',
      'state',
      'country',
      'email',
      'mobilephone',
      'homephone',
      'emergency',
      
      // Additional
      'marital_status',
      'professions',
      'occupations',
      'notes',
      'registered_at',
      'is_active',
   ];

   protected $dates = [
      'date_birth',
      'registered_at'
   ];


   // Accesors (Attributes)

   public function getYearBirthAttribute()
   {
      return $this->date_birth->year;
   }

   public function getMonthBirthAttribute()
   {
      return $this->date_birth->month;
   }

   public function getDayBirthAttribute()
   {
      return $this->date_birth->day;
   }

   public function codeDayMonthBirth()
   {
      return $this->day_birth . $this->month_birth;
   }

   public function isHappyBirthday()
   {
      return $this->codeDayMonthBirth() == Calendario::codigoDiaMes();
   }

   public function getMarialStatusHimselfAttribute()
   {
      if( is_null($this->marital_status) )
         return 'desconocido';

      $marital_status = self::$all_marital_status[ $this->marital_status ]; 

      return $marital_status[ $this->gender ];
   }

   public function isMale()
   {
      return $this->gender == 'm';
   }

   public function isFemale()
   {
      return $this->gender == 'f';
   }


   // Scopes

   public static function sortByBirthday()
   {
      $alias = 'first_day_birth';

      return self::select(['*', DB::raw("DATE_FORMAT(date_birth, '%d-%m-%Y') AS {$alias}")])
                  ->orderBy($alias);
   }


   // Relationships

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


   // Statics

   public static function genderKeys()
   {
      return array_keys( self::$all_genders );
   }

   public static function maritalStatusKeys()
   {
      return array_keys( self::$all_marital_status );
   }
}
