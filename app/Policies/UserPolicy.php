<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy {
    /**
     * Create a new policy instance.
     */
    public function delete(User $user): bool {
        return $user->email === 'florence52@example.com';
    }
}
