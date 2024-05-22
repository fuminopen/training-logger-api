<?php

namespace Tests\Feature\BodyPart;

use Tests\TestCase;
use App\Models\BodyPart;
use Illuminate\Foundation\Testing\RefreshDatabase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function testCanListBodyParts()
    {
        // テストデータを作成
        BodyPart::factory()->count(5)->create();

        // indexメソッドに対してGETリクエストを送る
        $response = $this->getJson(route('body_parts.index'));

        // レスポンスのステータスコードが200であることを確認
        $response->assertOk();

        // レスポンスのJSON構造が期待通りであることを確認
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);

        // レスポンスのデータが正しい数であることを確認
        $this->assertCount(5, $response->json('data'));
    }
}
