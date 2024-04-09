const basket = {
    data() {
        return {
            products: null
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
        }
    },
}

Vue.createApp(basket).mount('#basket');