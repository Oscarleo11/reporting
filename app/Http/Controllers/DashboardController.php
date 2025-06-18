<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\OperationStra;
use App\Models\FraudeStra;
use App\Models\IncidentStra;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'usersCount'      => User::count(),
            'operationsCount' => OperationStra::count(),
            'fraudesCount'    => FraudeStra::count(),
            'incidentsCount'  => IncidentStra::count(),
        ]);
    }
}
