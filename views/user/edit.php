
<?php require base_path('views/partials/head.php') ?>
      <!-- Navbar -->
   <?php require base_path('views/partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require base_path('views/partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-2 lg:px-8">
            <div class="flex justify-start gap-2">
               <a href="/users" title="Export" class="cursor-pointer bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-sm hover:text-white py-1.5 px-2 border border-gray-500 hover:border-transparent rounded">Go back</a>
            </div>
            <?php require base_path('views/partials/banner.php') ?>
            <!-- component -->
            <form method="POST">
               <div class="bg-white rounded shadow-lg p-4 px-2 md:p-8 mb-6">
                  <div class="lg:col-span-2">
                     <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                        <div class="md:col-span-3">
                           <label for="full_name">Full Name</label>
                           <input type="text" name="full_name" id="full_name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" value="<?= $user['name'] ?>" />
                        </div>

                        <div class="md:col-span-3">
                           <label for="email">Email Address</label>
                           <input type="email" name="email" id="email" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" value="<?= $user['email'] ?>" placeholder="email@domain.com" />
                        </div>

                        <div class="md:col-span-6">
                           <label for="address">Address / Street</label>
                           <!-- <textarea class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" name="" id="" cols="30" rows="10"></textarea> -->
                           <input type="text" name="address" id="address" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" value="<?= $user['address'] ?>" placeholder="" />
                        </div>

                        <div class="md:col-span-3">
                           <label for="phone">Phone</label>
                           <input type="number" name="phone" id="phone" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" value="<?= $user['phone'] ?>" placeholder="9xxxxxxxxxx" />
                        </div>
                        <div class="md:col-span-3">
                           <label for="role">Role</label>
                           <!-- <input type="text" name="role" id="role" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" value="" placeholder="" /> -->
                           <select id="role_id" name="role_id" autocomplete="role_id-name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50">
                              <!-- <option value="" selected>-- Select role --</option > -->
                              <?php foreach($roles as $role): ?>
                                 <option <?= $user['role_id'] === $role['id'] ? 'selected' : '' ?> value="<?= $role['id'] ?>"><?= ucwords($role['name']) ?></option >
                              <?php endforeach; ?>
                           </select>
                        </div>

                        <div class="md:col-span-3">
                           <label for="password">Password</label>
                           <input type="password" name="password" id="password" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" value="" placeholder="" />
                        </div>
                        <div class="md:col-span-3">
                           <label for="re-type-password">Re-Type Password</label>
                           <input type="password" name="re-type-password" id="re-type-password" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" value="" placeholder="" />
                        </div>

                        <!-- <div class="md:col-span-3">
                           <label for="country">Country / region</label>
                           <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                              <input name="country" id="country" placeholder="Country" class="px-2 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                              <button tabindex="-1" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-red-600">
                              <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                 <line x1="18" y1="6" x2="6" y2="18"></line>
                                 <line x1="6" y1="6" x2="18" y2="18"></line>
                              </svg>
                              </button>
                              <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                              <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
                              </button>
                           </div>
                        </div>

                        <div class="md:col-span-2">
                           <label for="state">State / province</label>
                           <div class="h-10 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                              <input name="state" id="state" placeholder="State" class="px-2 appearance-none outline-none text-gray-800 w-full bg-transparent" value="" />
                              <button tabindex="-1" class="cursor-pointer outline-none focus:outline-none transition-all text-gray-300 hover:text-red-600">
                              <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                 <line x1="18" y1="6" x2="6" y2="18"></line>
                                 <line x1="6" y1="6" x2="18" y2="18"></line>
                              </svg>
                              </button>
                              <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-300 hover:text-blue-600">
                              <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="18 15 12 9 6 15"></polyline></svg>
                              </button>
                           </div>
                        </div>

                        <div class="md:col-span-1">
                           <label for="zipcode">Zipcode</label>
                           <input type="text" name="zipcode" id="zipcode" class="transition-all flex items-center h-10 border mt-1 rounded px-2 w-full bg-gray-50" placeholder="" value="" />
                        </div>

                        <div class="md:col-span-5">
                           <div class="inline-flex items-center">
                              <input type="checkbox" name="billing_same" id="billing_same" class="form-checkbox" />
                              <label for="billing_same" class="ml-2">My billing address is different than above.</label>
                           </div>
                        </div>

                        <div class="md:col-span-2">
                           <label for="soda">How many soda pops?</label>
                           <div class="h-10 w-28 bg-gray-50 flex border border-gray-200 rounded items-center mt-1">
                              <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-r border-gray-200 transition-all text-gray-500 hover:text-blue-600">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                              </svg>
                              </button>
                              <input name="soda" id="soda" placeholder="0" class="px-2 text-center appearance-none outline-none text-gray-800 w-full bg-transparent" value="0" />
                              <button tabindex="-1" for="show_more" class="cursor-pointer outline-none focus:outline-none border-l border-gray-200 transition-all text-gray-500 hover:text-blue-600">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 fill-current" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                              </svg>
                              </button>
                           </div>
                        </div> -->
                  
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