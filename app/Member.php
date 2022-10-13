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

   public function getEstadoCivilAttribute()
   {
      if( is_null($this->marital_status) )
         return 'desconocido';

      $marital_status = self::$all_marital_status[ $this->marital_status ]; 

      return $marital_status[ $this->gender ];
   }

   public function getDiaNacimientoAttribute()
   {
      return $this->date_birth->day;
   }

   public function getMesNacimientoAttribute()
   {
      return $this->date_birth->month;
   }

   public function getAnioNacimientoAttribute()
   {
      return $this->date_birth->year;
   }

   public function codigoDiaMesNacimiento()
   {
      return $this->dia_nacimiento . $this->mes_nacimiento;
   }

   public function isMale()
   {
      return $this->gender == 'm';
   }

   public function isFemale()
   {
      return $this->gender == 'f';
   }

   public function isHappyBirthday()
   {
      return $this->codigoDiaMesNacimiento() == Calendario::codigoDiaMes();
   }


   // Mutators

   public function _setNameAttribute($value)
   {
      return ucwords( strtolower($value) );
   }

   public function _setLastnameAttribute($value)
   {
      return ucwords( strtolower($value) );
   }


   // Scopes

   public static function selectWithBirthday()
   {
      return self::select([
			'*',
			DB::raw('DATE_FORMAT(date_birth, "%d-%m-%Y") AS birthday')
		]);
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
