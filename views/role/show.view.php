
<?php require base_path('views/partials/head.php') ?>
      <!-- Navbar -->
   <?php require base_path('views/partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require base_path('views/partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-4 lg:px-8">
            <div class="flex justify-start gap-2">
               <a href="/roles" title="Export" class="cursor-pointer bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-sm hover:text-white py-1.5 px-2 border border-gray-500 hover:border-transparent rounded">Go back</a>
            </div>
            <?php require base_path('views/partials/banner.php') ?>
            <div class="bg-white rounded shadow-lg p-4 px-2 md:p-8 mb-6">
               <div class="px-4 sm:px-0">
                  <p class="max-w-2xl text-sm leading-6 text-gray-500">Role details.</p>
               </div>
               <div class="mt-6 border-t border-gray-100">
                  <dl class="divide-y divide-gray-100">
                     <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                     <dt class="text-sm font-medium leading-6 text-gray-900">Role name</dt>
                     <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= ucwords($role['name']) ?></dd>
                     </div>
                  </dl>
               </div>
            </div>
         </main>
<!-- Footer -->
<?php require base_path('views/partials/footer.php') ?>