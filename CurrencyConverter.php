<?php
namespace app\components;
use yii\base\Widget;
use yii\helpers\Html;
class CurrencyConverter  extends Widget {
    
    public $from = 'USD';
    public $to = 'INR';
    public $api_key = '35dffd6993ce6b62f9bc';
    public $amount = '50';


    public function init() {
       parent::init();
    }
    public function run(){
        $url = file_get_contents($this->getCurrencyConverterApiUrl());
        $json = json_decode($url, true);
        $rate = implode(" ",$json);
    
           return $this->render('currency-converter', ['rate' => $rate, 'amount' =>  $this->amount]);
    }

    public function getCurrencyConverterApiUrl() {

        $url = 'https://free.currconv.com/api/v7/convert?q='.$this->from.'_'.$this->to.'&compact=ultra&apiKey='.$this->api_key;
        return $url;
    }
}
?>