   <?php require('views/partials/head.php') ?>
  <?php require('views/partials/nav.php') ?>
  <?php require('views/partials/header.php') ?>
    <?php require('views/partials/adminBar.php') ?>

        <style>
        body {
            direction: rtl;
            padding: 20px;
            background: #f4f4f4;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #2c3e50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
            font-size: 20px;
        }
    </style>
    <div style="margin: 150px 0 150px 0 ; ">
<h2>قائمة المستخدمين</h2>
<a href="/users/create">إضافة مستخدم جديد</a>
<table>
<tr><th>ID</th><th>اسم المستخدم</th><th>البريد</th><th>الجامعة</th><th>الإجراءات</th></tr>
<?php foreach ($users as $user): ?>
<tr>
    <td><?= $user['user_id'] ?></td>
    <td><?= htmlspecialchars($user['username']) ?></td>
    <td><?= htmlspecialchars($user['email']) ?></td>
    <td><?= htmlspecialchars($user['university']) ?></td>
    <td><?= htmlspecialchars($user['department']) ?></td>
    <td>
        <a href="users_edit?id=<?= $user['user_id'] ?>" class="button">تعديل</a>
        <a href="users_delete?id=<?= $user['user_id'] ?>" class="button delete" onclick="return confirm('هل أنت متأكد من حذف هذا المستخدم؟');">حذف</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

</div >


<?php require('views/partials/footer.php') ?> 