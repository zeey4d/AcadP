   <?php require('partials/head.php') ?>
  <?php require('partials/nav.php') ?>
  <?php require('partials/header.php') ?>
    <?php require('partials/adminBar.php') ?>


  <main>

    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <h2>نشر بحثك العلمي مع أكاديميا</h2>
                <p>منصة متكاملة لنشر الأبحاث العلمية المحكمة والوصول إلى مجتمع أكاديمي عالمي</p>
                <div class="search-box">
                    <input type="text" placeholder="ابحث عن أبحاث، مجلات، مؤتمرات...">
                    <button><i class="fas fa-search"></i> بحث</button>
                </div>
                <div class="stats">
                    <div class="stat-item">
                        <span class="number">12,548+</span>
                        <span class="label">بحث علمي</span>
                    </div>
                    <div class="stat-item">
                        <span class="number">320+</span>
                        <span class="label">مجلة علمية</span>
                    </div>
                    <div class="stat-item">
                        <span class="number">45,000+</span>
                        <span class="label">باحث</span>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <img src="views/media/images/acad.png" alt="البحث العلمي">
            </div>

            <a href="/download?file=sciimm.pdf">تحميل</a>

            <div class="pdf-container">

            <iframe src="views/media/pdfs/sciimm.pdf" width="100%" height="100%" style="border:1px solid #ddd;"></iframe>
        </div>

        <!-- <div class="pdf-viewer-container">
                    <iframe id="pdfViewerIframe" src="" width="100%" height="700px" frameborder="0">
                        This browser does not support PDFs. Please <a href="/views/midea/pdfs/ziad.pdf">download the PDF</a> instead.
                    </iframe>
                </div>
        </div> -->
    </section>

    <section class="features">
        <div class="container">
            <h2 class="section-title">لماذا تختار أكاديميا؟</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <i class="fas fa-check-circle"></i>
                    <h3>تحكيم علمي دقيق</h3>
                    <p>نضمن جودة الأبحاث المنشورة من خلال عملية تحكيم علمي صارمة</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-globe"></i>
                    <h3>وصول عالمي</h3>
                    <p>نشر بحثك أمام مجتمع أكاديمي عالمي وزيادة فرص الاستشهاد به</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-bolt"></i>
                    <h3>سرعة النشر</h3>
                    <p>إجراءات نشر سريعة مع الحفاظ على أعلى معايير الجودة</p>
                </div>
                <div class="feature-card">
                    <i class="fas fa-chart-line"></i>
                    <h3>تتبع الأداء</h3>
                    <p>إحصاءات تفصيلية عن مشاهدات وتحميلات بحثك</p>
                </div>
            </div>
        </div>
    </section>


    <!-- حاوية البطاقات -->

    <section class="latest-research">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">أحدث الأبحاث المنشورة</h2>
            <a href="research-list.html" class="view-all">عرض الكل <i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="research-grid">
             <?php foreach ($researches as $researche): ?>
            <div class="research-card">
                 <a href="/show?research_id=<?= htmlspecialchars($researche['research_id']) ?>">
                <div class="research-badge">
                    <span class="research-category">علوم الحاسب</span>
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

            
            <!-- <div class="research-card featured">
                <div class="research-badge">
                    <span class="research-category">العلوم الطبية</span>
                    <span class="research-status featured">مميز</span>
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
                        <span><i class="far fa-eye"></i> 890</span>
                        <span><i class="fas fa-download"></i> 210</span>
                        <span><i class="fas fa-quote-right"></i> 28</span>
                    </div>
                    <div class="research-actions">
                        <a href="/show" class="btn read-more">قراءة البحث</a>
                        <button class="btn-icon save-research" title="حفظ في المفضلة"><i class="far fa-bookmark"></i></button>
                        <button class="btn-icon share-research" title="مشاركة"><i class="fas fa-share-alt"></i></button>
                    </div>
                </div>
            </div>
            
            <div class="research-card">
                <div class="research-badge">
                    <span class="research-category">الهندسة</span>
                    <span class="research-status trending">شائع</span>
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
                        <span><i class="far fa-eye"></i> 1,532</span>
                        <span><i class="fas fa-download"></i> 412</span>
                        <span><i class="fas fa-quote-right"></i> 56</span>
                    </div>
                    <div class="research-actions">
                        <a href="/show" class="btn read-more">قراءة البحث</a>
                        <button class="btn-icon save-research" title="حفظ في المفضلة"><i class="far fa-bookmark"></i></button>
                        <button class="btn-icon share-research" title="مشاركة"><i class="fas fa-share-alt"></i></button>
                    </div>
                </div>
            </div>-->
        </div>
    </div> 
</section>



    <section class="journals">
        <div class="container">
            <h2 class="section-title">المجلات العلمية</h2>
            <div class="journals-grid">
                <div class="journal-card">
                    <img src="https://via.placeholder.com/100x140" alt="مجلة علوم الحاسب">
                    <h3>مجلة علوم الحاسب والتقنية</h3>
                    <p>تصدر شهريًا - معامل تأثير: 3.2</p>
                    <a href="#" class="btn">تصفح المجلة</a>
                </div>
                <div class="journal-card">
                    <img src="https://via.placeholder.com/100x140" alt="مجلة العلوم الطبية">
                    <h3>المجلة العربية للعلوم الطبية</h3>
                    <p>تصدر ربع سنوي - معامل تأثير: 4.1</p>
                    <a href="#" class="btn">تصفح المجلة</a>
                </div>
                <div class="journal-card">
                    <img src="https://via.placeholder.com/100x140" alt="مجلة الهندسة">
                    <h3>مجلة الهندسة والتطبيقات العلمية</h3>
                    <p>تصدر نصف سنوي - معامل تأثير: 2.8</p>
                    <a href="#" class="btn">تصفح المجلة</a>
                </div>
                <div class="journal-card">
                    <img src="https://via.placeholder.com/100x140" alt="مجلة العلوم الإنسانية">
                    <h3>مجلة الدراسات الإنسانية والاجتماعية</h3>
                    <p>تصدر سنويًا - معامل تأثير: 1.9</p>
                    <a href="#" class="btn">تصفح المجلة</a>
                </div>
            </div>
        </div>
    </section>

    <section class="submit-research">
        <div class="container">
            <div class="submit-content">
                <h2>جاهز لنشر بحثك العلمي؟</h2>
                <p>انضم إلى آلاف الباحثين الذين يثقون بأكاديميا لنشر أبحاثهم العلمية</p>
                <div class="submit-buttons">
                    <a href="#" class="btn primary">إرسال بحث جديد</a>
                    <a href="#" class="btn secondary">تعرف على شروط النشر</a>
                </div>
            </div>
        </div>
    </section>

</body>
  </main>
  <?php require('partials/footer.php') ?> 