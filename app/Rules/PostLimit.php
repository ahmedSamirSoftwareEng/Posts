<?php

namespace App\Rules;

use App\Models\Post;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class PostLimit implements Rule
{
    /**
     * The maximum number of posts allowed.
     *
     * @var int
     */
    protected $limit = 3;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Ensure the user is authenticated
        $user = Auth::user();

        if ($user) {
            // Count the number of posts the user has created
            $postCount = Post::where('user_id', $user->id)->count();

            // Return true if the count is less than the limit
            return $postCount < $this->limit;
        }

        // If no user is authenticated, validation fails
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You can only create up to 3 posts.';
    }
}
