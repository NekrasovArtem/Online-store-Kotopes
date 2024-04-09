<main>
    <?php if (isset($_GET['editable']) && $_GET['editable'] === 'true'): ?>
        <section>
            <form method="post" enctype="multipart/form-data">
                <div class="form__group">
                    <label for="image">Аватарка:</label>
                    <input type="file" id="image" name="image" value="<?= $user['image'] ?>" />
                </div>
                <div class="form__group">
                    <label for="name">Имя:</label>
                    <input type="text" id="name" name="name" value="<?= $user['name'] ?>" />
                </div>
                <div class="form__group">
                    <label for="surname">Фамилия:</label>
                    <input type="text" id="surname" name="surname" value="<?= $user['surname'] ?>" />
                </div>
                <div class="form__group">
                    <label for="patronymic">Отчество:</label>
                    <input type="text" id="patronymic" name="patronymic" value="<?= $user['patronymic'] ?>" />
                </div>
                <div class="form__group">
                    <label for="phone">Телефон:</label>
                    <input type="tel" id="phone" name="phone" value="<?= $user['phone'] ?>" />
                </div>
                <div class="form__group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" value="<?= $user['email'] ?>" />
                </div>
                <div class="form__group">
                    <label for="address">Адрес:</label>
                    <input type="text" id="address" name="address" value="<?= $user['address'] ?>" />
                </div>
                <button type="submit" name="userEdit">Сохранить</button>
                <a href="/profile">Отмена</a>
            </form>
        </section>
    <?php else: ?>
        <section class="profile__user">
            <div class="profile__info">
                <div class="profile__image">
                    <img src="/images/users/<?= $user['image'] ?>" alt='Аватарка' />
                </div>
                <div class="profile__credentials">
                    <div class="credentials__group">
                        <label for="name">Имя:</label>
                        <input type="text" id="name" value="<?= $user['name'] ?>" disabled>
                    </div>
                    <div class="credentials__group">
                        <label for="surname">Фамилия:</label>
                        <input type="text" id="surname" value="<?= $user['surname'] ?>" disabled>
                    </div>
                    <div class="credentials__group">
                        <label for="patronymic">Отчество:</label>
                        <input type="text" id="patronymic" value="<?= $user['patronymic'] ?>" disabled>
                    </div>
                    <div class="credentials__group">
                        <label for="phone">Телефон:</label>
                        <input type="text" id="phone" value="<?= $user['phone'] ?>" disabled>
                    </div>
                    <div class="credentials__group">
                        <label for="email">E-mail:</label>
                        <input type="text" id="email" value="<?= $user['email'] ?>" disabled>
                    </div>
                    <div class="credentials__group">
                        <label for="address">Адрес:</label>
                        <input type="text" id="address" value="<?= $user['address'] ?>" disabled>
                    </div>
                </div>
            </div>
            <div class="profile__buttons">
                <?php if ($user['role'] === 'admin'): ?>
                    <a href="/dashboard">AdminPanel</a>
                <?php endif; ?>
                <a href="?editable=true">Редактировать</a>
            </div>
        </section>
    <?php endif; ?>
    <div>
        <section class="profile__payments">
            <h3>Способы оплаты:</h3>
            <div class="payments__cards">
                <div class="bank-card">
                    <h4>Сбер банк</h4>
                    <span>**** **** **** 0000</span>
                    <span></span>
                </div>
            </div>
        </section>
        <div>
            <section class="profile__discount">
                <h3>Персональная скидка:</h3>
                <h3><?= $user['discount'] ?>%</h3>
            </section>
            <section class="profile__logout">
                <a href="/core/logout.php"><button>Выйти</button></a>
            </section>
        </div>
    </div>
</main>