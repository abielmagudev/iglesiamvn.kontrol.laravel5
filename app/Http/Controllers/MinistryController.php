<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MinistryRequest;
use App\Ministry;
use App\Member;

class MinistryController extends Controller
{
   use \App\Http\Traits\MinistryMembersTrait;

   public function index()
   {
      return view('ministries.index', [
         'ministries' => Ministry::withCount('members')->orderBy('id', 'desc')->get(),
      ]);
   }

   public function create()
   {
      return view('ministries.create')->with('ministry', new Ministry);
   }

   public function store(MinistryRequest $request)
   {
      if( $ministry = Ministry::create( $request->all() ) )
         return redirect()
                  ->route('ministries.show', $ministry)
                  ->with('success', 'Ministerio guardado');

      return back()->with('error', 'Error al guardar nuevo ministerio');
   }

   public function show($id)
   {
      return view('ministries.show', [
         'ministry' => Ministry::with('members')->where('id', $id)->first(),
         'positions' => config('kontrol.positions'),
      ]);
   }

   public function edit($id)
   {
      if( $ministry = Ministry::find($id) )
         return view('ministries.edit')->with('ministry', $ministry);
      
      return redirect()->route('ministries.index');
   }

   public function update(MinistryRequest $request, $id)
   {
      $ministry = Ministry::find($id);
      $ministry->fill( $request->all() );

      $status = $ministry->save() ? 'success' : 'error';
      $text = $status === 'success' ? 'Ministerio actualizado' : 'Error al actualizar ministerio';
      return back()->with($status, $text);
   }

   public function delete($id)
   {
      $ministry = Ministry::findOrFail($id);
      return view('ministries.delete')->with('ministry', $ministry);
   }

   public function destroy($id)
   {
      $ministry = Ministry::findOrFail($id);
      $ministry_name = $ministry->name;

      if( $ministry->delete() )
      {
         return redirect()->route('ministries.index')->with('success', "{$ministry_name} eliminado");
      }

      return back()->with('error', 'Error al eliminar ministerio');
   }
}
