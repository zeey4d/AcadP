<?php require('views/partials/head.php') ?>
<?php require('views/partials/nav.php') ?>

<section class="auth-section">
        <div class="container">
            <div class="auth-container">
                <div class="auth-image">
                    <img src="https://via.placeholder.com/500x400" alt="تسجيل الدخول">
                    <div class="auth-image-content">
                        <h2>مرحباً بعودتك!</h2>
                        <p>سجل دخولك للوصول إلى جميع مميزات منصة أكاديميا لنشر الأبحاث العلمية</p>
                        <p>ليس لديك حساب؟ <a href="register.html">أنشئ حساب الآن</a></p>
                    </div>
                </div>
                <div class="auth-form">
                    <h2>تسجيل الدخول</h2>
                    <p>ادخل بياناتك للوصول إلى حسابك</p>
                    <?php if (!empty($errors)): ?>
                        <div class="error-messages">
                            <?php foreach ($errors as $error): ?>
                                <p style="color: red;"><?= htmlspecialchars($error) ?></p>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <form action="/sessions_store" method="POST">
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="email" id="email" name="email" required placeholder="أدخل بريدك الإلكتروني">
                            <i class="fas fa-envelope"></i>
                        </div>
                        
                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="password" id="password" name="password" required placeholder="أدخل كلمة المرور">
                            <i class="fas fa-lock"></i>
                            <a href="#" class="forgot-password">نسيت كلمة المرور؟</a>
                        </div>
                        
                        <div class="form-group remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">تذكرني</label>
                        </div>
                        
                        <button class="btn_log_in btn login " style="background-color: black; color:white;" id="btn_log_in" aria-label="تسجيل دخول" >تسجيل دخول</button>

                        <!-- <a  href="/users_index" type="submit" class="btn primary">تسجيل الدخول</a> -->
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php require('views/partials/footer.php') ?> 