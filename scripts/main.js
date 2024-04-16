function addProductInBusket(productId) {
    let products = JSON.parse(localStorage.getItem('productsIds'));
    let productsIds = null;

    if (products == null) {
        productsIds = [productId]
    } else {
        productsIds = products;
        productsIds.push(productId);
    }

    localStorage.setItem('productsIds', JSON.stringify(productsIds));
    updateBasketCounter();
}

function updateBasketCounter() {
    const basketCounter = document.querySelector('.basket__counter')
    let products = JSON.parse(localStorage.getItem('productsIds'));
    let count = 0;
    
    if (products == null) {
        count = 0;
    } else {
        count = products.length;
    }

    basketCounter.innerHTML = count;
}

document.addEventListener('DOMContentLoaded', updateBasketCounter());

function renderCatalog() {
    const checkboxes = document.querySelectorAll('input[name=check-category]')
    const products = document.querySelectorAll('.catalog__item')
    let filter = []


    checkboxes.forEach(el => {
        if (el.checked) {
            filter.push(el.value)
        }
    })

    if (filter.length === 0) {
        products.forEach(product => {
            if (product.classList.contains('product__hidden')) {
                product.classList.remove('product__hidden')
            }
        })
        return true;
    }

    products.forEach(product => {
        product.classList.add('product__hidden')
        filter.forEach(el => {
            if (product.classList.contains(el)) {
                product.classList.remove('product__hidden')
            }
        })
    })
}