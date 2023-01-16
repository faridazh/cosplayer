<?php

namespace App\Policies;

use Spatie\Activitylog\Models\Activity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ActivityPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('view-any-activity-log');
    }

    public function view(User $user, Activity $activity)
    {
        return $user->can('view-activity-log');
    }
}
