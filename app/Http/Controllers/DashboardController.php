<?php

namespace App\Http\Controllers;

use App\Member;
use App\Visit;
use App\Ahex\Tool\Calendario;

class DashboardController extends Controller
{
	public function index()
	{
		$mes = Calendario::instanciaMes();

		$members = Member::selectWithBirthday()->get();

		$happy_birthdays = $members->filter(function ($member) use ($mes) {
			return $member->mes_nacimiento == $mes->clave;
		});

		return view('dashboard.index', [
			'happy_birthdays' => $happy_birthdays->sortBy('birthday'),
			'members' => $members,
			'mes' => $mes,
			'visits' => Visit::all(),
		]);
	}
}
