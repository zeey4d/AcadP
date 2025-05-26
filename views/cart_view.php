<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/header.php') ?>

    <section class="favorites-section" style="margin-top: 100px;">
        <div class="container">
            <div class="section-header">
                <h1 class="section-title"><i class="fas fa-bookmark"></i> الأبحاث المفضلة</h1>
                <div class="actions">
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
                </div>
            </div>

            <div class="filters">
                <div class="filter-tags">
                    <span class="filter-tag active">الكل <span class="count">(12)</span></span>
                    <span class="filter-tag">علوم الحاسب <span class="count">(5)</span></span>
                    <span class="filter-tag">العلوم الطبية <span class="count">(3)</span></span>
                    <span class="filter-tag">الهندسة <span class="count">(2)</span></span>
                    <span class="filter-tag">العلوم الإنسانية <span class="count">(2)</span></span>
                </div>
                <button class="btn filter-btn"><i class="fas fa-sliders-h"></i> المزيد من الفلاتر</button>
            </div>

            <div class="favorites-grid">
                <!-- البحث الأول -->
                <div class="research-card favorite">
                    <div class="research-badge">
                        <span class="research-category">علوم الحاسب</span>
                        <span class="research-status new">جديد</span>
                    </div>
                    <div class="favorite-badge">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <div class="research-thumbnail">
                        <img src="https://via.placeholder.com/300x200" alt="صورة البحث">
                        <div class="research-overlay">
                            <a href="research-details.html" class="quick-view"><i class="fas fa-eye"></i> معاينة سريعة</a>
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
                                <span>(12 تقييم)</span>
                            </div>
                        </div>
                        <p class="research-abstract">دراسة تقدم نموذجًا جديدًا لتحليل الصور الطبية باستخدام شبكات عصبية متطورة لتحسين دقة التشخيص الطبي بنسبة 35% مقارنة بالطرق التقليدية...</p>
                        <div class="research-meta">
                            <span><i class="far fa-calendar-alt"></i> 15 مايو 2023</span>
                            <span><i class="fas fa-file-pdf"></i> PDF</span>
                            <span><i class="fas fa-language"></i> EN</span>
                        </div>
                        <div class="research-actions">
                            <a href="research-details.html" class="btn read-more">قراءة البحث</a>
                            <button class="btn-icon remove-favorite" title="إزالة من المفضلة"><i class="fas fa-trash-alt"></i></button>
                            <button class="btn-icon share-research" title="مشاركة"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>

                <!-- البحث الثاني -->
                <div class="research-card favorite">
                    <div class="research-badge">
                        <span class="research-category">العلوم الطبية</span>
                        <span class="research-status featured">مميز</span>
                    </div>
                    <div class="favorite-badge">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <div class="research-thumbnail">
                        <img src="https://via.placeholder.com/300x200" alt="صورة البحث">
                        <div class="research-overlay">
                            <a href="research-details.html" class="quick-view"><i class="fas fa-eye"></i> معاينة سريعة</a>
                        </div>
                    </div>
                    <div class="research-content">
                        <h3 class="research-title">
                            <a href="research-details.html">تأثير النظام الغذائي على مقاومة الإنسولين</a>
                        </h3>
                        <p class="research-author">
                            <a href="author-profile.html"><i class="fas fa-user"></i> د. سارة عبد الله</a> - 
                            <a href="university.html"><i class="fas fa-university"></i> جامعة الملك سعود</a>
                        </p>
                        <div class="research-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                                <span>(8 تقييم)</span>
                            </div>
                        </div>
                        <p class="research-abstract">تحليل شامل لتأثير الأنماط الغذائية المختلفة على مقاومة الإنسولين مع دراسة حالة على 500 مريض خلال فترة 3 سنوات...</p>
                        <div class="research-meta">
                            <span><i class="far fa-calendar-alt"></i> 10 مايو 2023</span>
                            <span><i class="fas fa-file-pdf"></i> PDF</span>
                            <span><i class="fas fa-language"></i> AR</span>
                        </div>
                        <div class="research-actions">
                            <a href="research-details.html" class="btn read-more">قراءة البحث</a>
                            <button class="btn-icon remove-favorite" title="إزالة من المفضلة"><i class="fas fa-trash-alt"></i></button>
                            <button class="btn-icon share-research" title="مشاركة"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>

                <!-- البحث الثالث -->
                <div class="research-card favorite">
                    <div class="research-badge">
                        <span class="research-category">الهندسة</span>
                        <span class="research-status trending">شائع</span>
                    </div>
                    <div class="favorite-badge">
                        <i class="fas fa-bookmark"></i>
                    </div>
                    <div class="research-thumbnail">
                        <img src="https://via.placeholder.com/300x200" alt="صورة البحث">
                        <div class="research-overlay">
                            <a href="research-details.html" class="quick-view"><i class="fas fa-eye"></i> معاينة سريعة</a>
                        </div>
                    </div>
                    <div class="research-content">
                        <h3 class="research-title">
                            <a href="research-details.html">تصميم مواد نانوية لتحلية المياه بكفاءة عالية</a>
                        </h3>
                        <p class="research-author">
                            <a href="author-profile.html"><i class="fas fa-user"></i> د. خالد أحمد</a> - 
                            <a href="university.html"><i class="fas fa-university"></i> جامعة الإمارات</a>
                        </p>
                        <div class="research-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span>(15 تقييم)</span>
                            </div>
                        </div>
                        <p class="research-abstract">ابتكار مواد نانوية جديدة تزيد كفاءة تحلية المياه بنسبة 40% مع تقليل استهلاك الطاقة إلى النصف مقارنة بالتقنيات الحالية...</p>
                        <div class="research-meta">
                            <span><i class="far fa-calendar-alt"></i> 5 مايو 2023</span>
                            <span><i class="fas fa-file-pdf"></i> PDF</span>
                            <span><i class="fas fa-language"></i> EN</span>
                        </div>
                        <div class="research-actions">
                            <a href="research-details.html" class="btn read-more">قراءة البحث</a>
                            <button class="btn-icon remove-favorite" title="إزالة من المفضلة"><i class="fas fa-trash-alt"></i></button>
                            <button class="btn-icon share-research" title="مشاركة"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>

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
