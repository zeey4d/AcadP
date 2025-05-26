   <?php require('views/partials/head.php') ?>
   <?php require('views/partials/nav.php') ?>
   <?php require('views/partials/header.php') ?>
   <?php require('views/partials/adminBar.php') ?>
   <!-- <section class="manage-research" style="margin-top: 100px;">
        <div class="container">
            <div class="page-header">
                <h1><i class="fas fa-tasks"></i> إدارة الأبحاث</h1>
                <nav class="breadcrumb">
                    <a href="index.html">الرئيسية</a>
                    <span>/</span>
                    <a href="profile.html">حسابي</a>
                    <span>/</span>
                    <span>إدارة الأبحاث</span>
                </nav>
            </div>

            <div class="research-actions">
                <a href="/create" class="btn primary"><i class="fas fa-plus"></i> إضافة بحث جديد</a>
                <div class="search-filter">
                    <input type="text" id="searchResearch" placeholder="ابحث في أبحاثك...">
                    <select id="filterStatus">
                        <option value="">كل الحالات</option>
                        <option value="published">منشور</option>
                        <option value="under_review">قيد التحكيم</option>
                        <option value="draft">مسودة</option>
                        <option value="rejected">مرفوض</option>
                    </select>
                </div>
            </div>

            <div class="research-table-container">
                <table id="researchTable" class="display">
                    <thead>
                        <tr>
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
                        <tr>
                            <td>
                                <a href="research-details.html">تطوير خوارزميات التعلم العميق لتحليل الصور الطبية</a>
                            </td>
                            <td>المجلة الدولية للذكاء الاصطناعي في الطب</td>
                            <td><span class="status-badge published">منشور</span></td>
                            <td>15/05/2023</td>
                            <td>1,245</td>
                            <td>328</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon edit" title="تعديل"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon stats" title="الإحصائيات"><i class="fas fa-chart-bar"></i></button>
                                    <button class="btn-icon delete" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="research-details.html">تأثير النظام الغذائي على مقاومة الإنسولين</a>
                            </td>
                            <td>مجلة الدراسات الطبية المتقدمة</td>
                            <td><span class="status-badge under-review">قيد التحكيم</span></td>
                            <td>10/05/2023</td>
                            <td>890</td>
                            <td>210</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon edit" title="تعديل"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon stats" title="الإحصائيات"><i class="fas fa-chart-bar"></i></button>
                                    <button class="btn-icon delete" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="research-details.html">تصميم مواد نانوية لتحلية المياه بكفاءة عالية</a>
                            </td>
                            <td>المجلة العربية للهندسة والعلوم التطبيقية</td>
                            <td><span class="status-badge published">منشور</span></td>
                            <td>05/05/2023</td>
                            <td>1,532</td>
                            <td>412</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon edit" title="تعديل"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon stats" title="الإحصائيات"><i class="fas fa-chart-bar"></i></button>
                                    <button class="btn-icon delete" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="research-details.html">تحسين أداء خوارزميات تعلم الآلة باستخدام تقنيات التعلم التعزيزي</a>
                            </td>
                            <td>مجلة علوم الحاسوب والتقنيات الحديثة</td>
                            <td><span class="status-badge rejected">مرفوض</span></td>
                            <td>20/04/2023</td>
                            <td>210</td>
                            <td>58</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon edit" title="تعديل"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon stats" title="الإحصائيات"><i class="fas fa-chart-bar"></i></button>
                                    <button class="btn-icon delete" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="research-details.html">تأثير التغيرات المناخية على انتشار الأمراض المعدية</a>
                            </td>
                            <td>-</td>
                            <td><span class="status-badge draft">مسودة</span></td>
                            <td>10/04/2023</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-icon edit" title="تعديل"><i class="fas fa-edit"></i></button>
                                    <button class="btn-icon stats" title="الإحصائيات"><i class="fas fa-chart-bar"></i></button>
                                    <button class="btn-icon delete" title="حذف"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

             نموذج حذف البحث (مخفى بشكل افتراضي) 
            <div id="deleteModal" class="modal">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>تأكيد الحذف</h3>
                        <button class="close-modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>هل أنت متأكد أنك تريد حذف هذا البحث؟ هذا الإجراء لا يمكن التراجع عنه.</p>
                        <p><strong>عنوان البحث:</strong> <span id="researchToDelete"></span></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn cancel-btn">إلغاء</button>
                        <button class="btn danger-btn">حذف البحث</button>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

   <section class="manage-research" style="margin-top: 100px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
       <div class="container">
           <div class="page-header" style="margin-bottom: 30px;">
               <h1 style="font-size: 28px; color: #333;"><i class="fas fa-tasks"></i> إدارة الأبحاث</h1>
               <nav class="breadcrumb" style="color: #888; font-size: 14px;">
                   <a href="index.html">الرئيسية</a> <span>/</span>
                   <a href="profile.html">حسابي</a> <span>/</span>
                   <span>إدارة الأبحاث</span>
               </nav>
           </div>



           <div class="research-actions" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; flex-wrap: wrap; gap: 10px;">
               <a href="/create" class="btn primary" style="background-color: #007bff; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
                   <i class="fas fa-plus"></i> إضافة بحث جديد
               </a>
               <a href="#" class="btn primary" style="background-color: #28a745; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
                   <i class="fas fa-eye"></i> عرض البحث
               </a>
               <a href="#" class="btn primary" style="background-color: #ffc107; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
                   <i class="fas fa-edit"></i> تعديل البحث
               </a>
               <a href="#" class="btn primary" id="openDeleteModalBtn" style="background-color: #dc3545; color: white; padding: 8px 15px; border-radius: 5px; text-decoration: none;">
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
                       <?php
                        // جلب الأبحاث من قاعدة البيانات
                        $stmt = $pdo->query("SELECT * FROM researches ORDER BY created_at DESC");
                        $researches = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        ?>

                       <?php foreach ($researches as $research): ?>
                           <tr>
                               <td><input type="checkbox" class="select-research"></td>

                               <!-- صورة مصغرة -->
                               <td>
                                   <img src="views/media/images/<?= htmlspecialchars($research['thumbnail_url'] ?? 'default.png') ?>"
                                       alt="صورة البحث" class="research-thumbnail" loading="lazy" width="80">
                               </td>

                               <!-- عنوان البحث مع خيارات -->
                               <td>
                                   <?= htmlspecialchars($research['title']) ?>
                                   <nav class="options">
                                       <ul>
                                           <li>
                                               <form action="/researches_show" method="get">
                                                   <input type="hidden" name="research_id" value="<?= htmlspecialchars($research['research_id']) ?>">
                                                   <button type="submit" aria-label="عرض">عرض</button>
                                               </form>
                                           </li>
                                           <li>
                                               <form action="/researches_edit" method="get">
                                                   <input type="hidden" name="research_id" value="<?= htmlspecialchars($research['research_id']) ?>">
                                                   <button type="submit" aria-label="تعديل">تعديل</button>
                                               </form>
                                           </li>
                                           <li>
                                               <form action="/researches_destroy" method="post">
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <input type="hidden" name="research_id" value="<?= htmlspecialchars($research['research_id']) ?>">
                                                   <button type="submit" aria-label="حذف">حذف</button>
                                               </form>
                                           </li>
                                       </ul>
                                   </nav>
                               </td>

                               <!-- ملخص البحث -->
                               <td><?= htmlspecialchars(mb_strimwidth($research['abstract'], 0, 100, '...')) ?></td>

                               <!-- تاريخ النشر -->
                               <td><?= htmlspecialchars($research['publication_date']) ?></td>

                               <!-- عدد الصفحات -->
                               <td><?= htmlspecialchars($research['page_count']) ?></td>
                           </tr>
                       <?php endforeach; ?>

                   </tbody>
               </table>
           </div>

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
               order: [
                   [3, 'desc']
               ]
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