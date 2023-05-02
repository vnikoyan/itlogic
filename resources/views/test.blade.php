@extends('layouts.app')

@section('content')
    <div class="content container">
        <div class="banner d-flex justify-content-between">
            <div class="left-col">
                <div class="banner-info  d-flex justify-content-between">
                    <div class="col-7 terminal-1">
                        <div class="col-title">Скидка на терминалы</div>
                        <div class="col-subtitle">В своём стремлении улучшить пользовательский опыт мы упускаем, что
                            независимые государства
                        </div>
                        <div class="col-button">
                            <button><a href="#">Подробнее</a></button>
                        </div>
                    </div>
                    <div class="col-6 img-ban">
                        <img src="img/banner-icons/banner-2.png" alt="#">
                    </div>
                </div>
            </div>
            <div class="right-col d-flex flex-column">
                <div class="right-col-1 d-flex">
                    <div class="col">
                        <div class="col-title">Скидки на корзинки</div>
                        <div class="col-subtitle">В своём стремлении улучшить пользовательский опыт</div>
                        <div class="col-button">
                            <button><a href="#">Подробнее</a></button>
                        </div>
                    </div>
                    <div class="col  img-ban-2 ">
                        <img src="img/banner-icons/banner-1.png" alt="#">
                    </div>

                </div>


                <div class="right-col-2 d-flex">
                    <div class="col">
                        <div class="col-title">Скидки на корзинки</div>
                        <div class="col-subtitle">В своём стремлении улучшить пользовательский опыт</div>
                        <div class="col-button">
                            <button><a href="#">Подробнее</a></button>
                        </div>
                    </div>
                    <div class="col  img-ban-2 ">
                        <img src="img/banner-icons/banner-1.png" alt="#">
                    </div>
                </div>
            </div>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide mob-version" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="banner-mob  d-flex flex-column">
                        <div class="section-mob-1 d-flex flex-column ">
                            <div class="col">
                                <div class="section-title">Скидка на терминалы</div>
                                <div class="section-subtitle">В своём стремлении улучшить пользовательский опыт мы
                                    упускаем, что
                                    независимые государства
                                </div>
                                <div class="section-button">
                                    <button>Подробнее</button>
                                </div>
                            </div>
                            <div class="col ">
                                <div class="img-ban d-flex justify-content-end">
                                    <img src="img/banner-icons/banner-2.png" alt="#"/>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
                <div class="carousel-item">
                    <div class="banner-mob  ">
                        <div class="section-mob-2  d-flex flex-column">
                            <div class="col">
                                <div class="section-title">Скидка на терминалы</div>
                                <div class="section-subtitle">В своём стремлении улучшить пользовательский опыт мы
                                    упускаем, что
                                    независимые государства
                                </div>
                                <div class="section-button">
                                    <button>Подробнее</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="img-ban-2 d-flex justify-content-end">
                                    <img src="img/banner-icons/banner-1.png" alt="#"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="banner-mob  d-flex flex-column">
                        <div class="section-mob-3 col ">
                            <div class="section-title">Скидка на терминалы</div>
                            <div class="section-subtitle">В своём стремлении улучшить пользовательский опыт мы упускаем,
                                что
                                независимые государства
                            </div>
                            <div class="section-button">
                                <button>Подробнее</button>
                            </div>
                            <div class="img-ban-2 d-flex justify-content-end">
                                <img src="img/banner-icons/banner-1.png" alt="#"/>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="discounts">
            <div class="discounts-01 d-flex justify-content-between align-items-center">
                <div class="discounts-1">Скидки</div>
                <div class="discounts-2"></div>
            </div>
            <div class="discounts-bloc d-flex justify-content-between align-items-start ">
                <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators1" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/IT7000D0-15S 1.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Сенсорый моноблок Birch 15</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/PKB78%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Программируемая клавиатура Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/CP-Q3__side_1-360x360%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Термопринтер Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/Birch-M365ND%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Жидкокристаллические мониторы Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/CP-Q3__side_1-360x360%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Термопринтер Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/Birch-M365ND%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Жидкокристаллические мониторы Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/IT7000D0-15S 1.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Сенсорый моноблок Birch 15</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/PKB78%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Программируемая клавиатура Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/Birch-M365ND%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Жидкокристаллические мониторы Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/IT7000D0-15S 1.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Сенсорый моноблок Birch 15</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/CP-Q3__side_1-360x360%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Термопринтер Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/PKB78%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Программируемая клавиатура Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/CP-Q3__side_1-360x360%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Термопринтер Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/Birch-M365ND%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Жидкокристаллические мониторы Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/IT7000D0-15S 1.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Сенсорый моноблок Birch 15</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/PKB78%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Программируемая клавиатура Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="new_product">
            <div class="discounts-02 d-flex justify-content-between align-items-center">
                <div class="discounts-1">Новые поступления</div>
            </div>
            <div class="discounts-bloc d-flex justify-content-between align-items-start ">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators2" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/IT7000D0-15S 1.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Сенсорый моноблок Birch 15</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/PKB78%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Программируемая клавиатура Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/CP-Q3__side_1-360x360%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Термопринтер Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/Birch-M365ND%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Жидкокристаллические мониторы Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/CP-Q3__side_1-360x360%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Термопринтер Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/Birch-M365ND%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Жидкокристаллические мониторы Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/IT7000D0-15S 1.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Сенсорый моноблок Birch 15</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/PKB78%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Программируемая клавиатура Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/Birch-M365ND%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Жидкокристаллические мониторы Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/IT7000D0-15S 1.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Сенсорый моноблок Birch 15</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/CP-Q3__side_1-360x360%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Термопринтер Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/PKB78%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Программируемая клавиатура Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/CP-Q3__side_1-360x360%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Термопринтер Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/Birch-M365ND%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Жидкокристаллические мониторы Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/IT7000D0-15S 1.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Сенсорый моноблок Birch 15</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/PKB78%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Программируемая клавиатура Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="trust_us">
            <div class="discounts-03 d-flex justify-content-between align-items-center">
                <div class="discounts-1">Нам доверяют</div>
            </div>
            <div class="d-flex justify-content-between align-items-center flex-wrap trust-parent">
                <div class="trust_us-bloc">
                    <img src="img/partners-icons/carrefour.png" alt="#"/>
                </div>
                <div class="trust_us-bloc">
                    <img src="img/partners-icons/Kaiser.png" alt="#"/>
                </div>
                <div class="trust_us-bloc">
                    <img src="img/partners-icons/Logo-200x200 1.png" alt="#"/>
                </div>
                <div class="trust_us-bloc">
                    <img src="img/partners-icons/evrika.png" alt="#"/>
                </div>
                <div class="trust_us-bloc">
                    <img src="img/partners-icons/parma.png" alt="#"/>
                </div>
                <div class="trust_us-bloc">
                    <img src="img/partners-icons/city.png" alt="#"/>
                </div>
            </div>
        </div>
        <div class="discounts">
            <div class="discounts-01 d-flex justify-content-between align-items-center">
                <div class="discounts-1">Скидки</div>
                <div class="discounts-2"></div>
            </div>
            <div class="discounts-bloc d-flex justify-content-between align-items-start ">
                <div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators3" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators3" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators3" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators3" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/IT7000D0-15S 1.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Сенсорый моноблок Birch 15</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/PKB78%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Программируемая клавиатура Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/CP-Q3__side_1-360x360%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Термопринтер Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/Birch-M365ND%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Жидкокристаллические мониторы Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/CP-Q3__side_1-360x360%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Термопринтер Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/Birch-M365ND%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Жидкокристаллические мониторы Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/IT7000D0-15S 1.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Сенсорый моноблок Birch 15</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/PKB78%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Программируемая клавиатура Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/Birch-M365ND%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Жидкокристаллические мониторы Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/IT7000D0-15S 1.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Сенсорый моноблок Birch 15</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/CP-Q3__side_1-360x360%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Термопринтер Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/PKB78%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Программируемая клавиатура Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/CP-Q3__side_1-360x360%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Термопринтер Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/Birch-M365ND%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Жидкокристаллические мониторы Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/IT7000D0-15S 1.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Сенсорый моноблок Birch 15</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="discounts-bloc-1">
                                    <div class="discounts-bloc-content">
                                        <div class="disc-icon">
                                            <img src="img/discounts-icons/PKB78%201.png" alt="#"/>
                                        </div>
                                        <div class="disc-title">Программируемая клавиатура Birch</div>
                                        <div class="disc-subtitle">
                                            <p>
                                                Стеллажные системы используются для выкладки,
                                                хранения и продажи товаров.
                                            </p>
                                            <p>
                                                Торговые стеллажи представляют собой
                                                специализированное оборудование для магазинов,
                                                торговых отделов
                                            </p>

                                        </div>
                                        <div class="disc-button">
                                            <button><a href="index-products.html">Подробнее</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
