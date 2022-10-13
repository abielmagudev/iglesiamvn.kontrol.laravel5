<?php

namespace App\Http\Controllers;

use App\Member;
use App\Visit;
use App\Ahex\Tools\Calendario;

class DashboardController extends Controller
{
	public function index()
	{
		$mes = Calendario::instanciaMes();

		$members = Member::sortByBirthday()->get();

		$happy_birthdays = $members->filter(function ($member) use ($mes) {
			return $member->month_birth == $mes->clave;
		});

		return view('dashboard.index', [
			'happy_birthdays' => $happy_birthdays,
			'members' => $members,
			'mes' => $mes,
			'visits' => Visit::all(),
		]);
	}
}
