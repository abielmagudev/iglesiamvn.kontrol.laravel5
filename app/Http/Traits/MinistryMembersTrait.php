<?php 

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Http\Requests\MinistryMemberRequest;
use App\Ministry;
use App\Member;

trait MinistryMembersTrait
{
    public function add($id)
    {
        return view('ministries.members.add', [
            'ministry' => Ministry::findOrFail($id),
            'member' => new Member,
            'positions' => config('kontrol.positions')            
        ]);
    }

    public function attach(MinistryMemberRequest $request, $id)
    {
        if(! $member = Member::where('fullname', $request->member_fullname)->first() )
            return back()->with('error', 'Miembro no encontrado');

        $ministry = Ministry::find($id);
        $ministry->members()->attach($member->id, [
            'position' => $request->position,
            'description' => $request->description           
        ]);

        return redirect()
                ->route('ministries.show', $ministry)
                ->with('success', "{$member->fullname} se agrego al ministerio");
    }

    public function change($id, $pivot_id)
    {
        if(! $ministry = Ministry::find($id) )
            return redirect()->route('ministries.index');

        return view('ministries.members.change', [
            'ministry' => $ministry,
            'member' => $ministry->member($pivot_id)->first(),
            'positions' => config('kontrol.positions'),
        ]);
    }

    public function retach(MinistryMemberRequest $request, $id, $pivot_id)
    {
        $attributes = array();
        if( $request->current_member_fullname !== $request->member_fullname )
        {
            if( ! $member = Member::where('fullname', $request->member_fullname)->first() )
                return back()->with('error', 'Miembro no encontrado');
            
            $attributes['member_id'] = $member->id;
        }

        $attributes['position'] = $request->position;
        $attributes['description'] = $request->description;

        $ministry = Ministry::findOrFail($id);

        if(! $ministry->member($pivot_id)->updateExistingPivot( $request->current_member_id, $attributes ) ) 
            return back()->with('error', 'Error al actualizar miembro del ministerio');

        return back()->with('success', 'Miembro del ministerio actualizado');

        /*
        $result = $ministry
                ->members()
                ->wherePivot('id', $pivot_id)
                ->update($attributes);

        $result = $ministry
                ->members()
                ->pivot
                ->where('id', $pivot_id)
                ->update($attributes);
        */

        /*
        User::find(1)
            ->roles()
            ->pivot
            ->description = 'New description'; 

        User::find(1)
            ->roles()
            ->pivot
            ->save();

        User::find(1)
            ->roles()
            ->updateExistingPivot($roleId, $attributes);

        function updateUserPivot($user_id, $expires) 
        { 
            return DB::table('user_role')
                    ->where('role_id', $this->id)
                    ->where('user_id', $user->id)
                    ->update(array('expires' => $expires));
        }
        */
    }

    public function remove($id, $pivot_id)
    {
        $ministry = Ministry::findOrFail($id);
        return view('ministries.members.remove', [
            'ministry' => $ministry,
            'member' => $ministry->member($pivot_id)->first(),
        ]);
    }

    public function detach(Request $request, $id, $pivot_id)
    {
        $ministry = Ministry::findOrFail($id);
        if(! $ministry->members()->wherePivot('id', $pivot_id)->detach() )
            return back()->with('error', 'Error al eliminar miembro del ministerio');

        return redirect()->route('ministries.show', $ministry->id)->with('success', "{$request->member_fullname} se elimino del ministerio");
    }
}