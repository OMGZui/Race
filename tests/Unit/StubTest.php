<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StubTest extends TestCase
{

    /**
     * 测试桩件
     *
     */
    public function testStub()
    {
        $stub = $this->createMock(Stub::class);

        $stub->method('doSomethings')
            ->willReturn('foo');

        $this->assertEquals(
            'foo',
            $stub->doSomethings()
        );
    }

    public function testStub2()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->getMockBuilder(Stub::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();

        // Configure the stub.
        $stub->method('doSomethings')
            ->willReturn('foo');

        // Calling $stub->doSomething() will now return
        // 'foo'.
        $this->assertEquals('foo', $stub->doSomethings());
    }

    public function testReturnArgumentStub()
    {
        // Create a stub for the SomeClass class.
        $stub = $this->createMock(Stub::class);

        // Configure the stub.
        $stub->method('doSomethings')
            ->will($this->returnArgument(0));

        // $stub->doSomething('foo') returns 'foo'
        $this->assertEquals('foo', $stub->doSomethings('foo'));

        // $stub->doSomething('bar') returns 'bar'
        $this->assertEquals('bar', $stub->doSomethings('bar'));
    }
}
