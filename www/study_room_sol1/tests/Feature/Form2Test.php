<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Form;

class Form2Test extends TestCase
{

    //use RefreshDatabase;

    public function testForm()
    {
        //新規作成画面を表示
        $response = $this->get('/form/create');
        $response->assertStatus(200);
        
        //フォームでpostする項目をfactoryで生成
        $form = factory(Form::class)->make();

        //factoryで生成した項目をpost
        $response = $this->post('/form/save', [
            'name' => $form->name,
            'mail' => $form->mail
        ]);

        //一覧画面に表示されているか確認
        $response = $this->get('/form');
        $response->assertSee($form->name);

        //データベースに保存されているか確認
        $this->assertDatabaseHas('forms', [
            'name' => $form->name,
            'mail' => $form->mail
        ]);
    }
}
