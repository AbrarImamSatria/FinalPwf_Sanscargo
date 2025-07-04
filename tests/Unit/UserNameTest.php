<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UserNameTest extends TestCase
{
    public function test_user_name_can_be_set()
    {
        $user = new User();
        $user->name = 'Abrar';

        $this->assertEquals('Abrar', $user->name);
    }
}
