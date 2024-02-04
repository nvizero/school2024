<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use DB;
class AuTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testForm()
    {                
        $name = "test".date("ymdHis")."test";
        $response = $this->post(
            '/api/register',
            [
                'name' => $name,
                'email' =>"q".date("YmdHis")."@gmail.com",
                "password"=>"a123456",
                "level"=>1
            ]
        );
        $responseData = $response->json();
         
        $this->assertSame($responseData['user']['name'],$name);
    }

    public function testFormLogin()
    {                
        
        $response = $this->post(
            '/api/login',
            [                
                'email' =>"q20240204135446@gmail.com",
                "password"=>"a123456",
                
            ]
        );
        $responseData = $response->json();        
        $this->assertSame($responseData['token'],true);
    }
}
