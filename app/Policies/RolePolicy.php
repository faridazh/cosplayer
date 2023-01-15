<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->can('view-any-role');
    }

    public function view(User $user, Role $role)
    {
        return $user->can('view-role');
    }

    public function create(User $user)
    {
        return $user->can('create-role');
    }

    public function update(User $user, Role $role)
    {
        return $user->can('update-role');
    }

    public function delete(User $user, Role $role)
    {
        return $user->can('delete-role');
    }

    public function restore(User $user, Role $role)
    {
        return $user->can('restore-role');
    }

    public function forceDelete(User $user, Role $role)
    {
        return $user->can('force-delete-role');
    }
}
