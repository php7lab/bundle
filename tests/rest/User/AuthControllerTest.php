<?php

namespace PhpLab\Bundle\Tests\rest\User;

use PhpLab\Core\Enums\Http\HttpStatusCodeEnum;
use PhpLab\Test\Base\BaseRestTest;
use PhpLab\Test\Helpers\RestHelper;

class AuthControllerTest extends BaseRestTest
{

    protected $basePath = 'api/v1/';

    public function testAuthBadPassword()
    {
        $response = $this->sendPost('auth', [
            'login' => 'user1',
            'password' => 'Wwwqqq11133333',
        ]);

        $expectedBody = [
            [
                'field' => 'password',
                'message' => 'Bad password',
            ]
        ];
        $this->assertBody($response, $expectedBody);
        $this->assertEquals(HttpStatusCodeEnum::UNPROCESSABLE_ENTITY, $response->getStatusCode());
    }

    public function testAuthNotFoundLogin()
    {
        $response = $this->sendPost('auth', [
            'login' => 'qwerty',
            'password' => 'Wwwqqq111',
        ]);

        $expectedBody = [
            [
                'field' => 'login',
                'message' => 'User not found',
            ]
        ];
        $this->assertBody($response, $expectedBody);
        $this->assertEquals(HttpStatusCodeEnum::UNPROCESSABLE_ENTITY, $response->getStatusCode());
    }

    public function testAuth()
    {
        $response = $this->sendPost('auth', [
            'login' => 'user1',
            'password' => 'Wwwqqq111',
        ]);

        $expectedBody = [
            'id' => 1,
            'username' => 'user1',
            'username_canonical' => 'user1',
            'email' => 'user1@example.com',
            'email_canonical' => 'user1@example.com',
            'roles' => [
                'ROLE_USER',
                'ROLE_ADMIN',
            ],
        ];
        $this->assertBody($response, $expectedBody);
        $body = RestHelper::getBody($response);
        $this->assertNotEmpty(preg_match('#jwt\s[\s\S]+\.[\s\S]+\.[\s\S]+#i', $body['api_token']));
        $this->getRestAssert($response)
            ->assertStatusCode( HttpStatusCodeEnum::OK);
        $this->assertFalse(isset($body['password']));
    }

}
