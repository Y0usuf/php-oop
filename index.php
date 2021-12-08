<?php

/*
| 
|  oop nedir ?
|  Nesne yonelimli programlama daha temiz ve tekrara dusmeden gelistirme yapmamiza olanak saglayan bir yapidir.
|  Yapilacak isleri olabildigince ufak parcalara ayirarak bunlari oop programlama standartlarina bagli kalarak gelistiririz. 
| 
*/

#   class Human {}
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

echo $yusuf->leg;  // 2
# echo $yusuf->idea;  // error
// -> isareti ile ilgili class'in icindeki verilere ulasabiliriz.
// public olan degiskeni cekebiliyorken private olani cekemedik.

echo $yusuf->bodyIndex(80, 1.80);  // 20.0405
// class icinde fonksiyonlarda kullanabiliriz.

#-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_-_
