   <?php require('partials/head.php') ?>
  <?php require('partials/nav.php') ?>
  <?php require('partials/header.php') ?>
    <?php require('partials/adminBar.php') ?>

    <section class="favorites-section" style="margin-top: 100px;">
        <div class="container">
            <div class="section-header">
                <h1 class="section-title"><i class="fas fa-bookmark"></i> الأبحاث المفضلة</h1>
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
<!-- 
            <div class="filters">
                <div class="filter-tags">
                    <span class="filter-tag active">الكل <span class="count">(12)</span></span>
                    <span class="filter-tag">علوم الحاسب <span class="count">(5)</span></span>
                    <span class="filter-tag">العلوم الطبية <span class="count">(3)</span></span>
                    <span class="filter-tag">الهندسة <span class="count">(2)</span></span>
                    <span class="filter-tag">العلوم الإنسانية <span class="count">(2)</span></span>
                </div>
                <button class="btn filter-btn"><i class="fas fa-sliders-h"></i> المزيد من الفلاتر</button>
            </div> -->

            <div class="favorites-grid">
                <!-- البحث الأول -->
                <?php foreach ($researches as $researche): ?>

                <div class="research-card favorite">
                    <div class="research-badge">
                        <span class="research-category">علوم الحاسب</span>
                        <span class="research-status new">جديد</span>
                    </div>
                    <div class="favorite-badge">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <div class="research-thumbnail">
                    <img src="views/media/images/<?= htmlspecialchars($researche['thumbnail_url'] ?? "mg.png") ?>"  alt="صورة البحث">
                        <div class="research-overlay">
                        <a href="research-details.html"><?= htmlspecialchars($researche['title']) ?></a>
                        </div>
                    </div>
                    <div class="research-content">
                        <h3 class="research-title">
                            <a href="research-details.html">تطوير خوارزميات التعلم العميق لتحليل الصور الطبية</a>
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
                            <span><i class="far fa-calendar-alt"></i> 15 مايو 2023</span>
                            <span><i class="fas fa-file-pdf"></i> PDF</span>
                            <span><i class="fas fa-language"></i> EN</span>
                        </div>
                        <div class="research-actions">
                        <a href="/show?research_id=<?= htmlspecialchars($researche['research_id']) ?>" class="btn read-more">قراءة البحث</a>
                            <!-- <button class="btn-icon remove-favorite" title="إزالة من المفضلة"><i class="fas fa-trash-alt"></i></button> -->
                                     <!-- زر حذف باستخدام JavaScript -->


                                         <!-- <form method="POST" action="/removefav" style="margin-top:10px;">
            <input type="hidden" name="research_id" value="<//?= $researche['research_id'] ?>">
            <button type="submit">🗑️ إزالة من المفضلة</button>
        </form> -->

        <button onclick="removeFromFavorites(<?= $researche['research_id'] ?>)">🗑️ إزالة من المفضلة</button>
                            <button class="btn-icon share-research" title="مشاركة"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>


                

                


                <!-- يمكن إضافة المزيد من الأبحاث هنا -->
            </div>

            <div class="pagination">
                <button class="page-btn disabled"><i class="fas fa-arrow-right"></i> السابق</button>
                <button class="page-btn active">1</button>
                <button class="page-btn">2</button>
                <button class="page-btn">3</button>
                <button class="page-btn"><i class="fas fa-arrow-left"></i> التالي</button>
            </div>
        </div>
    </section>

    <script>

        function removeFromFavorites(researchId) {
    if (!confirm("هل أنت متأكد من حذف هذا البحث من المفضلة؟")) return;

    fetch('/removefav', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'research_id=' + encodeURIComponent(researchId)
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === 'success') {
            // حذف الكارد من الصفحة
            const card = document.getElementById('card-' + researchId);
            if (card) card.remove();
        } else {
            alert("فشل في الحذف: " + data);
        }
    })
    .catch(error => {
        console.error('خطأ في الحذف:', error);
    });
}
        // تفعيل القائمة المنسدلة للمستخدم
        // const userAvatar = document.querySelector('.user-avatar');
        // const dropdownMenu = document.querySelector('.dropdown-menu');

        // userAvatar.addEventListener('click', () => {
        //     dropdownMenu.classList.toggle('show');
        // });

        // // إغلاق القائمة عند النقر خارجها
        // document.addEventListener('click', (e) => {
        //     if (!userAvatar.contains(e.target)) {
        //         dropdownMenu.classList.remove('show');
        //     }
        // });

        // // فلترة الأبحاث حسب التصنيف
        // const filterTags = document.querySelectorAll('.filter-tag');
        
        // filterTags.forEach(tag => {
        //     tag.addEventListener('click', () => {
        //         filterTags.forEach(t => t.classList.remove('active'));
        //         tag.classList.add('active');
        //         // هنا يمكن إضافة كود الفلترة الفعلي
        //     });
        // });

        // // إزالة بحث من المفضلة
        // const removeButtons = document.querySelectorAll('.remove-favorite');
        
        // removeButtons.forEach(btn => {
        //     btn.addEventListener('click', function() {
        //         const researchCard = this.closest('.research-card');
        //         researchCard.classList.add('removing');
        //         setTimeout(() => {
        //             researchCard.remove();
        //             // يمكن هنا إضافة كود لإزالة البحث من المفضلة في قاعدة البيانات
        //         }, 300);
        //     });
        // });
    </script>

<?php require('views/partials/footer.php') ?> 

