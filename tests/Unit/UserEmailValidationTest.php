<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class UserEmailValidationTest extends TestCase
{
    public function test_email_is_required()
    {
        $data = ['email' => ''];
        $rules = ['email' => 'required'];

        $validator = Validator::make($data, $rules);

        $this->assertTrue($validator->fails());
    }
}
