<?php 

namespace App\Http\Traits;

use Illuminate\Http\Request;
use App\Member;

trait MemberSearchTrait
{
    public function search(Request $request)
    {
        // return json_encode( $request->ajax() );
        // return response()->json( $request->has('value')  );
        // return response()->json(( Member::all() ));

        if(! $request->has('value') )
            return $request->ajax() ? response()->json([]) : back();

        if( $request->ajax() )
            return $this->searchByAjax($request->get('value'));

        return $this->searchByHttp($request->get('value'));
    }

    private function searchByHttp($value)
    {
        return view('members.search', [
            'members' => $this->querySearch($value), 
            'value' => $value,
        ]);
    }

    private function searchByAjax($value)
    {
        return response()->json( $this->querySearch($value) );
    }

    private function querySearch($value)
    {
        return Member::where('fullname', 'like', "%{$value}%")
                    ->orWhere('homephone', 'like', "%{$value}%")
                    ->orWhere('mobilephone', 'like', "%{$value}%")
                    ->orWhere('email', 'like', "%{$value}%")
                    ->orWhere('emergency', 'like', "%{$value}%")
                    ->get();
    }
} 