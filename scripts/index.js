const swiper = new Swiper('.posterSwiper', {
    slidesPerView: 1,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    loop: true,
    pagination: {
        el: '.poster__pagination',
        clickable: true,
    },
});

const swiperProductsRules = {
    slidesPerView: 5,
    spaceBetween: 30,
    loop: false,
}

const swiperNoveltys = new Swiper('.swiper__novelties', {
    ...swiperProductsRules,
    navigation: {
        nextEl: '.products-next-tovar',
        prevEl: '.products-prev-tovar',
    }
});
const swiperActions = new Swiper('.swiper__actions', {
    ...swiperProductsRules,
    navigation: {
        nextEl: '.actions-next-tovar',
        prevEl: '.actions-prev-tovar',
    }
});
const swiperPopulars = new Swiper('.swiper__popular', {
    ...swiperProductsRules,
    navigation: {
        nextEl: '.popular-next-tovar',
        prevEl: '.popular-prev-tovar',
    }
});