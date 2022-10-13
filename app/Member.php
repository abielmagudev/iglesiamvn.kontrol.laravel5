<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Ahex\Tool\Calendario;
use DB;

class Member extends Model
{
   protected $table = 'members';

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
      return $this->birthday->day;
   }

   public function getMesNacimientoAttribute()
   {
      return $this->birthday->month;
   }

   public function getAnioNacimientoAttribute()
   {
      return $this->birthday->year;
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
      return $this->codigoDiaMesNacimiento() == Calendario::codigoDiaMesActual();
   }


   // Mutators

   public function setNameAttribute($value)
   {
      return ucwords( strtolower($value) );
   }

   public function setLastnameAttribute($value)
   {
      return ucwords( strtolower($value) );
   }


   // Scopes

   public static function selectWithFormattedBirthday()
   {
      return self::select([
			'*',
			DB::raw('DATE_FORMAT(birthday, "%d-%m-%Y") AS formatted_birthday')
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

   public static function allMaritalStatus()
   {
      return array_keys( self::$all_marital_status );
   }
}
