
<?php require base_path('views/partials/head.php') ?>
      <!-- Navbar -->
   <?php require base_path('views/partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require base_path('views/partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-2 lg:px-8">
            <div class="flex justify-start gap-2">
               <a href="/comapnies" title="Export" class="cursor-pointer bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-sm hover:text-white py-1.5 px-2 border border-gray-500 hover:border-transparent rounded">Go back</a>
            </div>
            <?php require base_path('views/partials/banner.php') ?>
            <?php if(isset($_SESSION['success'])): ?>
               <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative message-alert" role="alert">
                  <!-- <strong class="font-bold">Holy smokes!</strong> -->
                  <span class="block sm:inline"><?= $_SESSION['success'] ?></span>
                  <span onclick="removeMessage()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                     <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                  </span>
               </div>
            <?php unset($_SESSION['success']); endif; ?>
            <?php if(isset($errors)): ?>
               <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative message-alert" company="alert">
                  <!-- <strong class="font-bold">Holy smokes!</strong> -->
                  <span class="block sm:inline"><?= $errors ?></span>
                  <span onclick="removeMessage()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                     <svg class="fill-current h-6 w-6 text-red-500" company="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                  </span>
               </div>
            <?php unset($_SESSION['errors']); endif; ?>
            <!-- component -->
            <form method="POST" action="/company/update">
               <div class="bg-white rounded shadow-lg p-4 px-2 md:p-8 mb-6">
                  <div class="lg:col-span-2">
                     <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                        <div class="md:col-span-3">
                           <label for="name">Company name</label>
                           <input type="hidden" name="_method" value="PUT">
                           <input type="hidden" name="id" value="<?= $company['id'] ?>">
                           <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['name']) ? 'border-red-500' : '' ?>" value="<?= $company['name'] ?>" />
                           <?php if(isset($errors['name'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['name'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="email">Email</label>
                           <input type="email" name="email" id="email" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['email']) ? 'border-red-500' : '' ?>" value="<?= $company['email'] ?? '' ?>" />
                           <?php if(isset($errors['email'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['email'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="address_line_1">Address line 1</label>
                           <input type="address_line_1" name="address_line_1" id="address_line_1" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['address_line_1']) ? 'border-red-500' : '' ?>" value="<?= $company['address_line_1'] ?? '' ?>" />
                           <?php if(isset($errors['address_line_1'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['address_line_1'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="address_line_2">Address line 2</label>
                           <input type="address_line_2" name="address_line_2" id="address_line_2" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['address_line_2']) ? 'border-red-500' : '' ?>" value="<?= $company['address_line_2'] ?? '' ?>" />
                           <?php if(isset($errors['address_line_2'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['address_line_2'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="city">City</label>
                           <input type="city" name="city" id="city" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['city']) ? 'border-red-500' : '' ?>" value="<?= $company['city'] ?? '' ?>" />
                           <?php if(isset($errors['city'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['city'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="province">Province</label>
                           <input type="province" name="province" id="province" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['province']) ? 'border-red-500' : '' ?>" value="<?= $company['province'] ?? '' ?>" />
                           <?php if(isset($errors['province'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['province'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="tel_no">Telephone No</label>
                           <input type="tel_no" name="tel_no" id="tel_no" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['tel_no']) ? 'border-red-500' : '' ?>" value="<?= $company['tel_no'] ?? '' ?>" />
                           <?php if(isset($errors['tel_no'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['tel_no'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="mobile_no">Mobile No</label>
                           <input type="mobile_no" name="mobile_no" id="mobile_no" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['mobile_no']) ? 'border-red-500' : '' ?>" value="<?= $company['mobile_no'] ?? '' ?>" placeholder="09xxxxxxxxx" />
                           <?php if(isset($errors['mobile_no'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['mobile_no'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="status">Status</label>
                           <select id="status" name="status" autocomplete="status-name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['status']) ? 'border-red-500' : '' ?>">
                              <option value="0"<?= $company['isActive'] ? 'selected' : '' ?>>Inactive</option >
                              <option value="1"<?= $company['isActive'] ? 'selected' : '' ?>>Active</option >
                           </select>
                           <?php if(isset($errors['status'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['status'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="mt-4 md:col-span-6 text-left">
                           <div class="inline-flex items-end">
                              <button type="submit" class="w-32 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">Submit</button>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </form>
         </main>
<!-- Footer -->
<?php require base_path('views/partials/footer.php') ?>