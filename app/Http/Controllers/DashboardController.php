<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Ministry;
use App\Visit;

class DashboardController extends Controller
{
	public function index ()
	{
		$members = Member::all();
		$birthdays = collect([]);
		$today = new \DateTime;

		// Filter all birthdays of month current
		foreach($members as $member)
		{
			$instace_birthday = new \DateTime( $member->birthday );
			if( $instace_birthday->format('n') <> $today->format('n') ) 
				continue;

			$member->birth_day = $instace_birthday->format('d');
			$member->birth_year = $instace_birthday->format('y');
			$birthdays->push($member);
		}

		return view('dashboard.index', [
			'months'    => config('kontrol.months'),
			'members'   => $members,
			'birthdays' => $birthdays->sortBy('birth_day'),
			'today'		=> $today,
			'visits'    => Visit::all(),
		]);
	}
}
