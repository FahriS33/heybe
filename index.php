<?php 
require_once 'header.php'; 

?>


<div class="main-banner2-area">
    <div class="container">
        <div class="main-banner2-wrapper">                       
            <h1>Kaliteli Ve Sağlıklı Online Mağazamıza Hoşgeldiniz!</h1>
            <p>Doğal, Ev Yapımı, Sağlıklı Ürünler</p>
            <form action="arama-detay" method="POST">
                <div class="banner-search-area input-group">
                    
                 
                    <input class="form-control" required="" minlength="3" name="searchkeyword" placeholder="ara...." type="text">
                    

                    <span class="input-group-addon">
                        <button type="submit" name="searchsayfa">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>  
                    </span>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="trending-products-area section-space-default">
    
    <?php require_once 'cok-satanlar.php' ?>
</div>

<div class="newest-products-area bg-secondary section-space-default">                
    <div class="container">
        <h2 class="title-default">Öne Çıkan Ürünler</h2>  
    </div>
    <div class="container-fluid" id="isotope-container">
        <div class="isotope-classes-tab isotop-box-btn-white"> 




        </div>

        <div class="row featuredContainer">


          <?php 
          $urunsor=$db->prepare("SELECT urun.urun_ad,urun.kategori_id,urun.urun_id,urun.urun_fiyat,urun.urunfoto_resimyol,urun.kullanici_id,urun.urun_durum,urun.urun_onecikar,kategori.kategori_id,kategori.kategori_ad,kullanici.kullanici_id,kullanici.kullanici_ad,kullanici.kullanici_soyad,kullanici.kullanici_magazafoto FROM urun INNER JOIN kategori ON urun.kategori_id=kategori.kategori_id INNER JOIN kullanici ON urun.kullanici_id=kullanici.kullanici_id where urun_onecikar=:onecikar and urun_durum=:durum order by urun_zaman,urun_onecikar DESC limit 8");
          $urunsor->execute(array(
            'onecikar' => 1,
            'durum' => 1
        ));

        



        while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { ?>

        <!-- Ürün Anasayfa Listeleme -->
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 yenigelen plugins">
            <div class="single-item-grid">
                <div class="item-img">
                    <a href="urun-<?=seo($uruncek['urun_ad'])."-".$uruncek['urun_id'] ?>"><img style="width: 451px; height: 252px;" src="<?php echo $uruncek['urunfoto_resimyol'] ?>" alt="product" class="img-responsive"></a>
                    <div class="trending-sign" data-tips="Öne Çıkan Ürün"><i class="fa fa-bolt" aria-hidden="true"></i></div>
                </div>
                <div class="item-content">
                    <div class="item-info">
                        <h3><a href="urun-<?=seo($uruncek['urun_ad'])."-".$uruncek['urun_id'] ?>""><?php echo $uruncek['urun_ad'] ?></a></h3>
                        <span><a href="kategoriler-<?=seo($uruncek['kategori_ad'])."-".$uruncek['kategori_id'] ?>"><?php echo $uruncek['kategori_ad'] ?></a></span>
                        <div class="price"><?php echo $uruncek['urun_fiyat'] ?> TL</div>
                    </div>
                    <div class="item-profile">
                        <div class="profile-title">
                            <div class="img-wrapper"><img style="width: 38px; height: 38px;" src="<?php echo $uruncek['kullanici_magazafoto'] ?>" alt="profile" class="img-responsive img-circle"></div>
                            <span><?php echo $uruncek['kullanici_ad']." ".$uruncek['kullanici_soyad'] ?></span>
                        </div>
                        <div class="profile-rating">
                            <a href="#"><b>Tüm Ürünleri</b></a>
                           <!-- <ul>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                <li>(<span> 05</span> )</li>
                            </ul>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php } ?>

        








    </div>

</div>
</div>

<div class="why-choose-area bg-primaryText section-space-default">                
    <div class="container">
        <h2 class="title-textPrimary">Neden Heybe'yi Tercih Etmelisiniz?</h2>  
    </div>
    <div class="container">
        <div class="row">
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="why-choose-box">
                <a href="#"><i class="fa fa-gift" aria-hidden="true"></i></a>
                <h3><a href="#">Ödeme</a></h3>
                <p>Binlerce ürün. Taksit seçenekleri. Tek tıkla ödeme. 30 gün ücretsiz iade.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="why-choose-box">
                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
                <h3><a href="#">Kaliteli Ürün</a></h3>
                <p>Sizlere bir dizi testlerden geçerek onay almış, sertfikalı kaliteli ürün sunuyoruz.</p>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="why-choose-box">
                <a href="#"><i class="fa fa-lock" aria-hidden="true"></i></a>
                <h3><a href="#">100% Güvenli Alışveriş</a></h3>
                <p>Heybe.com'da tüm sayfalar SSL Güvenlik Sertifikası ile korunmaktadır. Ayrıca yapacağınız tüm alışverişlerde yüksek güvenlik standartları geçerlidir. SSL Güvenlik Sertifikası ve 3D Secure servisleri sayesinde güvenli bir şekilde alışveriş yapabilirsiniz.</p>
            </div>
        </div>
    </div>
</div>
</div>



<div class="author-banner-area">
    <div class="author-banner-wrapper">
        <div id="ri-grid" class="author-banner-bg ri-grid header text-center">
            <ul class="ri-grid-list">
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\4.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\4.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>                            
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\2.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\3.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\5.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\6.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\7.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\8.jpg" alt=""></a></li>
                <li><a href="#"><img src="img\banner\9.jpg" alt=""></a></li>
            </ul>
        </div>
        <div class="author-banner-content">
            <ul>
                <li><p>Bugüne kadar<span> 20,000</span>'den fazla üye aramıza katıldı!</p></li>
                <li><a href="register.php" class="btn-fill-textPrimary">Sende aramıza katıl!</a></li>
            </ul>
        </div>
    </div>               
</div>
           

<?php require_once 'footer.php'; ?>