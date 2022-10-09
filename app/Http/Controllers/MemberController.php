<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use App\Member;

class MemberController extends Controller
{
   use \App\Http\Traits\MemberSearchTrait;
   use \App\Http\Traits\MemberFamilyTrait;

   public function index(Request $request)
   {
      $per_page = 20;
      $filters = array('inactivos', 'activos');

      if( $request->has('filter') && in_array($request->filter, $filters) )
      {
         $flag = array_search($request->filter, $filters);
         $members_filtered = Member::orderByDesc('id')->where('is_active', $flag)->simplePaginate($per_page);
         $pagination = paginationInstance($members_filtered, ['filter' => $request->filter]);
      }
      else
      {
         $members_filtered = Member::orderByDesc('id')->simplePaginate($per_page);
         $pagination = paginationInstance($members_filtered);
      }

      return view('members.index', [
         'members_filtered' => $members_filtered,
         'pagination' => $pagination,
      ]);
   }

   public function create()
   {
      return view('members.create', [
         'member' => new Member,
         'marital_status' => config('kontrol.marital_status'),
      ]);
   }

   public function store(MemberRequest $request)
   {
      $request->merge(['fullname' => "{$request->names} {$request->lastnames}"]);

      if(! $member = Member::create( $request->all() ) )
         return back()
                  ->withInput()
                  ->with('error', 'Error al guardar nuevo miembro');
      
      if( $request->hasFile('picture') )
      {
         $picturefile = $member->id.'.'.$request->file('picture')->extension();
         $request->file('picture')->storeAs('', $picturefile, 'pictures');
      }

      return redirect()
               ->route('members.show', $member)
               ->with('success', "Miembro guardado");
   }

   public function show($id)
   {       
      if(! $member = Member::with(['ministries'])->where('id', $id)->first() )
         return redirect()
                  ->route('members.index')
                  ->with('danger', 'No existe miembro');

      $instance_today = new \DateTime();
         
      $birthday = new \DateTime($member->birthday);
      $member->age = $instance_today->diff($birthday)->y;
         
      $registered = new \DateTime($member->registered);
      $member->registered_years = $instance_today->diff( $registered )->y;
  
      list($y, $m, $d) = explode('-', $member->birthday);
      $member->happy_birthday = ("{$m}-{$d}" === date('m-d'));
          
      return view('members.show', [
         'member' => $member,
         'genders' => config('kontrol.genders'),
         'marital_status' => config('kontrol.marital_status'),
         'positions' => config('kontrol.positions'),
         'instance_today' => $instance_today,
      ]);
   }

   public function edit($id)
   {
      return view('members.edit', [
         'member' => Member::findOrFail($id),
         'marital_status' => config('kontrol.marital_status'),
      ]);
   }

   public function update(MemberRequest $request, $id)
   {
      if(! $member = Member::find($id) )
         return back();

      $request->merge(['fullname' => "{$request->names} {$request->lastnames}"]);

      if( $request->hasFile('picture') )
      {
         $picture_file = "{$id}.{$request->file('picture')->extension()}";
         $request->file('picture')->storeAs('', $picture_file, 'pictures');
      }

      $member->fill( $request->all() );

      if( $member->save() )
         return back()->with('success', 'Se actualizo correctamente');

      return back()->with('danger', 'Error al actualizar');
   }

   public function delete($id)
   {
      return view('members.delete', [
         'member' => Member::findOrFail($id),
      ]);
   }

   public function destroy($id)
   {
      $member = Member::findOrFail($id);
      $fullname = $member->fullname;

      if( $member->delete() )
         return redirect()
                  ->route('members.index')
                  ->with('success', "{$fullname} eliminado con exito.");

      return back()->with('error', 'Error al eliminar.');
   }
}

/*
Storage::disk('local')->getDriver()->getAdapter()->applyPathPrefix('myImg.jpg');
Member::destroy(# or [#, #, #]);
Member::where('field', 'value')->delete();
$request->request->add([key => value])
$request->all() + [key => value]
array_add(), array_except()
*/