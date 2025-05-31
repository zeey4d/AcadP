<?php require('views/partials/head.php') ?>
<?php require('views/partials/nav.php') ?>
<?php require('views/partials/adminBar.php') ?>

<section class="research-details" style="margin-top: 100px;">
        <div class="container">
            <div class="research-header">
                <div class="research-header-content">
                    <div class="research-header-image">
                        <img src="views/media/images/<?php echo $researches['0']['thumbnail_url'] ?? "mg.png" ?>" alt="صورة البحث">
                    </div>
                    <div class="research-header-info">
                        <span class="research-category">علوم الحاسب</span>
                        <h1 class="research-title-large"><?php echo $researches['0']['title'] ?></h1>
                        
                        <div class="research-authors">
                            <h3>المؤلفون:</h3>
                            <div class="author-list">
                                <div class="author-badge">
                                    <i class="fas fa-user"></i>
                                    <a href="author-profile.html">د. أحمد محمد</a>
                                </div>
                                <div class="author-badge">
                                    <i class="fas fa-user"></i>
                                    <a href="author-profile.html">د. محمد علي</a>
                                </div>
                                <div class="author-badge">
                                    <i class="fas fa-user"></i>
                                    <a href="author-profile.html">د. سامية خالد</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="research-meta-large">
                            <div class="meta-item">
                                <i class="fas fa-university"></i>
                                <span>جامعة القاهرة - كلية الحاسبات والمعلومات</span>
                            </div>
                            <div class="meta-item">
                                <i class="far fa-calendar-alt"></i>
                                <span><?php  echo $researches['0']['publication_date'] ?></span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-book-open"></i>
                                <span>المجلة الدولية للذكاء الاصطناعي في الطب</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-file-alt"></i>
                                <span>15 صفحة</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-quote-right"></i>
                                <span>42 استشهاد</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-download"></i>
                                <span>328 تحميل</span>
                            </div>
                        </div>
                        
                        <div class="research-rating">
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>4.5 (12 تقييم)</span>
                            </div>
                        </div>
                        
                        <div class="research-actions-large">
                                                        <!-- <a href="/download?file=<//?php echo urlencode($researches[0]['pdf_url'] ?? 'mg.png'); ?>">تحميل الملف</a> -->

                                                        
                            <a href="/download?file=<?php echo urlencode($researches[0]['pdf_url']); ?>" class="btn btn-large download-btn"><i class="fas fa-download"></i> تحميل البحث</a>
                            <a href="#read" class="btn btn-large cite-btn" onclick="location.href='#bottom'"><i class="fas fa-quote-right"></i> قراءةالبحث </a>
                            <button class="btn-icon save-research" title="حفظ في المفضلة"><i class="far fa-bookmark"></i></button>
                            <button class="btn-icon share-research" title="مشاركة"><i class="fas fa-share-alt"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <div class="research-tabs">
                <button class="tab-btn active" data-tab="abstract">الملخص</button>
                <button class="tab-btn" data-tab="methodology">المنهجية</button>
                <button class="tab-btn" data-tab="results">النتائج</button>
                <button class="tab-btn" data-tab="references">المراجع</button>
                <button class="tab-btn" data-tab="citations">الاستشهادات</button>
            </div>
            
            <div id="abstract" class="tab-content active">
                <div class="abstract-content">
                    <h2>ملخص البحث</h2>
                    <p><?php  echo $researches['0']['abstract'] ?></p>
                    
                    <h3>الأهداف</h3>
                    <ul>
                        <li>تحسين دقة تشخيص الأمراض من الصور الطبية بنسبة لا تقل عن 30%</li>
                        <li>تقليل الوقت اللازم للتحليل إلى النصف مقارنة بالطرق التقليدية</li>
                        <li>تطوير نموذج قابل للتطوير على أنواع مختلفة من الصور الطبية</li>
                    </ul>
                    
                    <h3>النتائج الرئيسية</h3>
                    <p>تم تحقيق دقة تصل إلى 94.7% في تشخيص سرطان الرئة من صور الأشعة السينية، مع تقليل الوقت اللازم للتحليل إلى 40% من الوقت الذي تتطلبه الطرق التقليدية. كما أظهر النموذج أداءً متميزًا في التعرف على الأورام الدقيقة التي يقل قطرها عن 5 مم.</p>
                    
                    <div class="keywords-list">
                        <span class="keyword">التعلم العميق</span>
                        <span class="keyword">الصور الطبية</span>
                        <span class="keyword">الشبكات العصبية</span>
                        <span class="keyword">الذكاء الاصطناعي</span>
                        <span class="keyword">التشخيص الطبي</span>
                    </div>
                </div>
            </div>
            
            <div id="methodology" class="tab-content">
                <div class="abstract-content">
                    <h2>المنهجية</h2>
                    <p>تفاصيل المنهجية المستخدمة في البحث...</p>
                </div>
            </div>
            
            <div id="results" class="tab-content">
                <div class="abstract-content">
                    <h2>النتائج</h2>
                    <p>تفاصيل النتائج التي توصل إليها البحث...</p>
                </div>
            </div>
            
            <div id="references" class="tab-content">
                <div class="references-list">
                    <h2>المراجع</h2>
                    <ol>
                        <li>Smith, J. et al. (2022). "Deep Learning for Medical Imaging". Journal of AI in Medicine, 15(3), 245-260.</li>
                        <li>Zhang, L. & Wang, H. (2021). "Advanced CNN Architectures". IEEE Transactions on Medical Imaging, 40(5), 1123-1135.</li>
                        <li>Al-Mohammed, A. (2020). "AI Applications in Healthcare". Arabian Journal of Science, 25(2), 78-92.</li>
                    </ol>
                </div>
            </div>
            
            <div id="citations" class="tab-content">
                <div class="abstract-content">
                    <h2>الاستشهادات</h2>
                    <p>قائمة بالأبحاث التي استشهدت بهذا البحث...</p>
                </div>
            </div>
            
            <div class="related-research">
                <h2 class="section-title" id="read"> قراءة البحث </h2>

                <div class="pdf-container">
                <iframe src="views/media/pdfs/<?php echo $researches['0']['pdf_url'] ?? "mg.png" ?>" width="100%" height="1000px" style="border:1px solid #ddd;"></iframe>
                </div>
            </div>
        </div>
    </section>
    <script>
        // تبويبات صفحة التفاصيل
        const tabBtns = document.querySelectorAll('.tab-btn');
        
        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // إزالة النشاط من جميع الأزرار والمحتويات
                tabBtns.forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.remove('active');
                });
                
                // إضافة النشاط للزر والمحتوى المحدد
                btn.classList.add('active');
                const tabId = btn.getAttribute('data-tab');
                document.getElementById(tabId).classList.add('active');
            });
        });
    </script>

<?php require('views/partials/footer.php') ?> 