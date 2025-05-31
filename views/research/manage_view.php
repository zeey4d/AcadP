   <?php require('views/partials/head.php') ?>
  <?php require('views/partials/nav.php') ?>
  <?php require('views/partials/header.php') ?>
    <?php require('views/partials/adminBar.php') ?>

    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
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
      <a href="/create" class="btn primary" style="background-color: #007bff; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
        <i class="fas fa-plus"></i> إضافة بحث جديد
      </a>
        
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
                        <a href="/show?research_id=<?= htmlspecialchars($research['research_id']) ?>" class="btn btn-view">عرض التفاصيل</a>
                        <!-- <a href="/create" class="btn primary" style="background-color: #007bff; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
        <i class="fas fa-plus"></i> إضافة بحث جديد
      </a>
                        <a href="/research_view.php?id=<//?= $research['research_id'] ?>" class="btn btn-view">عرض التفاصيل</a> -->
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

    <!-- <div class="research-actions" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
      <a href="/create" class="btn primary" style="background-color: #007bff; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
        <i class="fas fa-plus"></i> إضافة بحث جديد
      </a>
        
    <a href="#" class="btn" style="background-color: #28a745; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
      <i class="fas fa-eye"></i> عرض البحث
    </a>
    <a href="#" class="btn" style="background-color: #ffc107; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
      <i class="fas fa-edit"></i> تعديل البحث
    </a>
    <a href="#" class="btn" id="openDeleteModalBtn" style="background-color: #dc3545; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
      <i class="fas fa-trash-alt"></i> حذف البحث
    </a>
      <div class="search-filter" style="display: flex; gap: 10px;">
        <input type="text" id="searchResearch" placeholder="ابحث في أبحاثك..." style="padding: 6px 10px; border: 1px solid #ccc; border-radius: 4px;">
        <select id="filterStatus" style="padding: 6px 10px; border: 1px solid #ccc; border-radius: 4px;">
          <option value="">كل الحالات</option>
          <option value="published">منشور</option>
          <option value="under_review">قيد التحكيم</option>
          <option value="draft">مسودة</option>
          <option value="rejected">مرفوض</option>
        </select>
      </div>
    </div>

    <div class="research-table-container" style="overflow-x: auto;">
      <table id="researchTable" class="display" style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr style="background-color: #f1f1f1;">
            <th>عنوان البحث</th>
            <th>المجلة</th>
            <th>الحالة</th>
            <th>تاريخ الإضافة</th>
            <th>المشاهدات</th>
            <th>التحميلات</th>
            <th>الإجراءات</th>
          </tr>
        </thead>
        <tbody>
          <!-- البيانات كما هي... (بإمكانك تحسين كل <tr> إن رغبت) -->


<!--           
        </tbody>
      </table>
    </div> --> 

    <!-- نموذج حذف البحث -->
    <div id="deleteModal" class="modal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.6); justify-content: center; align-items: center;">
      <div class="modal-content" style="background: white; padding: 20px; border-radius: 8px; width: 90%; max-width: 500px;">
        <div class="modal-header" style="display: flex; justify-content: space-between; align-items: center;">
          <h3 style="margin: 0;">تأكيد الحذف</h3>
          <button class="close-modal" style="background: transparent; border: none; font-size: 20px;">&times;</button>
        </div>
        <div class="modal-body" style="margin-top: 15px;">
          <p>هل أنت متأكد أنك تريد حذف هذا البحث؟ هذا الإجراء لا يمكن التراجع عنه.</p>
          <p><strong>عنوان البحث:</strong> <span id="researchToDelete" style="color: red;"></span></p>
        </div>
        <div class="modal-footer" style="margin-top: 20px; display: flex; justify-content: flex-end; gap: 10px;">
          <button class="btn cancel-btn" style="padding: 6px 12px; background: #ccc; border: none; border-radius: 4px;">إلغاء</button>
          <button class="btn danger-btn" style="padding: 6px 12px; background: #dc3545; color: white; border: none; border-radius: 4px;">حذف البحث</button>
        </div>
      </div>
    </div>
  </div>
</section>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        // تفعيل القائمة المنسدلة للمستخدم
        const userAvatar = document.querySelector('.user-avatar');
        const dropdownMenu = document.querySelector('.dropdown-menu');

        userAvatar.addEventListener('click', () => {
            dropdownMenu.classList.toggle('show');
        });

        // إغلاق القائمة عند النقر خارجها
        document.addEventListener('click', (e) => {
            if (!userAvatar.contains(e.target)) {
                dropdownMenu.classList.remove('show');
            }
        });

        // تفعيل جدول الأبحاث
        $(document).ready(function() {
            $('#researchTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.11.5/i18n/ar.json'
                },
                responsive: true,
                order: [[3, 'desc']]
            });

            // البحث والتصفية
            $('#searchResearch').on('keyup', function() {
                $('#researchTable').DataTable().search(this.value).draw();
            });

            $('#filterStatus').on('change', function() {
                $('#researchTable').DataTable().column(2).search(this.value).draw();
            });
        });

        // إدارة النموذج المنبثق للحذف
        const deleteButtons = document.querySelectorAll('.btn-icon.delete');
        const deleteModal = document.getElementById('deleteModal');
        const closeModal = document.querySelector('.close-modal');
        const cancelBtn = document.querySelector('.cancel-btn');
        const researchToDelete = document.getElementById('researchToDelete');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const researchTitle = this.closest('tr').querySelector('td a').textContent;
                researchToDelete.textContent = researchTitle;
                deleteModal.style.display = 'block';
            });
        });

        closeModal.addEventListener('click', () => {
            deleteModal.style.display = 'none';
        });

        cancelBtn.addEventListener('click', () => {
            deleteModal.style.display = 'none';
        });

        window.addEventListener('click', (e) => {
            if (e.target === deleteModal) {
                deleteModal.style.display = 'none';
            }
        });

        // هنا يمكنك إضافة كود الحذف الفعلي عند النقر على زر الحذف
        document.querySelector('.danger-btn').addEventListener('click', function() {
            alert('تم حذف البحث بنجاح');
            deleteModal.style.display = 'none';
            // هنا يمكنك إضافة كود AJAX لحذف البحث من قاعدة البيانات
        });
    </script>

<?php require('views/partials/footer.php') ?> 