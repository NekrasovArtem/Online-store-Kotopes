const basket = {
  data() {
    return {
      activePage: "basket",
      products: null,
      originalPrice: 0,
      promoDiscount: 0,
      deliveryPrice: 0,
      promocodes: null,
      promocode: null,
      orderWay: "point",
      orderAddress: "г. Челябинск, д. 23",
      payMethod: "online",
    };
  },
  created() {
    this.getProducts();
  },
  methods: {
    getProducts() {
      let productsIds = JSON.parse(localStorage.getItem("productsIds"));
      
      if (productsIds === null || productsIds.length === 0) {
        this.activePage = "emptybasket";
      } else {
        fetch("/core/products_in_basket.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(productsIds),
        })
          .then((response) => response.json())
          .then((data) => {
            this.products = data;
            for (let i = 0; i < this.products.length; i++) {
              this.originalPrice +=
                this.products[i].price * this.products[i].count;
            }
          });

        fetch("/core/get_promocodes.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
        })
          .then((response) => response.json())
          .then((data) => {
            this.promocodes = data;
          });
      }
    },
    removeProduct(id) {
      let newProducts = [];

      for (let i = 0; i < this.products.length; i++) {
        if (this.products[i].id !== id) {
          newProducts.push(this.products[i]);
        }
      }

      this.products = newProducts;

      let newProductsIds = [];
      let productsIds = JSON.parse(localStorage.getItem("productsIds"));
      for (const key in productsIds) {
        if (productsIds[key] != id) {
          newProductsIds.push(productsIds[key]);
        }
      }
      localStorage.setItem("productsIds", JSON.stringify(newProductsIds));
      updateBasketCounter();

      this.originalPrice = 0;
      for (let i = 0; i < this.products.length; i++) {
        this.originalPrice += this.products[i].price * this.products[i].count;
      }
    },
    checkPromocode() {
      for (const key in this.promocodes) {
        if (this.promocode === this.promocodes[key].promo) {
          this.promoDiscount = (this.promocodes[key].discount / 100).toFixed(2);
          return true;
        }
      }

      this.promoDiscount = 0;
    },
    recalculatePrice() {
      this.originalPrice = 0;
      for (let i = 0; i < this.products.length; i++) {
        this.originalPrice += this.products[i].price * this.products[i].count;
      }
    },
    createOrder() {
      this.activePage = "order";
    },
    changeOrderWay(way) {
      if (way === "courier") {
        this.deliveryPrice = 199;
      } else {
        this.deliveryPrice = 0;
      }

      this.orderWay = way;
    },
    getRandomInt(min, max) {
      min = Math.ceil(min);
      max = Math.floor(max);
      return Math.floor(Math.random() * (max - min + 1)) + min;
    },
    sendOrder() {
      let userId = document.querySelector("#user-id").value;
      let productsToOrder = [];
      let orderId = "";
      const chars =
        "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

      for (let i = 0; i < 16; i++) {
        orderId += chars[this.getRandomInt(0, chars.length)];
      }

      for (let i = 0; i < this.products.length; i++) {
        productsToOrder.push({
          id_order: orderId,
          id_user: userId,
          status: "waiting",
          address: this.orderAddress,
          order_type: this.orderWay,
          pay_method: this.payMethod,
          id_product: this.products[i].id,
          quantity: this.products[i].count,
          price: this.products[i].price,
          date: new Date(),
          order_price:
            this.originalPrice -
            (this.originalPrice * this.promoDiscount).toFixed(2) +
            this.deliveryPrice,
        });
      }

      fetch("/core/send_order.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(productsToOrder),
      })
        .then((response) => response.json())
        .then((data) => {
          localStorage.setItem("productsIds", null);
          updateBasketCounter();
          location.reload();
        });
    },
  },
};

Vue.createApp(basket).mount("#basket");
