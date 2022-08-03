# hangman

kafamda direkt php ve javascript i harmanlayarak yapabileceğim geldi ama çıkmaza girdim.
Neredeyse 8,10 saattir bu projeyle uğraşıyorum. kullandığım yöntemler muhtemelen çok saçma ama mevcut bilgimi bir şekilde iteleyerek bu işi tamamlamak istedim. Bir kaç gözlemim oldu.
- php içerikleri html olarak basılmadığı müddetçe javascript verileri alamıyor. Anlatmak istediğim şu : 
 var js = <?php $php_var ?> bu şekilde javascript görmüyor php değerini, ama bu şekilde var js = <?= $php_var ?> 
 değeri bastığımızda javascript değeri alabiliyor.
 - ve sanırım javascript te oluşturduğum koşul ifadelerine gömdüğüm php kodları koşullardan bağımsız çalışıyor. Mesela

 - var i = 5;
 - if(i==5){
 -   alert(5);
 - }
 - else{
 -  echo"hello" 
 - }
 - (php taglarini bilerek kaldırdım)
else bloğunun yorumlanmaması gerek bu durumda ama echo"hello" kodu ekrana basılıyor.
Bunlar benim gözlemledğim şeyler. Tamamen yanlışta olabilirler. Sadece nerede hata yaptığımı göremiyorum ve gözlemlediğim sorunlar bunlar.Kim bilir göremedğim ne kadar sorun var :). Şimdilik tek bir kurşun daha sıkıp 
daha çok php kullanıp ajax ile yapmaya çalışacağım
