<main>
    <section class="basket" id="basket">
        <h2>Корзина</h2>
        <div class="basket__delete">
            <label for="select-all">
                <input type="checkbox" name="" id="select-all" />
                Выбрать всё
            </label>
            <button id="btn-get">Удалить выбранные</button>
        </div>
        <div class="basket__wrapper" v-if="activePage === 'basket'">
            <div class="basket__items">
                <div class="basket__item" v-for="(item, index) in products" key="item">
                    <div class="basket__item-image">
                        <img :src="'/images/products/' + item.url" alt="Фото товара" />
                    </div>
                    <div class="basket__item-info">
                        <div class="basket__item-name">
                            <h3>{{ item.name }}</h3>
                            <div class="basket__item-delete">
                                <button type="button" @click="removeProduct(item.id)"><img src="<?= $sitePath ?>/images/icon-trashcan.svg" alt="Удалить"></button>
                            </div>
                        </div>
                        <div class="basket__item-description">
                            <p>{{ item.description.slice(0, 160) }}...</p>
                        </div>
                        <div class="basket__item-price">
                            <span>Кол-во: <input type="number" v-on:change="recalculatePrice()" v-model="item.count" min="1" max="5" /></span>
                            <span>{{ item.price }} руб./шт</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="basket__form">
                <h3>Ваш заказ</h3>
                <div class="basket__form-price">
                    <span>Итого:</span>
                    <span>{{ +originalPrice - (+originalPrice * +promoDiscount).toFixed(2) }} руб.</span>
                </div>
                <input type="text" name="promocode" id="promocode" placeholder="Промокод" v-on:change="checkPromocode" v-model="promocode" />
                <button name="createOrder" @click="createOrder()">Оформить заказ</button>
                <span>Доставка в течение 3 дней</span>
            </div>
        </div>
        <div v-if="activePage === 'order'">
            <h1>Ваш заказ</h1>
        </div>
    </section>
</main>