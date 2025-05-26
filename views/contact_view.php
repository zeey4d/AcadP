  <?php require('partials/head.php') ?>
  <?php require('partials/nav.php') ?>
  <?php require('partials/header.php') ?>


    <section class="contact-hero " style="margin-top: 100px;">
        <div class="container">
            <h1>تواصل معنا</h1>
            <p>نحن هنا لمساعدتك والإجابة على جميع استفساراتك</p>
        </div>
    </section>

    <section class="contact-content">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>معلومات التواصل</h2>
                    <p>يسعدنا تواصلكم معنا عبر أي من القنوات التالية:</p>
                    
                    <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="info-content">
                            <h3>العنوان</h3>
                            <p>شارع الجامعة، المدينة العلمية، الرياض، المملكة العربية السعودية</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="fas fa-phone"></i>
                        <div class="info-content">
                            <h3>الهاتف</h3>
                            <p>+966 11 123 4567</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <div class="info-content">
                            <h3>البريد الإلكتروني</h3>
                            <p>info@academia.edu</p>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="fas fa-clock"></i>
                        <div class="info-content">
                            <h3>ساعات العمل</h3>
                            <p>الأحد - الخميس: 8 صباحاً - 4 مساءً</p>
                            <p>الجمعة والسبت: إجازة</p>
                        </div>
                    </div>
                    
                    <div class="social-media">
                        <h3>وسائل التواصل الاجتماعي</h3>
                        <div class="social-links">
                            <a href="#" class="social-btn twitter"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="social-btn facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="social-btn linkedin"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="social-btn youtube"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form">
                    <h2>أرسل رسالة</h2>
                    <form id="contactForm">
                        <div class="form-group">
                            <label for="name">الاسم الكامل</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">الموضوع</label>
                            <select id="subject" name="subject" required>
                                <option value="">اختر موضوع الرسالة</option>
                                <option value="general">استفسار عام</option>
                                <option value="publish">استفسار عن النشر</option>
                                <option value="technical">دعم فني</option>
                                <option value="partnership">شراكات وتعاون</option>
                                <option value="other">موضوع آخر</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">الرسالة</label>
                            <textarea id="message" name="message" rows="6" required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn primary">إرسال الرسالة</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-map">
        <div class="container">
            <h2>موقعنا على الخريطة</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.231756452618!2d46.6754154150007!3d24.83167798407166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2ee3e9b4b92a9b%3A0x845c6ad789640c4a!2sRiyadh%20Front!5e0!3m2!1sen!2ssa!4v1623456789012!5m2!1sen!2ssa" 
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <section class="contact-faq">
        <div class="container">
            <h2>الأسئلة الشائعة</h2>
            <div class="faq-list">
                <div class="faq-item">
                    <button class="faq-question">
                        كيف يمكنني نشر بحث في المنصة؟
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>لنشر بحث في منصة أكاديميا، يجب أولاً إنشاء حساب باحث، ثم الدخول إلى لوحة التحكم وتحديد "إرسال بحث جديد". سيتم مراجعة البحث من قبل فريق التحرير وإرساله للتحكيم العلمي قبل النشر.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        ما هي تكلفة النشر في المجلات؟
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>تختلف تكلفة النشر حسب المجلة ونوع النشر (عادي أو مفتوح). يمكنك الاطلاع على أسعار النشر في صفحة كل مجلة أو التواصل مع فريق الدعم لمزيد من التفاصيل.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        كم تستغرق عملية التحكيم؟
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>متوسط وقت التحكيم يتراوح بين 4-8 أسابيع حسب تخصص البحث وتوافر المحكمين. يمكنك متابعة حالة البحث من خلال حسابك في أي وقت.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <button class="faq-question">
                        هل المنصة معتمدة في الترقيات العلمية؟
                        <i class="fas fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <p>نعم، جميع مجلاتنا معتمدة من قبل وزارات التعليم العالي في معظم الدول العربية وتعتبر نشراتها معتمدة للترقيات العلمية.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // تفعيل الأسئلة الشائعة
        const faqQuestions = document.querySelectorAll('.faq-question');
        
        faqQuestions.forEach(question => {
            question.addEventListener('click', () => {
                const answer = question.nextElementSibling;
                const icon = question.querySelector('i');
                
                question.classList.toggle('active');
                answer.classList.toggle('active');
                
                if (question.classList.contains('active')) {
                    icon.classList.replace('fa-chevron-down', 'fa-chevron-up');
                } else {
                    icon.classList.replace('fa-chevron-up', 'fa-chevron-down');
                }
            });
        });

        // نموذج الاتصال
        const contactForm = document.getElementById('contactForm');
        
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // هنا يمكنك إضافة كود إرسال النموذج
            alert('تم استلام رسالتك وسيتم الرد عليك في أقرب وقت. شكراً لتواصلك معنا.');
            contactForm.reset();
        });
    </script>
  <?php require('partials/footer.php') ?>