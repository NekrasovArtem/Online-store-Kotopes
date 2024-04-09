const basket = {
    data() {
        return {
            activePage: 'basket',
            products: null,
            originalPrice: 0,
            promoDiscount: 0,
            deliveryPrice: 0,
            promocodes: null,
            promocode: null,
            orderWay: 'point',
            orderAddress: 'г. Челябинск, д. 23',
            payMethod: 'online',
        }
    },
    created() {
        this.getProducts()
    },
    methods: {
        getProducts() {
            let productsIds = JSON.parse(localStorage.getItem('productsIds'));

            fetch('/core/products_in_basket.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(productsIds)
            })
            .then(response => response.json())
            .then(data => {
                this.products = data
                for (let i = 0; i < this.products.length; i++) {
                    this.originalPrice += this.products[i].price * this.products[i].count
                }
            })

            fetch('/core/get_promocodes.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                this.promocodes = data
            })
        },
        removeProduct(id) {
            let newProducts = [];

            for (let i = 0; i < this.products.length; i++) {
                if (this.products[i].id !== id) {
                    newProducts.push(this.products[i])
                }
            }

            this.products = newProducts

            let newProductsIds = [];
            let productsIds = JSON.parse(localStorage.getItem('productsIds'));
            for (const key in productsIds) {
                if (productsIds[key] != id) {
                    newProductsIds.push(productsIds[key])
                }
            }
            localStorage.setItem('productsIds', JSON.stringify(newProductsIds))
            updateBasketCounter();

            this.originalPrice = 0
            for (let i = 0; i < this.products.length; i++) {
                this.originalPrice += this.products[i].price * this.products[i].count
            }
        },
        checkPromocode() {
            for (const key in this.promocodes) {
                if (this.promocode === this.promocodes[key].promo) {
                    this.promoDiscount = (this.promocodes[key].discount / 100).toFixed(2)
                    return true;
                }
            }

            this.promoDiscount = 0;
        },
        recalculatePrice() {
            this.originalPrice = 0
            for (let i = 0; i < this.products.length; i++) {
                this.originalPrice += this.products[i].price * this.products[i].count
            }
        },
        createOrder() {
            this.activePage = 'order'
        },
        changeOrderWay(way) {
            if (way === 'courier') {
                this.deliveryPrice = 199
            } else {
                this.deliveryPrice = 0
            }

            this.orderWay = way
        },
        sendOrder() {
            let userId = document.querySelector('#user-id').value
            let productsToOrder = []

            for (let i = 0; i < this.products.length; i ++) {
                productsToOrder.push({
                    'id': this.products[i].id,
                    'quantity': this.products[i].count,
                    'price': this.products[i].price,
                })
            }

            console.log({
                'id_user': userId,
                'status': 'waiting',
                'address': this.orderAddress,
                'order_type': this.orderWay,
                'pay_method': this.payMethod,
                'products': productsToOrder,
                'date': new Date(),
            });

            // fetch('./core/send_order.php', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json'
            //     },
            //     body: JSON.stringify({
            //         'id_user': userId,
            //         'status': 'waiting',
            //         'address': this.orderAddress,
            //         'order_type': this.orderWay,
            //         'pay_method': this.payMethod,
            //         'products': productsToOrder,
            //         'date': new Date(),
            //     })
            // })
            // .then(response => response.json())
            // .then(data => {
            //     console.log(data)
            // })

            // localStorage.removeItem('productsIds')
            // updateBasketCounter()
        }
    },
}

Vue.createApp(basket).mount('#basket');