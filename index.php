<?php

namespace phpOOP;
/*
| 
|  oop nedir ?
|  Nesne yonelimli programlama daha temiz ve tekrara dusmeden gelistirme yapmamiza olanak saglayan bir yapidir.
|  Yapilacak isleri olabildigince ufak parcalara ayirarak bunlari oop programlama standartlarina bagli kalarak gelistiririz. 
| 
*/

class Animals
{
}
// class yapilari bize genel tanimlamalar yapmamiza olanak saglar.


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


class Human
{
    public $leg = 2;
    private $idea = 'xxx';

    public function bodyIndex($kilo, $size)
    {
        return ($size * $size) / $kilo;
    }
}
// basinda private olan degiskenlere sadece o class icinde ulasabiliriz. Yani o class'a ozel olur.
// public olan ise class ici ve disi her alanda kullanilmaya acik olur.
// her insanda bacak vardir ama her insanin fikri ayni degildir.
// not : class icindeki degiskenleri public private gibi durumunu bildirmek zorundayiz.

$yusuf = new Human();
// nesne turetme, var olan bir class uzerindeki ozellikler ile yeni bir degisken olusturmamizi saglar.
// Human class'i uzerinden yusuf degiskenine nesne turetme islemi yaptik.
// Artik yusuf degiskeni uzerinden human class'inin icindeki ozelliklere ulasabiliriz.

$yusuf->leg;  // 2
# echo $yusuf->idea;  // error
// -> isareti ile ilgili class'in icindeki verilere ulasabiliriz.
// public olan degiskeni cekebiliyorken private olani cekemedik.

$yusuf->bodyIndex(80, 1.80);  // 20.0405
// class icinde fonksiyonlarda kullanabiliriz.


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// this anahtar sozcugu
// this bir class icinde kullanildigi zaman o class'in kendisini kasteder.

class Fish
{
    private $name = 'nemo';
    private $alias = 'kayip balik';

    public function fullName()
    {
        return $this->alias . ' ' . $this->name;
    }
}

$nemo = new Fish();
$nemo->fullName();  // kayip balik nemo
// class icinde kendi ozelliklerinden birini kullanacagimiz zaman this anahtar kelimesini kullaniyoruz.


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// Zincileme kullanim

class Calculator
{
    public $result;

    public function addition($value)
    {
        $this->result += $value;
        return $this;
    }

    public function ejection($value)
    {
        $this->result -= $value;
        return $this;
        // this class'i temsil ettigi icin zincirleme yapacaksak class'in son durumunu belirtmeliyiz bunun icin this'i return ediyoruz.
    }
}

$process = new Calculator();
$process->addition(10)->ejection(12)->addition(2)->result; // 0
// class icinde zincileme kullanma durumlari olabilir. Bunlarda temel gaye class'in son durumunu bildirmemiz.
// this class'i temsil ettigi icin this'i ilgili fonksiyonlarda return ederek boylece zincirleme kullanima olanak saglayabiliriz.


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// __contructor 
// her class'in yapici fonksiyonu olabilir. Bizim classlardaki yapici fonksiyonumuz constructor'dur.
// contructor methodu iceren bir classta, o class calistigi zaman ilk olarak constructor method calisir.

class Car
{
    private $model = 'Model girilmedi';

    public function __construct($modelName = null)
    {
        $this->model = $modelName == null ? $this->model : $modelName;
        // parametre gonderilmeme durumunu dahil ettik.
    }

    public function getModel()
    {
        return $this->model;
    }
}

$volvo = new Car('S90');
$volvo->getModel();  // S90
// Yukaridaki ornekte goruldugu uzere class'a verdigimiz parametre constructor methodda yakalanabilir.


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// Magic Constants
// php'de bazi ozel sabitler vardir.
// ornegin __CLASS__ sabiti icinde bulundugu class'in adini almak icin kullanilir.
// __LINE__ kullanildigi satiri almak icin
// __FILE__ kullanildigi yerin tam yolunu almak icin
// __METHOD__ kullanildigi method adini almak icin

class Pizza
{

    public function constantsInfo()
    {
        $info = [
            'className'  => __CLASS__,
            'line'       => __LINE__,
            'file'       => __FILE__,
            'method'     => __METHOD__,
            'short path' => __DIR__,
            'function'   => __FUNCTION__,
            'namespace'  => __namespace__,
            'trait'      => __TRAIT__    // birden fazla extends olayinda traitler kullanilir buda icinde bulundugu trait adini verir.
        ];

        return $info;
    }
}

$cheesePizza = new Pizza();
$data = $cheesePizza->constantsInfo();
//print_r($data);


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// inherit
// oop guzellikleri burda basliyor. Dusununki elinizde insanlar her insanin ortak ozelliklei vardir. Her yeni insanda ortak olan ozellikleri yeniden olusturmak yerine bu ortak ozellikleri bir class altinda toplayip insan olusturacagimiz zaman ortak ozellirinden miras alarak olusturmamiz hem daha hizli hemde daha okunabilir yazilim gelistirmemiz acisindan cok onemlidir.

#class Parent { }
#class Child extends Parent { }
