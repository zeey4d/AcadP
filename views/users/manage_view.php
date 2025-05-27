   <?php require('views/partials/head.php') ?>
  <?php require('views/partials/nav.php') ?>
  <?php require('views/partials/header.php') ?>
    <?php require('views/partials/adminBar.php') ?>

<h2>قائمة المستخدمين</h2>
<a href="/users/create">إضافة مستخدم جديد</a>
<table>
<tr><th>ID</th><th>اسم المستخدم</th><th>البريد</th><th>الجامعة</th><th>الإجراءات</th></tr>
<?php foreach ($users as $user): ?>
<tr>
    <td><?= $user['user_id'] ?></td>
    <td><?= htmlspecialchars($user['first_name']) ?></td>
    <td><?= htmlspecialchars($user['email']) ?></td>
    <td><?= htmlspecialchars($user['university']) ?></td>
    <td>
        <a href="/users/edit/<?= $user['id'] ?>">تعديل</a> |
        <a href="/users/delete/<?= $user['id'] ?>" onclick="return confirm('هل أنت متأكد؟')">حذف</a>
    </td>
</tr>
<?php endforeach; ?>
</table>


<?php require('views/partials/footer.php') ?> 