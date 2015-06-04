$(function() {

    // Слайдшоу на Главной
    $('.slideshow').flexslider({
        namespace: 'ms-',
        selector: '.slides > .slide',
        directionNav: false,
        slideshow: false,
        animation: 'slide',
        animationLoop: false,
        slideshowSpeed: '5000',
        animationSpeed: 1000,
        pauseOnHover: true,
        prevText: '',
        nextText: ''
    });

    // Карусель товаров в блоке "Рекомендуемые" на Главной
    $('.carousel').flexslider({
        namespace: 'ms-',
        selector: '.slides > .slide',
        directionNav: true,
        controlNav: false,
        slideshow: false,
        animation: 'slide',
        animationLoop: true,
        slideshowSpeed: '5000',
        animationSpeed: 1000,
        pauseOnHover: true,
        prevText: '',
        nextText: ''
    });

    // Горизонатальный скролл для списка новостей на главной
    $('.b-news-list').mCustomScrollbar({
        axis:'x',
        advanced:{autoExpandHorizontalScroll:true}
    });

    // Стилизуем select'ы
    $('.b-quick-selection .search-options .option select, .b-products .sortable select').selectpicker();

    
});





