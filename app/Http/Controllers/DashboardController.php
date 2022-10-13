<?php

namespace App\Http\Controllers;

use App\Member;
use App\Visit;
use App\Ahex\Tool\Calendario;

class DashboardController extends Controller
{
	public function index()
	{
		$month = (object) [
			'key' => Calendario::mesActual(),
			'name' => Calendario::mesActual(true),
		];

		$members = Member::selectWithFormattedBirthday()->get();

		$happy_birthdays = $members->filter(function ($member) use ($month) {
			return $member->mes_nacimiento == $month->key;
		});

		return view('dashboard.index', [
			'happy_birthdays' => $happy_birthdays->sortBy('formatted_birthday'),
			'members' => $members,
			'month' => $month,
			'visits' => Visit::all(),
		]);
	}
}
