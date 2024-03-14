
<?php require base_path('views/partials/head.php') ?>
      <!-- Navbar -->
   <?php require base_path('views/partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require base_path('views/partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-4 lg:px-8">
            <div class="flex justify-start gap-2">
               <a href="/users" title="Export" class="cursor-pointer bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-sm hover:text-white py-1.5 px-2 border border-gray-500 hover:border-transparent rounded">Go back</a>
            </div>
            <?php require base_path('views/partials/banner.php') ?>
            <div class="bg-white rounded shadow-lg p-4 px-2 md:p-8 mb-6">
               <div class="px-4 sm:px-0">
                  <p class="max-w-2xl text-sm leading-6 text-gray-500">Personal details.</p>
               </div>
               <div class="mt-6 border-t border-gray-100">
                  <dl class="divide-y divide-gray-100">
                     <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                     <dt class="text-sm font-medium leading-6 text-gray-900">Full name</dt>
                     <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $user['name'] ?></dd>
                     </div>
                     <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-medium leading-6 text-gray-900">Email address</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $user['email'] ?></dd>
                     </div>
                     <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                     <dt class="text-sm font-medium leading-6 text-gray-900">Phone</dt>
                     <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $user['phone'] ?></dd>
                     </div>
                     <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                     <dt class="text-sm font-medium leading-6 text-gray-900">Address</dt>
                     <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0"><?= $user['address'] ?></dd>
                     </div>
                     <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                     <dt class="text-sm font-medium leading-6 text-gray-900">Role</dt>
                     <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                           <?= ucwords($user['role']) ?>
                        </span>
                     </dd>
                     </div>
                     <!-- <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                     <dt class="text-sm font-medium leading-6 text-gray-900">Attachments</dt>
                     <dd class="mt-2 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                        <ul role="list" class="divide-y divide-gray-100 rounded-md border border-gray-200">
                           <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                           <div class="flex w-0 flex-1 items-center">
                              <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                 <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                              </svg>
                              <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                 <span class="truncate font-medium">resume_back_end_developer.pdf</span>
                                 <span class="flex-shrink-0 text-gray-400">2.4mb</span>
                              </div>
                           </div>
                           <div class="ml-4 flex-shrink-0">
                              <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                           </div>
                           </li>
                           <li class="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
                           <div class="flex w-0 flex-1 items-center">
                              <svg class="h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                 <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd" />
                              </svg>
                              <div class="ml-4 flex min-w-0 flex-1 gap-2">
                                 <span class="truncate font-medium">coverletter_back_end_developer.pdf</span>
                                 <span class="flex-shrink-0 text-gray-400">4.5mb</span>
                              </div>
                           </div>
                           <div class="ml-4 flex-shrink-0">
                              <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Download</a>
                           </div>
                           </li>
                        </ul>
                     </dd>
                     </div> -->
                  </dl>
               </div>
            </div>
         </main>
<!-- Footer -->
<?php require base_path('views/partials/footer.php') ?>