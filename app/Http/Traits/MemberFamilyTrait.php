<?php 

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Member;

trait MemberFamilyTrait
{
    public function add($id)
    {
       return view('members.family.add', [
           'member' => Member::find($id),
           'relationships' => config('kontrol.relationships'),
       ]);
    }
 
    public function attach(Request $request, $id)
    {
        $member = Member::findOrFail($id);
        $family = Member::where('fullname', $request->member_fullname)->first();
        if($member && $family)
        {
            $relationships = [
                'member_relationship' => $request->member_relationship,
                'family_relationship' => $request->family_relationship
            ];

            if( is_null( $member->hisFamily()->attach($family->id, $relationships) ) )
                return redirect()
                        ->route('members.show', $member->id)
                        ->with('success', 'Familiar guardada');
        }
        return back()->with('error', 'Familiar no encontrado');
    }
 
    public function remove($id, $pivot_id)
    {
        $member = Member::findOrFail($id);
        $member->family = $member->hisFamily()->wherePivot('id', $pivot_id)->first() 
                        ?: $member->hasFamily()->wherePivot('id', $pivot_id)->first();

        if( $member->family )
            return view('members.family.remove')->with('member', $member);

        return redirect()
                ->route('members.show', $id)
                ->with('error', 'Familiar no encontrada');
    }
 
    public function detach($id, $pivot_id)
    {
        $member = Member::findOrFail($id);
        if( !$result = $member->hisFamily()->wherePivot('id', $pivot_id)->detach() )
            $result = $member->hasFamily()->wherePivot('id', $pivot_id)->detach();

        if( $result )
            return redirect()
                    ->route('members.show', $member)
                    ->with('success', 'Familiar eliminado');

        return redirect()
                ->route('members.show', $member->id)
                ->with('error', 'Error al eliminar familiar');
    } 
}