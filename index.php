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


class Ship
{
    public $model;

    public function setModel($modelName)
    {
        $this->model = $modelName;
    }
}

class FastShip extends Ship
{
}

$FastShip1 = new FastShip();
$FastShip1->setModel('Gundam Kyrios');  // gemi'nin model ayarini yaptik
$FastShip1->model;  // Gundam Kyrios


class Parent1
{
    public $name = 'parent';
}

class Child1 extends Parent1
{
    public $name = 'child';
}

$child1 = new Child1();
$child1->name;  // child
// eger parent class ve child classta ayni degiskenler veya fonksiyon adlari var ise oncelik olarak turetildigi yere bakar.


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_

// Protected
// private'e benzer ama farkli olarak miras alindigi yerde kullanilabilir. Yani yine disaridan cagirmayla kullanilamaz ama cesitli mirasvari iliskilerde kullanilabilir.

class Parent2
{
    protected $name = 'yusuf';
    protected $surname = 'kaygin';
}

class Child2 extends Parent2
{
    public function fullName()
    {
        return $this->name . ' ' . $this->surname;
    }
}

$child2 = new Child2();
$child2->fullName();  // yusuf kaygin

// bir degiskenimiz varsa ve bu degiskeni heryerden ulasilabilir yapmak istemiyorsak ama miras yoluylada kullanmak istiyorsak bu noktada protected yardimimiza kosuyor.


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_

// Final 
// final sadece classlara ve claslarin methodlarina uygulanabilir. Final kullanildigi yerin tekrar kullanilmasini engeller.Yani kisaca classlar uzerinde miras alinmayi engeller methodlar uzerinde ise miras alindigi class icinde tekrar tanimlanmamayi saglar.

/*final*/
class Parent3
{
    public function sayHello()
    {
        return 'halo';
    }
}

class Child3 extends Parent3
{
    public function sayHello()
    {
        return 'hello';
    }
}

// parent'a final yazildigi zaman mirasi engeller ve hata verir.


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// abstract 
// classlarda kullanildigi zaman artik o class uzerinden nesne turetemez hale geliriz. Yani kisaca o class'i soyutlamis oluruz peki bu bizim nasil isimize yarar diye soracak olursak soyutladigimiz class'in icinde yazdiklarimizi baska bir class'a miras verdirterek kullanim saglayabiliriz.

abstract class Parent4
{
    protected $name = 'yusuf';
    protected $surname = 'kaygin';
}

class Child4 extends Parent4
{
    public function fullName()
    {
        return $this->name . ' ' . $this->surname;
    }
}

$child4 = new Child4();
$child4->fullName();  // yusuf kaygin 


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// interface implement
// yazdigimiz kodlarin daha anlasilabilir olmasi icin interfaceler hazirlamalari ve bu interfaceleri ilgili classlara implement etmeliyiz.
// interface icindeki butun fonksiyonlarin implement edildigi classlarca saglanmasi gerekir aksi taktirde o implement hata verir.
// Acikcasi bunu ufak orneklerle anlatmak biraz zor meslek hayatinda tecrube kazandikca bu konuyu daha iyi kavranacagindan suphem yok.

interface CarInterface
{
    public function engine();
    public function fuel();
}

class Child5 implements CarInterface
{
    public function engine()
    {
        return 'engine test';
    }

    public function fuel()
    {
        return 'fuel test';
    }
}


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// polymorphism
// karisik isleri olabildiginde basite indirgeyen yapisi ile gelistirme yapmamizi kolaylik saglar assagidaki ornekteki gibi

interface Shape
{
    public function area();
}
// sekil adinda interface'i yaziyoruz

class Rectangle implements Shape
{
    private $width;
    private $height;

    public function __construct($width, $height)
    {
        $this->height = $height;
        $this->width  = $width;
    }

    public function area()
    {
        return $this->height * $this->width;
    }
}

$rect = new Rectangle(4, 5);
$rect->area(); // 20
// constructor'a parametre yollayip ardindan onun uzerinden daha okunabilir bir sekilde hesaplama yaptik.


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// Type hinting
// parametreler icinde tipini belirtme olayi. 
// function my_function(type $param1, type param2, ...) 

class Valid
{
    public function __construct($x1, $x2)
    {
        $this->number1 = is_numeric($x1) ? $x1 : 'error';
        $this->number2 = is_numeric($x2) ? $x2 : 'error';
    }
}

class CalculatorMachine
{
    public function __construct(Valid $valid)
    {
        /*
        print_r($valid);

        output
        phpOOP\Valid Object
        (
            [number1] => 16
            [number2] => error
        )
        */
    }
}

$valid = new Valid(16, 'text');
$calculator = new CalculatorMachine($valid);
// yukaridaki ornekte bir 2 class kullanarak laraveldeki validatore benzer bir sey yaptik.
// Class disinda Array, string, int gibi basinda gelen parametrenin tipini degistirebilcegimiz turler vardir.


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// instanceof 

class Fruit
{
}

$apple = new Fruit();
$apple instanceof Fruit; // true
// instanceof bir birleri ile alakali olan nesnelerde true doner.


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// Destructor
// ilgli class her calistiginda en son cikarken destructor'da calisir.


class Pc
{
    private $model;
    function __construct($model)
    {
        $this->model = $model;
    }

    function __destruct()
    {
        //echo 'her turlu calisirim';
    }
}

$dell = new Pc('dell');
// yukarida destructor fonksiyonu ne olursa olsun yinede calisir en son.


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// Const & static
// sabit degisken anlamina gelir ayrica class'ta nesne turetmeden cekebilme ozelligimiz var asssagidaki ornekte oldugu gibi
// degiskenin basina dolar isareti koymayiz.
// class icinde tanimlanmis olan bir const degiskenine class icinde self ile ulasiriz.

class Humans2
{
    const name = 'yusuf';
    static $surname = 'kaygin';

    public function output()
    {
        return self::name . ' ' . self::$surname;;
        // normal degisken olsaydi eger this uzerinden giderdik.
    }
}

Humans2::name; // yusuf
Humans2::$surname; // yusuf  not : evet basinda dolar var

$human2 = new Humans2();
$human2->output(); // yusuf kaygin

// yukaridaki orneklerde farkli olarak static var statik ile const arasindaki gozle gorulur fark basinda dolar kullanimi. ikiside self ile cagrilir.
// Static NOT : static ile saklanan bir degisken ram'de saklanir. Boylece bu bize iyi bir performans kazandirir. Ama bunu cokta kullanmamak gerek. Genelde cok sik cagrilan fonksiyonlarda kullanmak mantikli olur.

#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// Traits
// her classs icin yanlizca bir extends yapabiliyoruz. Bu siniri traits ile asabiliyoruz.


trait Human3
{
    public $leg = 2;

    // const name = 'yusuf';   error
    // static name = 'yusuf';  error

    public function sayHello($name)
    {
        return 'hello ' . $name;
    }
}

class Student
{
    use Human3;
}
// new anahtar kelimesiyle turetilemez 
// const kullanilamaz
// ilgili class'a dahil etmek icin use anahtar kelimesini kullanmaliyiz.

$joseph = new Student();
$joseph->leg; // 2
$joseph->sayHello('yusuf'); // hello yusuf


#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_


// Namespace & use