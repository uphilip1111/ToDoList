<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\Models\TodoLists;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->runDatabaseMigrations();
        $this->seed();
    }

    public function testRegister()
    {
        $response = $this->post('api/auth/register', [
            'name' => '123',
            'email'=> 'aaa@example.net',
            'password' => '123456',
        ]);

        $response->assertStatus(200);
    }

    public function testLogin()
    {
        $response = $this->post('api/auth/login', [
            'email'=> 'abc@example.net',
            'password' => '123456',
        ]);

        $response->assertStatus(200);
    }

    public function testTokenStatus()
    {
        $token = $this->post('api/auth/login', [
            'email'=> 'abc@example.net',
            'password' => '123456',
        ])->getData()->data->access_token;

        $response = $this->get('api/auth/token/status', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }

    public function testToken()
    {
        $token = $this->post('api/auth/login', [
            'email'=> 'abc@example.net',
            'password' => '123456',
        ])->getData()->data->access_token;

        $response = $this->get('api/auth/token', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }

    public function testGetOne()
    {
        $token = $this->post('api/auth/login', [
            'email'=> 'abc@example.net',
            'password' => '123456',
        ])->getData()->data->access_token;

        $response = $this->get('api/todo-list/1', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }

    public function testGetAll()
    {
        $token = $this->post('api/auth/login', [
            'email'=> 'abc@example.net',
            'password' => '123456',
        ])->getData()->data->access_token;

        $response = $this->get('api/todo-lists', [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $token = $this->post('api/auth/login', [
            'email'=> 'abc@example.net',
            'password' => '123456',
        ])->getData()->data->access_token;

        $data = [
            'title'  => 'Breakfast',
            'content' => 'in 08:00',
            'attachment' => 'https://www.youtube.com'
        ];
        $response = $this->post('api/todo-list', $data,
        [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $todoList = TodoLists::first();
        $data = [
            'title' => 'abc',
            'content' => 'def',
            'attachment' => 'ghi',
        ];

        $token = $this->post('api/auth/login', [
            'email'=> 'abc@example.net',
            'password' => '123456',
        ])->getData()->data->access_token;

        $response = $this->patch('api/todo-list/1', $data, [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $todoList->refresh();

        $response->assertStatus(200);
        $this->assertEquals($todoList->title, 'abc');
    }

    public function testDeleteOne()
    {
        $token = $this->post('api/auth/login', [
            'email'=> 'abc@example.net',
            'password' => '123456',
        ])->getData()->data->access_token;

        $response = $this->delete('api/todo-list/1', [],
        [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
        $this->assertEquals(TodoLists::first(), null);
    }

    public function testDeleteAll()
    {
        $token = $this->post('api/auth/login', [
            'email'=> 'abc@example.net',
            'password' => '123456',
        ])->getData()->data->access_token;

        $response = $this->delete('api/todo-lists', [],
        [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200);
        $this->assertEquals(TodoLists::first(), null);
    }
}
