   <?php require('views/partials/head.php') ?>
  <?php require('views/partials/nav.php') ?>
  <?php require('views/partials/header.php') ?>
    <?php require('views/partials/adminBar.php') ?>

    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --text-color: #333;
            --light-text: #666;
            --background-color: #f5f7fa;
            --card-bg: #ffffff;
            --border-color: #e0e0e0;
            --success-color: #2ecc71;
            --danger-color: #e74c3c;
            --warning-color: #f39c12;
        }
        

        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            direction: rtl;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        h1 {
            text-align: center;
            color: var(--primary-color);
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-color);
            font-weight: 600;
        }
        
        .card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }
        
        .card h3 {
            margin: 0 0 15px;
            color: var(--primary-color);
            font-size: 1.3rem;
            font-weight: 600;
        }
        
        .card p {
            margin: 8px 0;
            color: var(--light-text);
        }
        
        .card p strong {
            color: var(--text-color);
            font-weight: 600;
        }
        
        .card-actions {
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px dashed var(--border-color);
            display: flex;
            gap: 15px;
        }
        
        .btn {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 0.9rem;
        }
        
        .btn-view {
            background-color: var(--primary-color);
            color: white;
        }
        
        .btn-edit {
            background-color: var(--warning-color);
            color: white;
        }
        
        .btn-delete {
            background-color: var(--danger-color);
            color: white;
        }
        
        .btn:hover {
            opacity: 0.9;
            transform: translateY(-2px);
        }
        
        .status {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-published {
            background-color: rgba(46, 204, 113, 0.2);
            color: var(--success-color);
        }
        
        .status-unpublished {
            background-color: rgba(231, 76, 60, 0.2);
            color: var(--danger-color);
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 5px;
        }
        
        .pagination a {
            padding: 8px 14px;
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 4px;
            color: var(--primary-color);
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .pagination a:hover,
        .pagination a.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }
        
        .empty-state {
            text-align: center;
            padding: 40px;
            color: var(--light-text);
        }
        
        .empty-state i {
            font-size: 3rem;
            color: var(--border-color);
            margin-bottom: 15px;
        }
        
        @media (max-width: 768px) {
            .card-actions {
                flex-direction: column;
                gap: 10px;
            }
            
            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
    <div class="container" style="margin-top: 150px;">
        <h1>إدارة الأبحاث</h1>
        
        <?php if (empty($researches)): ?>
            <div class="empty-state">
                <i>📄</i>
                <h3>لا توجد أبحاث متاحة</h3>
                <p>لم يتم إضافة أي أبحاث بعد. يمكنك البدء بإضافة بحث جديد.</p>
            </div>
        <?php else: ?>
            <?php foreach ($researches as $research): ?>
                <div class="card">
                    <h3><?= htmlspecialchars($research['title']) ?></h3>
                    <p><strong>الملخص:</strong> <?= htmlspecialchars(mb_substr($research['abstract'], 0, 150)) ?>...</p>
                    <p><strong>تاريخ النشر:</strong> <?= htmlspecialchars($research['publication_date']) ?></p>
                    <p><strong>الحالة:</strong> 
                        <span class="status status-<?= $research['is_published'] ? 'published' : 'unpublished' ?>">
                            <?= $research['is_published'] ? 'منشور' : 'غير منشور' ?>
                        </span>
                    </p>
                    <div class="card-actions">
                        <a href="/research_view.php?id=<?= $research['research_id'] ?>" class="btn btn-view">عرض التفاصيل</a>
                        <a href="/research_edit?id=<?= $research['research_id'] ?>" class="btn btn-edit">تعديل البحث</a>
                        <a href="/research_delete?id=<?= $research['research_id'] ?>" class="btn btn-delete" onclick="return confirm('هل أنت متأكد من رغبتك في حذف هذا البحث؟')">حذف البحث</a>
                    </div>
                </div>
            <?php endforeach; ?>
            
            <?php if ($totalPages > 1): ?>
                <div class="pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

<?php require('views/partials/footer.php') ?> 