<?php

namespace App\Constant;

class Game
{
    const CARDS = [
        'A'=>'心境牌',
        'B'=>'體魄牌',
        'C'=>'形技牌',
    ];
    const CARDS_L = 'LEFT';
    const CARDS_M = 'MID';
    const CARDS_R = 'RIGHT';
    const CARDS_RES = 'RES';
    const CARDS_KILL =1;
    const CARDS_NOT_KILL =0;
    const KD_WIN_RATE = 50;
    const USER_KILL_MAX = 3;
    const USER_KILL_MAX_MSG = '每日最多三次';
    const USER_KILL_MAX_CODE = 1301;
        //兌換商品
    const KILL_GIFT = [
        1 => ['price' => 5, 'name' => "逆元丹*2", 'gift_id' => 1310],
        2 => ['price' => 10, 'name' => "功德鐵卷*1", 'gift_id' => 1311],
        3 => ['price' => 15, 'name' => "丙型傀儡*1", 'gift_id' => 1312],
        4 => ['price' => 20, 'name' => "先天丹*1", 'gift_id' => 1313],
        5 => ['price' => 25, 'name' => "青蟬翼*50", 'gift_id' => 1314],
    ];

    /**
 *  2/8 當天到 3 萬
    2/11 當天到 5 萬
    2/15 當天到 10 萬
    2/22 當天到 20 萬
    */ 
    const REG_GAME_DEFAULT = [
        '2024-02-08'=> 30000,
        '2024-02-11'=> 50000,
        '2024-02-15'=> 100000,
        '2024-02-22'=> 200000,
    ];
    const DEF_UNIID = 202402020;
    const REG_KEY = 'gamekey_reg_5017';
    const REG_KEY_TTL = self::DAY_TTL*7;
    const DAY_TTL = 86400;
    const LOGIN_SUCCESS_CODE = 1;
    const LOGIN_SUCCESS = '登入成功';
    const BUSY_CODE = 1199;
    const BUSY = '系統繁忙請稍等';
    const EXCHANGE_ID = 3;
    const EXCHANGE_SUCCESS = '兌換成功';
    const EXCHANGE_FAIL = '兌換失敗';
    const EXCHANGE = "兌換商品";
    const NO_GIFT = "沒有商品";
    const NO_GIFT_CODE = 2035;
    const GIFT_ONCE_OUT = "每個商品只能兌換一次!";
    const GIFT_ONCE_CODE = 2037;
    const GIFT_EXCHANGE_OUT = "己全數兌換完畢!!";
    const GIFT_EXCHANGE_CODE = 2036;
    //劇情創作次數
    const PLOT_COUNT = 5;
    const PLOT_SUCCESS = '創作成功';
    const PLOT_SUCCESS_CODE = 1;
    const PLOT_COUNT_FALT = '只能創作'.self::PLOT_COUNT.'筆';
    const PLOT_COUNT_FALT_CODE = 0;
    const PLOT_UODATE_SUCCESS = '更新成功';
    const PLOT_UODATE_SUCCESS_CODE = 1;

    const NO_USER = '沒有這個使用者';
    const NO_USER_STATUS = 1001;
    const NO_MONEY = '餘額不足';
    const NO_MONEY_CODE = 2033;
    const SUCCESS = 'Success!!';
    const SUCCESS_CODE = 1;
    const DAILY_MONEY = 300;
    //分享
    const SHARE_MONEY = 200;
    const SHARE_MSG = '分享創作成功';
    const SHARE_CODE = 3001;

    const SHARED_MSG = '今日己分享';
    const SHARED_CODE = 3002;

    //活動id
    const ACTID = 1028;
    const MSG_DAILY = '每日登入發放';
    const MSG_DESC = '扣除本金';
    //射龍門
    const DRAGON_DESC = '射龍門扣除本金';
    const SOFF_DESC = '刮刮樂扣除本金';
    const DRAGON = 1;
    const DRAGON_KEY = "Ball:";
    const DRAGON_RES_KEY = "Ball:RES:";
    const DRAGON_WIN = '鸁了獲得二倍彩金';
    const DRAGON_HIT = '中柱了!!GG,扣1.5倍';
    const DRAGON_LOST = '射外面!!GG,扣除投注彩金';

    const WIN = 1;
    const HIT = 2;
    const FAIL = 3;
    const LOGIN_FAIL = '登入失敗';

    //刮刮樂
    const SOFF_KEY = 'SOFF_KEY';
    //幾率
    const SOFF_RATE = [
        6 => 2,
        5 => 5,
        4 => 9,
        3 => 15,
        2 => 32,
        1 => 37,
    ];

    const SOFF_ERROR1_STATUS = 9;
    const SOFF_ERROR2_STATUS = 8;
    const SOFF_ERROR1 = '餘額不足';
    const SOFF_ERROR2 = '超過每日可刮次數,一天'.self::SOFF_DAILY_TIME.'次';
    const SOFF_NO_GAME = '銘謝惠顧';
    const SOFF_LOST = 0;

    //每日次數上限
    const SOFF_DAILY_TIME = 3;
    const SOFF = 2;
    const SOFF_WIN = 1;
    const SOFF1 = 1;
    const SOFF2 = 2;
    const SOFF3 = 3;
    const SOFF4 = 4;
    const SOFF5 = 5;
    const SOFF6 = 6;
    //預約
    const RESERVE_SUCCESS_CODE = 1;
    const RESERVE_SUCCESS_MSG = '預約成功';

    const RESERVE_FAIL_CODE = 0;
    const RESERVE_FAIL_MSG = '預約失敗';
    const RESERVE_DB_ERROR_CODE = 1107;
    const RESERVE_DB_ERROR = '大俠，你已經預約過了喔！';

    //兌換商品
    const GIFT_PRICE = [
        1 => ['price' => 900, 'name' => "洗髓丹*15", 'gift_id' => 1310],
        2 => ['price' => 800, 'name' => "功德鐵卷*2", 'gift_id' => 1311],
        3 => ['price' => 320, 'name' => "坎離丹*2+紫華丹*2", 'gift_id' => 1312],
        4 => ['price' => 320, 'name' => "元陽丹*2+碎虛丹*2", 'gift_id' => 1313],
        5 => ['price' => 640, 'name' => "清虛丹*1", 'gift_id' => 1314],
        6 => ['price' => 4000, 'name' => "昆吾石*50", 'gift_id' => 1315],
        7 => ['price' => 4000, 'name' => "青蟬翼*50", 'gift_id' => 1316],
        8 => ['price' => 800, 'name' => "易容丹*1", 'gift_id' => 1317],
        9 => ['price' => 6000, 'name' => "時裝", 'gift_id' => 1318],
    ];
}
