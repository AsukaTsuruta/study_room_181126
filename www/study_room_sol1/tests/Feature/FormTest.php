<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Form;

class FormTest extends TestCase
{

    //use RefreshDatabase;

    public function testForm()
    {
        //新規作成画面を表示
        $response = $this->get('/form/create');
        $response->assertStatus(200);
        
        //識別用の番号を生成
        $num = rand(1,1000);

        //名前とメールアドレスをpost
        $response = $this->post('/form/save', [
            'name' => 'テスト' . $num,
            'mail' => $num . 'test@test.jp'
        ]);

        //データベースに保存されているか確認
        $this->assertDatabaseHas('forms', [
            'name' => 'テスト' . $num,
            'mail' => $num . 'test@test.jp'
        ]);
    }
}
