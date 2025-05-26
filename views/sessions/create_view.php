<?php require('views/partials/head.php') ?>
  <?php require('views/partials/nav.php') ?>


  <?php
$messages = [
    'error' => $errors ?? ["البريد الالكتروني أو كلمة المرور غير صحيحة"],
    'success' => $success ?? ["تم التسجيل بنجاح. يمكنك الان تسجيل الدخول"], 
    'warning' => $warning ?? ["كلمة المرور وتأكيد كلمة المرور غير متطابقين يرجى التحقق"], 
    'info' => $info ?? ["يرجى قبول الشروط والاحكام قبل التسجيل"],    
];

$icons = [
    'error' => '❌',
    'success' => '✅',
    'warning' => '⚠️',
    'info' => 'ℹ️',
];

$colors = [
    'error' => '#d8000c',
    'success' => '#4BB543',
    'warning' => '#ff9b00',
    'info' => '#00529B',
];
?>
  
  <!-- <main>
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
      <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
        <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Log In</h2>
      </div>

      <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-4" action="/login" method="POST">
          <div>
            <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address :</label>
            <div class="mt-2">
              <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>
          <div class="flex items-center justify-between text-red-500 text-sm/6">
            <?= $erorrs["email"] ?? " " ?>
          </div>

          <div>
            <label for="password" class="block text-sm/6 font-medium text-gray-900">Password :</label>
            <div class="mt-2">
              <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>

          <div class="flex items-center justify-between text-red-500 text-sm/6">
            <?= $erorrs["password"] ?? " " ?>
          </div>

          <div class="mt-6">
            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">register</button>
          </div>
        </form>

      </div>
    </div>
  </main> -->


  <?php require('views/partials/footer.php') ?>