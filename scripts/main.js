import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs'

const swiper = new Swiper('#posterSwiper', {
    navigation: {
        nextEl: '#nextSlide',
        prevEl: '#prevSlide',
    },
    pagination: {
        el: '#poster__pagination',
    },
});