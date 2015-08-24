<?php
namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;
use App\Flyer;

trait AuthorizesUsers {

    /**
     * @param Request $request
     * @return mixed
     */
    protected function userCreatedFlyer(Request $request)
    {
        return Flyer::where([
            'zip' => $request->zip,
            'street' => $request->street,
            'user_id' => \Auth::id()
        ])->exists();
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    protected function unAuthorized(Request $request)
    {
        if ($request->ajax()) {
            return response(['message' => 'no way.'], 403);
        }

        flash('no way');

        return redirect('/');
    }
} 