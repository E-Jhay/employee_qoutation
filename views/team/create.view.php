
<?php require base_path('views/partials/head.php') ?>
      <!-- Navbar -->
   <?php require base_path('views/partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require base_path('views/partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-2 lg:px-8">
            <div class="flex justify-start gap-2">
               <a href="/teams" title="Export" class="cursor-pointer bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-sm hover:text-white py-1.5 px-2 border border-gray-500 hover:border-transparent rounded">Go back</a>
            </div>
            <?php require base_path('views/partials/banner.php') ?>
            <!-- component -->
            <form method="POST" action="/team">
               <div class="bg-white rounded shadow-lg p-4 px-2 md:p-8 mb-6">
                  <div class="lg:col-span-2">
                     <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                        <div class="md:col-span-3">
                           <label for="name">Team Name</label>
                           <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['name']) ? 'border-red-500' : '' ?>" value="<?= old('name') ?>" />
                           <?php if(isset($errors['name'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['name'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="region">Region</label>
                           <!-- <input type="text" name="region" id="region" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" value="" placeholder="" /> -->
                           <select id="region_id" name="region_id" autocomplete="region_id-name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['region_id']) ? 'border-red-500' : '' ?>">
                              <option value="" selected>-- Select region --</option >
                              <?php foreach($regions as $region): ?>
                                 <option value="<?= $region['id'] ?>"><?= ucwords($region['name']) ?></option >
                              <?php endforeach; ?>
                           </select>
                           <?php if(isset($errors['region_id'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['region_id'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-6">
                           <label for="address">Address / Street</label>
                           <!-- <textarea class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" name="" id="" cols="30" rows="10"></textarea> -->
                           <input type="text" name="address" id="address" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['address']) ? 'border-red-500' : '' ?>" value="<?= old('address') ?>" placeholder="" />
                           <?php if(isset($errors['address'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['address'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="manager">Manager</label>
                           <!-- <input type="text" name="manager" id="manager" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" value="" placeholder="" /> -->
                           <select id="manager_id" name="manager_id" autocomplete="manager_id-name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['manager_id']) ? 'border-red-500' : '' ?>">
                              <option value="" selected>-- Select manager --</option >
                              <?php foreach($managers as $manager): ?>
                                 <option value="<?= $manager['id'] ?>"><?= ucwords($manager['name']) ?></option >
                              <?php endforeach; ?>
                           </select>
                           <?php if(isset($errors['manager_id'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['manager_id'] ?></span>
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