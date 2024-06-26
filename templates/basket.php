<main id="basket">
    <section class="basket" v-if="activePage === 'basket'">
        <h2>Корзина</h2>
        <div class="basket__wrapper">
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
    </section>
    <section class="order" v-if="activePage === 'order'">
        <h2>Оформление заказа</h2>
        <div class="order__wrapper">
            <div class="order__left">
                <div class="order__way">
                    <h3>Способ получения:</h3>
                    <label for="order-way-1"><input type="radio" name="order-way" id="order-way-1" v-on:change="changeOrderWay('point')" checked />Пункт выдачи</label>
                    <label for="order-way-2"><input type="radio" name="order-way" id="order-way-2" v-on:change="changeOrderWay('courier')" />Курьером | 199 руб.</label>
                </div>
                <div class="order__address" v-show="orderWay === 'point'">
                    <h3>Адрес пункта выдачи: ул. Российская, д23</h3>
                    <div class="order__address-point">
                        <a href="https://yandex.ru/maps/org/gbpou_chelyabinskiy_energeticheskiy_kolledzh_im_s_m_kirova/1155234567/?utm_medium=mapframe&utm_source=maps" 
                            style="color:#eee;font-size:12px;position:absolute;top:0px;">
                            ГБПОУ Челябинский энергетический колледж им. С. М. Кирова
                        </a>
                        <a href="https://yandex.ru/maps/56/chelyabinsk/category/college/184106236/?utm_medium=mapframe&utm_source=maps" 
                            style="color:#eee;font-size:12px;position:absolute;top:14px;">
                            Колледж в Челябинске
                        </a>
                        <iframe src="https://yandex.ru/map-widget/v1/?ll=61.407669%2C55.177041&mode=search&oid=1155234567&ol=biz&z=13.6"
                            allowfullscreen="true" style="position:relative;">
                        </iframe>
                    </div>
                </div>
                <div class="order__address" v-show="orderWay === 'courier'">
                    <h3>Курьером</h3>
                    <input type="text" placeholder="Адрес" v-model="orderAddress" />
                </div>
            </div>
            <div class="order__middle">
                <div class="order__recipient">
                    <h3>Ваши данные:</h3>
                    <?php
                    $user = $KotoPes->getUserData($_SESSION['id']);
                    ?>
                    <div class="order__recipient-data">
                        <input type="hidden" name="" id="user-id" value="<?= $_SESSION['id'] ?>" />
                        <input type="text" name="" id="" placeholder="Фамилия" value="<?= $user['surname'] ?>" readonly />
                        <input type="text" name="" id="" placeholder="Имя" value="<?= $user['name'] ?>" readonly />
                        <input type="tel" name="" id="" placeholder="Телефон" value="<?= $user['phone'] ?>" readonly />
                        <input type="email" name="" id="" placeholder="Почта" value="<?= $user['email'] ?>" readonly />
                        <!-- <input type="text" name="" id="" placeholder="Адрес" value="<?= $user['address'] ?>" readonly /> -->
                    </div>
                    <span>Сообщим статус заказа уведомлением на почту</span>
                </div>
            </div>
            <div class="order__right">
                <div class="order__pay-method">
                    <h3>Способ оплаты:</h3>
                    <label for="pay-method-1"><input type="radio" name="pay-method" id="pay-method-1" v-on:change="payMethod = 'online'" checked />Онлайн картой</label>
                    <label for="pay-method-2"><input type="radio" name="pay-method" id="pay-method-1" v-on:change="payMethod = 'inpoint'" />Картой при получении</label>
                </div>
                <div class="order__pay">
                    <h3>Ваш заказ:</h3>
                    <div>
                        <span>Стоимость:</span>
                        <span>{{ originalPrice }} руб.</span>
                    </div>
                    <div>
                        <span>Доставка:</span>
                        <span>{{ +deliveryPrice }} руб.</span>
                    </div>
                    <div>
                        <span>Скидка:</span>
                        <span>{{ (+originalPrice * +promoDiscount).toFixed(2) }} руб.</span>
                    </div>
                    <div>
                        <span>Итого: </span>
                        <span>{{ (+originalPrice) - (+originalPrice * +promoDiscount).toFixed(2) + (+deliveryPrice) }} руб.</span>
                    </div>
                    <div>
                        <button v-on:click="activePage = 'basket'">Назад</button>
                        <button v-on:click="sendOrder()">Оплатить</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="basket__empty" v-if="activePage === 'emptybasket'">
        <h2>Корзина пуста</h2>
        <img src="/images/empty-basket.webp" alt="Пустая корзина">
    </section>
</main>