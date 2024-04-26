<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\Rule; // Update the import statement
use App\Models\User; // Import the User model

class UniquePhoneExceptSelf implements Rule // Implement the Rule interface
{
    protected $userId;

    public function __construct($userId)
    {
        $this->userId = $userId;
    }

    public function passes($attribute, $value)
    {
        // Retrieve the user by ID
        $user = User::find($this->userId);

        // If the user is not found, phone number is unique
        if (!$user) {
            return true;
        }

        // Check if the phone number is unique among other users excluding the current user
        return User::where('phone', $value)
                    ->where('id', '!=', $this->userId)
                    ->doesntExist();
    }

    public function message()
    {
        return 'The phone has already been taken.';
    }
}
