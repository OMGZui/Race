<?php
/**
 * Created by PhpStorm.
 * User: shengj
 * Date: 2017/12/28
 * Time: 15:50
 */

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    /**
     * 测试登录
     *
     */
    public function testLogin()
    {

        $this->postJson('/api/auth/login', [
            'email' => $this->user->email,
            'password' => 'secret',
        ])
            ->assertSuccessful()
            ->assertJsonStructure(['access_token', 'token_type', 'expires_in'])
            ->assertJson(['token_type' => 'bearer']);
    }

    /**
     * 测试登录用户
     *
     */
    public function testMe()
    {
        $this->actingAs($this->user)
            ->postJson('/api/auth/me')
            ->assertSuccessful()
            ->assertJsonStructure(['id', 'email']);
    }

    /**
     * 测试登出
     *
     */
    public function testLogout()
    {
        $token = $this->postJson('/api/auth/login', [
            'email' => $this->user->email,
            'password' => 'secret',
        ])->json()['access_token'];
        $this->postJson("/api/auth/logout?token=$token")
            ->assertSuccessful();
        $this->postJson("/api/auth/me?token=$token")
            ->assertStatus(401);
    }
}