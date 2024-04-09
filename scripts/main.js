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