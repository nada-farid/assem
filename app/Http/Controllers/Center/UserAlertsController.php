<?php

namespace App\Http\Controllers\Center;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserAlertRequest;
use App\Http\Requests\StoreUserAlertRequest;
use App\Models\User;
use App\Models\UserAlert;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UserAlertsController extends Controller
{

  
    public function read(Request $request)
    {
        $alerts = \Auth::user()->userUserAlerts()->where('read', false)->get();
        foreach ($alerts as $alert) {
            $pivot = $alert->pivot;
            $pivot->read = true;
            $pivot->save();
        }


    }

    public function readAlert(UserAlert $alert)
    {
        $user = auth()->user();
        $user->userUserAlerts()->updateExistingPivot($alert->id, ['read' => 1]);


        return redirect($alert->alert_link ?? url('/'));
    }

}
