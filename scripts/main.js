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

const swiperNoveltys = new Swiper('.swiper__noveltys', {
    slidesPerView: 4,
    spaceBetween: 50,
    loop: false,
    navigation: {
        nextEl: '.swiper-next-tovar',
        prevEl: '.swiper-prev-tovar',
    }
});
const swiperActions = new Swiper('.swiper__actions', {
    slidesPerView: 4,
    spaceBetween: 50,
    loop: false,
    navigation: {
        nextEl: '.actions-next-tovar',
        prevEl: '.actions-prev-tovar',
    }
});
const swiperPopulars = new Swiper('.swiper__popular', {
    slidesPerView: 4,
    spaceBetween: 50,
    loop: false,
    navigation: {
        nextEl: '.popular-next-tovar',
        prevEl: '.popular-prev-tovar',
    }
});