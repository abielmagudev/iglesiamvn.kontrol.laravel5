<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visit;

class VisitController extends Controller
{
    public function index(Request $request)
    {
        $per_page = 20;
        $filters = array('not-attended', 'attended');

        if( $request->has('filter') && in_array($request->filter, $filters) )
        {
            $flag = array_search($request->filter, $filters);
            $visits_filtered = Visit::orderBy('id', 'desc')->where('attended', $flag)->simplePaginate($per_page);
            $pagination = getPaginationInstance($visits_filtered, ['filter' => $request->filter]);
        }
        else
        {
            $visits_filtered = Visit::orderBy('id', 'desc')->simplePaginate($per_page);
            $pagination = paginationInstance($visits_filtered);
        }

        return view('visits.index', [
            'filter' => request('filter', 'all'),
            'pagination' => $pagination,
            'visits' => Visit::all(),
            'visits_filtered' => $visits_filtered,
        ]);
    }

    public function create()
    {
        return view('visits.create')->with('visit', new Visit);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'came_us' => 'required',
            'contact' => 'required',
            'visited_at' => 'required',
        ]);
        
        if(! $request->has('attended') )
            $request->merge(['attended' => 0]);

        if(! $visit = Visit::create( $request->all() ) )
            return back()->with('error', 'Error al guardar visita');
        
        return redirect()
                ->route('visits.index')
                ->with('success', "Visita {$visit->fullname} guardada");
    }

    public function show($id)
    {
        return redirect()->route('visits.edit', $id);
    }

    public function edit($id)
    {
        $visit = Visit::findOrFail($id);
        return view('visits.edit')->with('visit', $visit);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'fullname' => 'required',
            'came_us' => 'required',
            'contact' => 'required',
            'visited_at' => 'required',
        ]);

        $visit = Visit::findOrFail($id);
        $visit->fill([
            'fullname' => $request->fullname,
            'came_us' => $request->came_us,
            'contact' => $request->contact,
            'notes' => $request->notes,
            'visited_at' => $request->visited_at,
            'attended' => $request->has('attended') ? 1 : 0,
        ]);

        if( $visit->save() )
            return redirect()->route('visits.edit', $visit)->with('success', 'Visita actualizada');

        return back()->with('error', 'Error al actualiza visita');
    }

    public function delete($id)
    {
        $visit = Visit::findOrFail($id);
        return view('visits.delete')->with('visit', $visit);
    }

    public function destroy(Request $request, $id)
    {
        if(! Visit::destroy($id) )
            return back()->with('error', 'Error al eliminar visita');
        
        return redirect()
                ->route('visits.index')
                ->with('success', "Visita {$request->fullname} eliminada");
    }
}
