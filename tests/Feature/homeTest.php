<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{

    public function test_example(): void
    {
        $response = $this->get('/');
        $response
        ->assertSeeText('Log in')
        ->assertStatus(200);
    }

    public function test_login(): void
    {
        $response = $this->get('/login');
        $response
        ->assertSeeText('Email')
        ->assertSeeText('Password')
        ->assertSeeText('Lupa Password')
        ->assertSeeText('Buat Akun')
        ->assertDontSeeText('salah')
        ->assertStatus(200);
    }

 



    public function test_login_salah(): void
    {
        $response = $this->get('/orak ono');
        $response
        ->assertStatus(404);
    }



    public function test_register(): void
    {
        $response = $this->get('/register');
        $response
        ->assertSeeText('Email')
        ->assertSeeText('Password')
        ->assertStatus(200);
    }

    public function test_admin(): void
    {
        
        $response = $this->get('/admin');
        $response->assertRedirect('/login')
        // ->assertStatus(200)
        ;
    }



}
