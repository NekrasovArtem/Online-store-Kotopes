<main>
    <?php if (isset($_GET['clientId'])): ?>
    <?php $currentUser = $KotoPes->getUserData($_GET['clientId']); ?>
    <section class="current__client">
        <img src="/images/users/<?= $currentUser['image'] ?>" alt="Аватарка">
        <h2><?= $currentUser['surname'] ?> <?= $currentUser['name'] ?> <?= $currentUser['patronymic'] ?></h2>
        <div class="client__info">
            <span>Почта: <?= $currentUser['email'] ?></span>
            <span>Телефон: <?= $currentUser['phone'] ?></span>
            <span>Адрес: <?= $currentUser['address'] ?></span>

        </div>
        <a href="?clients">Назад</a>
    </section>
    <?php else: ?>
    <?php $users = $KotoPes->getAllUsers(); ?>
    <section class="clients">
        <div class="clients__title">
            <h2>Пользователи</h2>
            <div>
                <input type="search" />
                <button>Поиск</button>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Имя</td>
                    <td>Фамилия</td>
                    <td>Отчество</td>
                    <td>Телефон</td>
                    <td>Почта</td>
                    <td>Подробнее</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['surname'] ?></td>
                    <td><?= $user['patronymic'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><a href="?template=clients&clientId=<?= $user['id'] ?>">Подробнее</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <?php endif; ?>
</main>