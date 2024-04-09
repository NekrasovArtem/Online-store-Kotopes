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
        <form class="basket__wrapper">
            <div class="basket__items">
                <div class="basket__item" v-for="(item, index) in products" key="item">
                    <div class="basket__item-image">
                        <img :src="'/images/products/' + item.url" alt="Фото товара" />
                    </div>
                    <div class="basket__item-info">
                        <div class="basket__item-name">
                            <h3>{{ item.name }}</h3>
                            <div>
                                <input type="checkbox" />
                                <button type="button" @click="removeProduct(item.id)">{{item.id}}<img src="" alt="Удалить"></button>
                            </div>
                        </div>
                        <div class="basket__item-price">
                            <span>Кол-во: <input type="number" v-model="item.count" min="1" /></span>
                            <span>{{ item.price }} руб./шт</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="basket__form">
                <h3>Ваш заказ</h3>
                <div>
                    <span>1 товар</span>
                    <span>1000 руб.</span>
                </div>
                <input type="text" name="promocode" id="promocode" placeholder="Промокод" />
                <div>
                    <span>Итого:</span>
                    <span>1000 руб.</span>
                </div>
                <button type="submit" name="createOrder">Оформить заказ</button>
                <span>Доставка в течение 3 дней</span>
            </div>
        </form>
    </section>
</main>