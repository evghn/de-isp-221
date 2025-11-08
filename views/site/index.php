<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Портал «Корочки.есть»</h1>

        <p class="lead fs-2">Мы обучим каждого со 100% результатом</p>


    </div>

    <div id="carouselExampleIndicators" class="carousel slide  carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>

        </div>
        <div class="carousel-inner rounded-4">
            <div class="carousel-item active" data-bs-interval="3000">
                <img src="/img/slide1.png" class="d-block w-100 img-slide" alt="slide1">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="/img/slide2.png" class="d-block w-100 img-slide" alt="slide2">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="/img/slide3.png" class="d-block w-100 img-slide" alt="slide3">
            </div>
            <div class="carousel-item" data-bs-interval="3000">
                <img src="/img/slide4.png" class="d-block w-100 img-slide" alt="slide4">
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div>
        <h2 class="display-4  my-5 text-center">
            Наши приемущества
        </h2>
    </div>
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 mb-3">
                <div class="d-flex gap-3 flex-wrap text-center">
                    <div style="width: 250px;border-radius: 50%;height: 250px;" class="bg-white m-auto  pt-3 block-ca">
                        <img src="/img/CA1.png" alt="Быстрота" class="w-75 d-block m-auto img-ca">
                    </div>
                    <div class="fs-1 lh-1 lex-grow-1 text-center w-100">За месяц<br>мы вас обучим<br> с 0 до ПРОФИ! </div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="d-flex gap-3 flex-wrap text-center">
                    <div style="width: 250px;border-radius: 50%;height: 250px;" class="bg-white m-auto  pt-3 block-ca overflow-hidden">
                        <img src="/img/CA2.png" alt="Быстрота" class="w-75 d-block m-auto img-ca">
                    </div>
                    <div class="fs-1 lh-1 lex-grow-1 text-center w-100">Качество нашего обучения подтверждено сертификатами</div>
                </div>
            </div>
            <div class="col-lg-4 mb-3">
                <div class="d-flex gap-3 flex-wrap text-center">
                    <div style="width: 250px;border-radius: 50%;height: 250px;" class="bg-white m-auto  pt-3 block-ca overflow-hidden">
                        <img src="/img/CA3.png" alt="Быстрота" class="w-75 d-block m-auto img-ca">
                    </div>
                    <div class="fs-1 lh-1 lex-grow-1 text-center w-100">Вы гарантировано найдете работу после обучения</div>
                </div>
            </div>
        </div>

    </div>
</div>