<?php

namespace Tests\Feature;

use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{

    /**
     * 基本测试
     *
     */
    public function testBasicTest(): void
    {
        $response = $this->get('/test');

        $response->assertStatus(200);

        $response->assertSeeText('小粽子');

    }


    /**
     * 发送邮件
     *
     */
    public function testRegisterMail(): void
    {
        Mail::fake();

        $to = '15679769443@163.com';
        Mail::to($to)
            ->send(new RegisterMail([1, 2]));

        // 断言一封邮件已经发送给了指定用户...
        Mail::assertSent(RegisterMail::class, function ($mail) use ($to) {
            return $mail->hasTo($to);
        });

        Mail::assertSent(RegisterMail::class, 1);
    }
}
