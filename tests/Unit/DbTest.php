<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DbTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 测试数据库中某个数据
     *
     */
    public function testHasUser()
    {
        $this->assertDatabaseHas(
            'users',
            [
                'email' => '862275679@qq.com'
            ]
        );
    }

}
