<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\KillDrgService;
class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $k = new KillDrgService();
        $cards = $k->randCard();
        $a_count =0;
        $b_count =0;
        $c_count =0;

        foreach($cards as $k=>$card){
            if($card=="A"){
                $a_count+=1;
            }elseif($card=="B"){
                $b_count+=1;
            }elseif($card=="C"){
                $c_count+=1;
            }
        }

        $this->assertSame($a_count,5);
        $this->assertSame($b_count,5);
        $this->assertSame($c_count,5);
    }

    public function test_rand()
    {
        $k = new KillDrgService();
        // $cards = $k->randCard();
        $rand = $k->rand();
        // print_r($rand);
        $this->assertNotSame($rand[0],$rand[1]);
        $this->assertNotSame($rand[1],$rand[2]);
        $this->assertNotSame($rand[0],$rand[2]);
    }
}
