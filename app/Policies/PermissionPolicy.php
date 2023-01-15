<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;

class PermissionPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('view-any-permission');
    }

    public function view(User $user, Permission $permission)
    {
        return $user->can('view-permission');
    }

    public function create(User $user) { return false; }

    public function update(User $user, Permission $permission) { return $user->can('view-permission'); }

    public function delete(User $user, Permission $permission) { return false; }

    public function restore(User $user, Permission $permission) { return false; }

    public function forceDelete(User $user, Permission $permission) { return false; }
}
