<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function Login(string $email, string $password)
    {
        return $this->from('/login')
            ->post('/login', [
                'email'    => $email,
                'password' => $password,
            ]);
    }

    public function test_login_benar()
    {


        $response = $this->Login('admin1234@dmin.com', 'admin1234');


        $response->assertRedirect('/admin');
        $this->followRedirects($response)->assertSeeText('Logout');

    }
    public function test_login_admin_salah_email()
    {
        $response = $this->Login('admin1234salah@dmin.com', 'admin1234');

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->followRedirects($response)->assertSeeText('Invalid Credetials');


        $this->assertGuest();
    }

    public function test_login_admin_salah_password()
    {

        $response = $this->Login('admin1234@dmin.com', 'admin1234salah');

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->followRedirects($response)->assertSeeText('Invalid Credetials');
        $this->assertGuest();
    }

    public function test_login_manager()
    {
        $response = $this->Login('manager123@gmail.com', 'manager123');
        $response->assertRedirect('/manager');
    }

    public function test_login_manager_salah_email()
    {
        $response = $this->Login('manager123salah@gmail.com', 'manager123');
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->followRedirects($response)->assertSeeText('Invalid Credetials');
        $this->assertGuest();
    }

    public function test_login_manager_salah_password()
    {
        $response = $this->Login('manager123@gmail.com', 'manager123salah');
        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->followRedirects($response)->assertSeeText('Invalid Credetials');
        $this->assertGuest();
    }
    public function test_login_user()
    {
        $response = $this->Login('user1234@gmail.com', 'user12345');
        $response->assertRedirect('/user');
    }

    public function test_login_user_salah_email()
    {
        $response = $this->Login('user1234salah@gmail.com', 'user12345');

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->followRedirects($response)->assertSeeText('Invalid Credetials');
        $this->assertGuest();
    }

    public function test_login_user_salah_password()
    {
        $response = $this->Login('user1234@gmail.com', 'user12345salah');

        $response->assertRedirect('/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->followRedirects($response)->assertSeeText('Invalid Credetials');
        $this->assertGuest();
    }


    public function test_user_surat()
    {
        $response = $this->Login('user1234@gmail.com', 'user12345');

        $response->assertRedirect('/user');
        $this->followRedirects($response)->assertSee('Buat Ijin Lembur');
        $this->followRedirects($response)->assertStatus(200);
    }

}