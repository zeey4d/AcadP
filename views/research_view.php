<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/header.php') ?>
<?php require('views/partials/adminBar.php') ?>


    <section class="favorites-section" style="margin-top: 100px;">
        <div class="container">
            <div class="section-header">
                <h1 class="section-title"><i class="fas fa-bookmark"></i> الأبحاث </h1>
                <!-- <div class="actions">
                    <div class="search-box">
                        <input type="text" placeholder="ابحث في المفضلة...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                    <div class="sort-options">
                        <select>
                            <option value="date">ترتيب حسب التاريخ</option>
                            <option value="title">ترتيب حسب العنوان</option>
                            <option value="category">ترتيب حسب التصنيف</option>
                            <option value="rating">ترتيب حسب التقييم</option>
                        </select>
                    </div>
                </div> -->
            </div>

            <!-- <div class="filters">
                <div class="filter-tags">
                    <span class="filter-tag active">الكل <span class="count">(12)</span></span>
                    <span class="filter-tag">علوم الحاسب <span class="count">(5)</span></span>
                    <span class="filter-tag">العلوم الطبية <span class="count">(3)</span></span>
                    <span class="filter-tag">الهندسة <span class="count">(2)</span></span>
                    <span class="filter-tag">العلوم الإنسانية <span class="count">(2)</span></span>
                </div>
                <button class="btn filter-btn"><i class="fas fa-sliders-h"></i> المزيد من الفلاتر</button>
            </div> -->

            <form method="GET" action="/research" class="filter-form" style="margin-bottom: 20px;">
    <div style="display: flex; flex-wrap: wrap; gap: 15px; align-items: flex-end;">
        
        <!-- التصنيف -->
        <div>
            <label for="category_id">التصنيف:</label><br>
            <select name="category_id" id="category_id">
                <option value="">-- الكل --</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['category_id'] ?>" 
                        <?= isset($_GET['category_id']) && $_GET['category_id'] == $category['category_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($category['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- عنوان البحث -->
        <div>
            <label for="title">عنوان البحث:</label><br>
            <input type="text" name="title" id="title" value="<?= htmlspecialchars($_GET['title'] ?? '') ?>">
        </div>

        <!-- حالة النشر -->
        <div>
            <label for="is_published">حالة النشر:</label><br>
            <select name="is_published" id="is_published">
                <option value="">-- الكل --</option>
                <option value="1" <?= isset($_GET['is_published']) && $_GET['is_published'] === '1' ? 'selected' : '' ?>>منشور</option>
                <option value="0" <?= isset($_GET['is_published']) && $_GET['is_published'] === '0' ? 'selected' : '' ?>>غير منشور</option>
            </select>
        </div>

        <!-- من تاريخ -->
        <div>
            <label for="date_from">من تاريخ:</label><br>
            <input type="date" name="date_from" id="date_from" value="<?= htmlspecialchars($_GET['date_from'] ?? '') ?>">
        </div>

        <!-- إلى تاريخ -->
        <div>
            <label for="date_to">إلى تاريخ:</label><br>
            <input type="date" name="date_to" id="date_to" value="<?= htmlspecialchars($_GET['date_to'] ?? '') ?>">
        </div>

        <!-- زر التصفية -->
        <div>
            <button type="submit">تصفية</button>
            <a href="/research" style="margin-left: 10px;">إعادة تعيين</a>
        </div>
    </div>
</form>

    <section class="latest-research">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">أحدث الأبحاث المنشورة</h2>
            <a href="research-list.html" class="view-all">عرض الكل <i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="research-grid">

             <?php  foreach ($researches as $researche): ?>
            <div class="research-card">
                 <a href="/show?research_id=<?= htmlspecialchars($researche['research_id']) ?>">
                <div class="research-badge">
                    <span class="research-category"><?= htmlspecialchars($researche['category_name']) ?> </span>
                    <span class="research-status new">جديد</span>
                </div>
                <div class="research-thumbnail">
                    <img src="views/media/images/<?= htmlspecialchars($researche['thumbnail_url'] ?? "mg.png") ?>"  alt="صورة البحث">
                    <div class="research-overlay">
                        <a href="research-details.html" class="quick-view"><i class="fas fa-eye"></i> معاينة سريعة</a>
                    </div>
                </div>
                <div class="research-content">
                    <h3 class="research-title">
                        <a href="research-details.html"><?= htmlspecialchars($researche['title']) ?></a>
                    </h3>
                    <p class="research-author">
                        <a href="author-profile.html"><i class="fas fa-user"></i> د. أحمد محمد</a> - 
                        <a href="university.html"><i class="fas fa-university"></i> جامعة القاهرة</a>
                    </p>
                    <div class="research-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <h4><?= htmlspecialchars($researche['research_id']) ?></h4>
                        </div>
                    </div>
                    <p class="research-abstract"><?= htmlspecialchars($researche['abstract']) ?></p>
                    <div class="research-meta">
                        <span><i class="far fa-calendar-alt"></i><?= htmlspecialchars($researche['publication_date']) ?>  </span>
                        <span><i class="far fa-eye"></i> 1,245</span>
                        <span><i class="fas fa-download"></i> 328</span>
                        <span><i class="fas fa-quote-right"></i> 42</span>
                    </div>
                    <div class="research-actions">
                        <a href="/show?research_id=<?= htmlspecialchars($researche['research_id']) ?>" class="btn read-more">قراءة البحث</a>
                        <button class="btn-icon save-research" title="حفظ في المفضلة"><i class="far fa-bookmark"></i></button>
                        <button class="btn-icon share-research" title="مشاركة"><i class="fas fa-share-alt"></i></button>
                    </div>
                </div>
                </a>
            </div>
            <?php endforeach; ?>
                    </div>
    </div> 
     </section> 


    <?php if ($totalPages > 1): ?>
    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?= $i ?>" <?= $i == $page ? 'style="font-weight:bold;"' : '' ?>>
                <?= $i ?>
            </a>
        <?php endfor; ?>
    </div>
<?php endif; ?>

<!--

            <div class="pagination">
                <button class="page-btn disabled"><i class="fas fa-arrow-right"></i> السابق</button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn"><i class="fas fa-arrow-left"></i> التالي</button>
            </div>
        </div>
    </section> -->
    

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

        // فلترة الأبحاث حسب التصنيف
        const filterTags = document.querySelectorAll('.filter-tag');
        
        filterTags.forEach(tag => {
            tag.addEventListener('click', () => {
                filterTags.forEach(t => t.classList.remove('active'));
                tag.classList.add('active');
                // هنا يمكن إضافة كود الفلترة الفعلي
            });
        });

        // إزالة بحث من المفضلة
        const removeButtons = document.querySelectorAll('.remove-favorite');
        
        removeButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const researchCard = this.closest('.research-card');
                researchCard.classList.add('removing');
                setTimeout(() => {
                    researchCard.remove();
                    // يمكن هنا إضافة كود لإزالة البحث من المفضلة في قاعدة البيانات
                }, 300);
            });
        });
    </script>

<?php require('views/partials/footer.php') ?> 

