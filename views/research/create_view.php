<?php require('views/partials/head.php') ?>
<?php require('views/partials/nav.php') ?>
<?php require('views/partials/adminBar.php') ?>


    <section class="add-research" style="margin-top: 100px;">
        <div class="container">
            <div class="page-header">
                <h1><i class="fas fa-plus-circle"></i> إضافة بحث جديد</h1>
                <nav class="breadcrumb">
                    <a href="index.html">الرئيسية</a>
                    <span>/</span>
                    <a href="my-research.html">أبحاثي</a>
                    <span>/</span>
                    <span>إضافة بحث جديد</span>
                </nav>
            </div>

            <div class="form-steps">
                <div class="step active" data-step="1">
                    <span class="step-number">1</span>
                    <span class="step-title">معلومات أساسية</span>
                </div>
                <div class="step" data-step="2">
                    <span class="step-number">2</span>
                    <span class="step-title">رفع الملفات</span>
                </div>
                <div class="step" data-step="3">
                    <span class="step-number">3</span>
                    <span class="step-title">المؤلفون</span>
                </div>
        
            </div>

            <form id="researchForm" class="research-form" action="/create" method="POST">
                <!-- الخطوة 1: المعلومات الأساسية -->
                <div class="form-step active" data-step="1">
                    <h2>المعلومات الأساسية</h2>
                    
                    <div class="form-group">
                        <label for="research_title">عنوان البحث*</label>
                        <input type="text" id="research_title" name="research_title" required placeholder="أدخل العنوان الكامل للبحث">
                    </div>
                    
                    <div class="form-row">

                    </div>
                    
                    <div class="form-group">
                        <label for="research_abstract">ملخص البحث*</label>
                        <textarea id="research_abstract" name="research_abstract" rows="6" required placeholder="أدخل ملخصاً وافياً للبحث (150-300 كلمة)"></textarea>
                        <div class="hint">يجب أن يكون الملخص بين 150 و 300 كلمة</div>
                    </div>
                                        <div class="form-group">
                        <label for="research_categories">تصنيفات البحث*</label>
                        <div class="categories-select">
                            <select id="research_categories" multiple>
                                <option value="1">علوم الحاسب</option>
                                <option value="2">العلوم الطبية</option>
                                <option value="3">الهندسة</option>
                                <option value="4">العلوم الإنسانية</option>
                                <option value="5">العلوم الطبيعية</option>
                                <option value="6">العلوم الاجتماعية</option>
                            </select>
                            <div class="selected-categories"></div>
                        </div>
                        <div class="hint">اختر تصنيفاً واحداً على الأقل</div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="button" class="btn next-step" data-next="2">التالي <i class="fas fa-arrow-left"></i></button>
                    </div>
                    
                </div>

                <!-- الخطوة 2: تفاصيل البحث -->
                <div class="form-step" data-step="2">
                    <h2>رفع الملفات</h2>

                                  <div class="form-group">
                        <label for="research_pdf">ملف البحث (PDF)*</label>
                        <div class="file-upload">
                            <input type="file" id="research_pdf" name="research_pdf" accept=".pdf" required>
                            <label for="research_pdf" class="upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span class="file-name">اختر ملف PDF</span>
                                <span class="btn">استعراض</span>
                            </label>
                        </div>
                        <div class="hint">حجم الملف الأقصى 10MB. يجب أن يكون بصيغة PDF</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="research_thumbnail">صورة مصغرة للبحث (اختياري)</label>
                        <div class="file-upload">
                            <input type="file" id="research_thumbnail" name="research_thumbnail" accept="image/*">
                            <label for="research_thumbnail" class="upload-label">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <span class="file-name">اختر صورة</span>
                                <span class="btn">استعراض</span>
                            </label>
                        </div>
                        <div class="hint">حجم الملف الأقصى 2MB. الصيغ المقبولة: JPG, PNG</div>
                    </div>
                    
                    <div class="form-group">
                        <label for="research_fulltext">نص البحث الكامل (اختياري)</label>
                        <textarea id="research_fulltext" name="research_fulltext" rows="10" placeholder="يمكنك إدخال النص الكامل للبحث هنا (يفضل استخدام محرر النصوص الغني أدناه)"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>محرر النصوص</label>
                        <div class="rich-editor" id="richEditor" contenteditable="true"></div>
                    </div>
                    

                    
        
                    <div class="form-actions">
                        <button type="button" class="btn prev-step" data-prev="1"><i class="fas fa-arrow-right"></i> السابق</button>
                        <button type="button" class="btn next-step" data-next="3">التالي <i class="fas fa-arrow-left"></i></button>
                    </div>
                </div>

                <!-- الخطوة 3: رفع الملفات -->
                <div class="form-step" data-step="3">
                                        <h2>المؤلفون</h2>

                                    <div class="add-author">
                        <h3>إضافة مؤلف آخر</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <input type="text" id="author_name" placeholder="اسم المؤلف">
                            </div>
                            <div class="form-group">
                                <input type="email" id="author_email" placeholder="البريد الإلكتروني">
                            </div>
                            <div class="form-group">
                                <input type="text" id="author_affiliation" placeholder="الانتماء المؤسسي">
                            </div>
                            <button type="button" class="btn" id="addAuthorBtn"><i class="fas fa-plus"></i> إضافة</button>
                        </div>
                                            <div class="form-group terms-agreement">
                        <input type="checkbox" id="terms_agreement" name="terms_agreement" required>
                        <label for="terms_agreement">أقر بأن جميع المعلومات المقدمة صحيحة، وأوافق على <a href="terms.html" target="_blank">شروط النشر</a> و <a href="policy.html" target="_blank">سياسة الخصوصية</a> للمنصة.</label>
                    </div>
                    </div>
                        <div class="form-actions">
                        <!-- <button type="button" class="btn prev-step" data-prev="2"><i class="fas fa-arrow-right"></i> السابق</button> -->
                        <button type="submit" class="btn primary"><i class="fas fa-paper-plane"></i> إرسال البحث</button>
                    
                    </div>
      
                </div>


            </form>
        </div>
    </section>

    <script>
        // إدارة خطوات النموذج
        const steps = document.querySelectorAll('.form-step');
        const stepButtons = document.querySelectorAll('.step');
        const nextButtons = document.querySelectorAll('.next-step');
        const prevButtons = document.querySelectorAll('.prev-step');
        
        function showStep(stepNumber) {
            steps.forEach(step => {
                step.classList.remove('active');
                if (step.dataset.step === stepNumber) {
                    step.classList.add('active');
                }
            });
            
            stepButtons.forEach(button => {
                button.classList.remove('active');
                if (parseInt(button.dataset.step) <= parseInt(stepNumber)) {
                    button.classList.add('active');
                }
            });
        }
        
        nextButtons.forEach(button => {
            button.addEventListener('click', () => {
                const nextStep = button.dataset.next;
                showStep(nextStep);
            });
        });
        
        prevButtons.forEach(button => {
            button.addEventListener('click', () => {
                const prevStep = button.dataset.prev;
                showStep(prevStep);
            });
        });
        
        // إدارة الكلمات المفتاحية
        const keywordsInput = document.getElementById('research_keywords');
        const keywordsTags = document.querySelector('.keywords-tags');
        
        keywordsInput.addEventListener('keydown', function(e) {
            if (e.key === ',' || e.key === 'Enter') {
                e.preventDefault();
                const keyword = this.value.trim();
                if (keyword) {
                    addKeywordTag(keyword);
                    this.value = '';
                }
            }
        });
        
        function addKeywordTag(keyword) {
            const tag = document.createElement('div');
            tag.className = 'keyword-tag';
            tag.innerHTML = `
                ${keyword}
                <button type="button" class="remove-keyword"><i class="fas fa-times"></i></button>
            `;
            keywordsTags.appendChild(tag);
            
            tag.querySelector('.remove-keyword').addEventListener('click', () => {
                tag.remove();
            });
        }
        
        // إدارة تصنيفات البحث
        const categoriesSelect = document.getElementById('research_categories');
        const selectedCategories = document.querySelector('.selected-categories');
        
        categoriesSelect.addEventListener('change', function() {
            selectedCategories.innerHTML = '';
            Array.from(this.selectedOptions).forEach(option => {
                const category = document.createElement('div');
                category.className = 'category-tag';
                category.textContent = option.text;
                selectedCategories.appendChild(category);
            });
        });
        
        // إدارة رفع الملفات
        const fileInputs = document.querySelectorAll('input[type="file"]');
        
        fileInputs.forEach(input => {
            input.addEventListener('change', function() {
                const fileName = this.files[0]?.name || 'اختر ملف';
                this.parentNode.querySelector('.file-name').textContent = fileName;
            });
        });
        
        // إضافة مؤلفين جدد
        const addAuthorBtn = document.getElementById('addAuthorBtn');
        const authorsList = document.querySelector('.authors-list');
        
        addAuthorBtn.addEventListener('click', function() {
            const name = document.getElementById('author_name').value.trim();
            const email = document.getElementById('author_email').value.trim();
            const affiliation = document.getElementById('author_affiliation').value.trim();
            
            if (name && email && affiliation) {
                const authorCard = document.createElement('div');
                authorCard.className = 'author-card';
                authorCard.innerHTML = `
                    <div class="author-info">
                        <img src="https://via.placeholder.com/60" alt="صورة المؤلف">
                        <div class="author-details">
                            <h4>${name}</h4>
                            <p>${affiliation}</p>
                            <small>${email}</small>
                        </div>
                    </div>
                    <div class="author-role">
                        <label>الدور:</label>
                        <select class="role-select">
                            <option value="author">مؤلف</option>
                            <option value="corresponding">مؤلف مسؤول</option>
                            <option value="supervisor">مشرف</option>
                        </select>
                    </div>
                    <div class="author-order">
                        <label>الترتيب:</label>
                        <input type="number" min="1" value="2" class="order-input">
                    </div>
                    <button type="button" class="btn-icon remove-author"><i class="fas fa-times"></i></button>
                `;
                
                authorsList.appendChild(authorCard);
                
                // مسح حقول الإدخال
                document.getElementById('author_name').value = '';
                document.getElementById('author_email').value = '';
                document.getElementById('author_affiliation').value = '';
                
                // إضافة حدث إزالة المؤلف
                authorCard.querySelector('.remove-author').addEventListener('click', function() {
                    authorCard.remove();
                });
            } else {
                alert('الرجاء إدخال جميع بيانات المؤلف');
            }
        });
        
        // عرض ملخص المعلومات قبل الإرسال
        const researchForm = document.getElementById('researchForm');
        
        researchForm.addEventListener('submit', function(e) {
            // e.preventDefault();
            
            // هنا يمكنك إضافة كود إرسال النموذج
            alert('تم إرسال البحث بنجاح وسيتم مراجعته من قبل فريق التحرير. شكراً لمساهمتك!');
            window.location.href = 'my-research.html';
        });
    </script>
    
<?php require('views/partials/footer.php') ?> 
