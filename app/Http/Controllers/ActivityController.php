<?php

namespace App\Http\Controllers;

use App\Actions\Activity\CreateNewActivity;
use App\Actions\Activity\DeleteActivity;
use App\Actions\Activity\UpdateActivity;
use App\Http\Requests\Activity\CreateActivityRequest;
use App\Http\Requests\Activity\DeleteActivityRequest;
use App\Http\Requests\Activity\ShowActivityRequest;
use App\Http\Requests\Activity\UpdateActivityRequest;
use App\Models\Activity;

class ActivityController
{
    public function index()
    {
        return view('activity.index', [
            'activities' => \App\Models\Activity::UsersActivities(),
            'totalHours' => \App\Models\Activity::UserTotalHours()
        ]);
    }

    public function show(ShowActivityRequest $request, Activity $activity)
    {
        return view('activity.show', [
            'activity' => $activity
        ]);
    }

    public function create()
    {
        return view('activity.create');
    }

    public function store(CreateActivityRequest $request, CreateNewActivity $action)
    {
        $action->handle($request->validated());

        return redirect()->route('activity.index');
    }

    public function edit(Activity $activity)
    {
        return view('activity.edit', [
            'activity' => $activity
        ]);
    }

    public function update(UpdateActivityRequest $request, UpdateActivity $action, Activity $activity)
    {
        $action->handle($activity, $request->validated());

        return redirect()->route('activity.index');
    }

    public function destroy(DeleteActivityRequest $request, Activity $activity, DeleteActivity $action)
    {
        $action->handle($activity);

        return redirect()->route('activity.index');
    }
}
