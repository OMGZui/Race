<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{

    /**
     * 最简单测试
     *
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /**
     * 栈测试
     *
     */
    public function testPushAndPop()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));
        array_push($stack, 'name');

        $this->assertEquals('name', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('name', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }

    public function testProducerFirst()
    {
        $this->assertTrue(true);
        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);
        return 'second';
    }

    /**
     * 测试依赖
     *
     * @depends testProducerFirst
     * @depends testProducerSecond
     */
    public function testConsumer()
    {
        $this->assertEquals(
            ['first', 'second'],
            func_get_args()
        );
        $this->assertEquals(
            2,
            func_num_args()
        );
        $this->assertEquals(
            'first',
            func_get_arg(0)
        );
    }

    /**
     * 测试输出
     *
     */
    public function testExpectFooActualFoo()
    {
        $this->expectOutputString('foo');
        print 'foo';
    }


}
