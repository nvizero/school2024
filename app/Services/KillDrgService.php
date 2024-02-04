<?php

namespace App\Services;

use App\Constant\Game;
//use DB;
//use App\Models\KillStatus;

class KillDrgService
{
    const C_MAX = 30;
    const RAND = 14;
    const EVE_CARD = 5;
    const RKEY = 'KillDRAGON' ;
    const TOTAL = 'KillDRAGON_TOTAL' ;
         
    //直到成功
    public function utilWin(){
        $card = self::randCard();
        $rand = self::rand();
        $card =[
            Game::CARDS_L=> Game::CARDS[$card[$rand[0]]],
            Game::CARDS_M=> Game::CARDS[$card[$rand[1]]],
            Game::CARDS_R=> Game::CARDS[$card[$rand[2]]],
        ];
        while(  $card[Game::CARDS_L]===$card[Game::CARDS_R] || 
                $card[Game::CARDS_R]===$card[Game::CARDS_M] || 
                $card[Game::CARDS_M]===$card[Game::CARDS_L]  ){
            $card = self::randCard();
            $rand = self::rand();
            $card =[
                Game::CARDS_L=> Game::CARDS[$card[$rand[0]]],
                Game::CARDS_M=> Game::CARDS[$card[$rand[1]]],
                Game::CARDS_R=> Game::CARDS[$card[$rand[2]]],
            ];
        }
        return  $card;
    }

    public function getCards($userid)
    {
        $card = self::randCard();
        $rand = self::rand();
        $key = self::RKEY.":".$userid;
        $card =[
            Game::CARDS_L=> Game::CARDS[$card[$rand[0]]],
            Game::CARDS_M=> Game::CARDS[$card[$rand[1]]],
            Game::CARDS_R=> Game::CARDS[$card[$rand[2]]],
            'code'=>Game::CARDS_NOT_KILL
        ];

        if($card['code']==Game::CARDS_NOT_KILL ){
            
            
                //60%
                if(rand(0,99)<=Game::KD_WIN_RATE){
                    $card=self::utilWin();
                }
           
        }
        ////
        if( $card[Game::CARDS_L]!=$card[Game::CARDS_R] && 
            $card[Game::CARDS_R]!=$card[Game::CARDS_M] && 
            $card[Game::CARDS_M]!=$card[Game::CARDS_L]  ){
            $card['code']=Game::CARDS_KILL;
        }
        return $card;
    }
    //設定牌組 
    public function randCard()
    {
        $tmp = [];
        $cards =["A","B","C"];
        foreach($cards as $card){
            for($i=1;$i<=self::EVE_CARD;$i++){
                $tmp[]=$card;
            }
        }
        foreach($tmp as $i =>$c){
            $r = rand(0,self::RAND);
            if($r!=$i){
                $t_one  = $tmp[$i];
                $tmp[$i]  = $tmp[$r];
                $tmp[$r] =$t_one;
            }
        }
        return $tmp;
    }
    
    //隨機選出三張牌
    public function rand(){

        try{
            $n = [1,1,1];
            while( $n[0]==$n[1] || ($n[2]==$n[1]) || $n[0]==$n[2] ){
               $n[0]=rand(0,self::RAND); 
               $n[1]=rand(0,self::RAND); 
               $n[2]=rand(0,self::RAND); 
            }
            return $n;
        }catch(\Exception $e){
            echo $e->getCode();
            echo $e->getMessage();
        }
    }
}
