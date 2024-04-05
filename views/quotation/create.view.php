
<?php require base_path('views/partials/head.php') ?>
      <!-- Navbar -->
   <?php require base_path('views/partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require base_path('views/partials/sidebar.php') ?>
      <div class="h-full w-full bg-gray-50 relative lg:ml-64">
         <main class="pt-6 px-2 lg:px-8">
            <div class="flex justify-start gap-2">
               <a href="/quotations" title="Export" class="cursor-pointer bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-sm hover:text-white py-1.5 px-2 border border-gray-500 hover:border-transparent rounded">Go back</a>
            </div>

            <?php require base_path('views/partials/banner.php') ?>
            <?php require base_path('views/partials/alerts.php') ?>
            <!-- component -->
            <form id="quotationForm">
               <div class="bg-white rounded shadow-lg p-4 px-2 md:p-8 mb-6">
                  <div class="lg:col-span-2">
                     <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        Quotation Details
                     </h3>
                     <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                        <div class="md:col-span-3">
                           <label for="customer_name">Customer</label>
                           <input type="text" name="customer_name" id="customer_name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['customer_name']) ? 'border-red-500' : '' ?>" value="<?= old('customer_name') ?>" />
                           <?php if(isset($errors['customer_name'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['customer_name'] ?></span>
                           <?php endif; ?>
                        </div>
                        <div class="md:col-span-3">
                           <label for="region">Region</label>
                           <select id="region" name="region" autocomplete="region-name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['region']) ? 'border-red-500' : '' ?>">
                              <option value="manila" selected>Metro Manila</option >
                              <option value="province">Province</option >
                           </select>
                           <?php if(isset($errors['region'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['region'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="email">Customer Email</label>
                           <input type="text" name="email" id="email" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['email']) ? 'border-red-500' : '' ?>" value="<?= old('email') ?>" />
                           <?php if(isset($errors['email'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['email'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="confirm_email">Customer Confirm email</label>
                           <input type="text" name="confirm_email" id="confirm_email" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['confirm_email']) ? 'border-red-500' : '' ?>" value="<?= old('confirm_email') ?>" />
                           <?php if(isset($errors['confirm_email'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['confirm_email'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="address_line_1">Address line 1</label>
                           <!-- <textarea class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" name="" id="" cols="30" rows="10"></textarea> -->
                           <input type="text" name="address_line_1" id="address_line_1" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['address_line_1']) ? 'border-red-500' : '' ?>" value="<?= old('address_line_1') ?>" placeholder="" />
                           <?php if(isset($errors['address_line_1'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['address_line_1'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="address_line_2">Address line 2</label>
                           <!-- <textarea class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" name="" id="" cols="30" rows="10"></textarea> -->
                           <input type="text" name="address_line_2" id="address_line_2" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['address_line_2']) ? 'border-red-500' : '' ?>" value="<?= old('address_line_2') ?>" placeholder="" />
                           <?php if(isset($errors['address_line_2'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['address_line_2'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="city">City</label>
                           <!-- <textarea class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" name="" id="" cols="30" rows="10"></textarea> -->
                           <input type="text" name="city" id="city" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['city']) ? 'border-red-500' : '' ?>" value="<?= old('city') ?>" placeholder="" />
                           <?php if(isset($errors['city'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['city'] ?></span>
                           <?php endif; ?>
                        </div>
                        
                        <div class="md:col-span-3">
                           <label for="province">Province</label>
                           <!-- <textarea class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" name="" id="" cols="30" rows="10"></textarea> -->
                           <input type="text" name="province" id="province" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['province']) ? 'border-red-500' : '' ?>" value="<?= old('province') ?>" placeholder="" />
                           <?php if(isset($errors['province'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['province'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="contact_person">Contact person</label>
                           <input type="text" name="contact_person" id="contact_person" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['contact_person']) ? 'border-red-500' : '' ?>" value="<?= old('contact_person') ?>" />
                           <?php if(isset($errors['contact_person'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['contact_person'] ?></span>
                           <?php endif; ?>
                        </div>

                        <div class="md:col-span-3">
                           <label for="position">Position</label>
                           <input type="text" name="position" id="position" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['position']) ? 'border-red-500' : '' ?>" value="<?= old('position') ?>" />
                           <?php if(isset($errors['position'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['position'] ?></span>
                           <?php endif; ?>
                        </div>
                        <!-- <div class="md:col-span-3">
                           <label for="territory">Territory</label>
                           <input type="text" name="territory" id="territory" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['territory']) ? 'border-red-500' : '' ?>" value="<?= old('territory') ?>" />
                           <?php if(isset($errors['territory'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['territory'] ?></span>
                           <?php endif; ?>
                        </div>
                        <div class="md:col-span-3">
                           <label for="tel_no">Tel / FAX No</label>
                           <input type="text" name="tel_no" id="tel_no" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['tel_no']) ? 'border-red-500' : '' ?>" value="<?= old('tel_no') ?>" />
                           <?php if(isset($errors['tel_no'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['tel_no'] ?></span>
                           <?php endif; ?>
                        </div>
                        <div class="md:col-span-3">
                           <label for="validity">Validity</label>
                           <input type="text" name="validity" id="validity" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['validity']) ? 'border-red-500' : '' ?>" value="<?= old('validity') ?>" />
                           <?php if(isset($errors['validity'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['validity'] ?></span>
                           <?php endif; ?>
                        </div>
                        <div class="md:col-span-3">
                           <label for="delivery">Delivery</label>
                           <input type="text" name="delivery" id="delivery" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['delivery']) ? 'border-red-500' : '' ?>" value="<?= old('delivery') ?>" />
                           <?php if(isset($errors['delivery'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['delivery'] ?></span>
                           <?php endif; ?>
                        </div> -->
                        <!-- <div class="md:col-span-3">
                           <label for="term_id">Terms</label>
                           <select id="term_id" name="term_id" autocomplete="term_id-name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['term_id']) ? 'border-red-500' : '' ?>">
                              <option value="" selected>-- Select term --</option >
                              <?php foreach($terms as $term): ?>
                                 <option value="<?= $term['id'] ?>"><?= ucwords($term['description']) ?></option >
                              <?php endforeach; ?>
                           </select>
                           <?php if(isset($errors['term_id'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['term_id'] ?></span>
                           <?php endif; ?>
                        </div> -->
                        <div class="md:col-span-3">
                           <label for="delivery">Delivery</label>
                           <select id="delivery" name="delivery" autocomplete="delivery-name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['delivery']) ? 'border-red-500' : '' ?>">
                              <option value="" selected>-- Select delivery --</option >
                              <?php foreach(\Core\Delivery::OPTIONS as $option): ?>
                                 <option value="<?= $option ?>"><?= ucwords($option) ?></option >
                              <?php endforeach; ?>
                           </select>
                           <?php if(isset($errors['delivery'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['delivery'] ?></span>
                           <?php endif; ?>
                        </div>
                        <div class="md:col-span-3">
                           <label for="vat">VAT</label>
                           <select id="vat" name="vat" autocomplete="vat-name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['vat']) ? 'border-red-500' : '' ?>">
                              <option value="" selected>-- Select VAT --</option >
                              <?php foreach(\Core\Vat::OPTIONS as $option): ?>
                                 <option value="<?= $option ?>"><?= ucwords($option) ?></option >
                              <?php endforeach; ?>
                           </select>
                           <?php if(isset($errors['vat'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['vat'] ?></span>
                           <?php endif; ?>
                        </div>
                        <div class="md:col-span-3">
                           <label for="needed_at">Date Needed</label>
                           <input type="date" name="needed_at" id="needed_at" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['needed_at']) ? 'border-red-500' : '' ?>" value="<?= old('needed_at') ?>" />
                           <?php if(isset($errors['needed_at'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['needed_at'] ?></span>
                           <?php endif; ?>
                        </div>
                        <div class="col-span-full">
                           <label for="attachments">Upload Attachments</label>
                           <!-- <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                              <div class="text-center">
                                 <svg class="mx-auto h-12 w-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                 </svg>
                                 <div class="mt-4 text-sm leading-6 text-gray-600">
                                    <label for="attachments" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                                       <span>Upload files</span>
                                       <input id="attachments" name="attachments[]" type="file" class="sr-only" multiple>
                                    </label>
                                 </div>
                                 <p class="text-xs leading-5 text-gray-600">JPEG, IMG, PDF, EXCEL, PNG, JPG, GIF </p>
                              </div>
                           </div> -->
                           <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25">
                              <main class="container mx-auto h-full">
                                 <!-- file upload modal -->
                                 <article aria-label="File Upload Modal" class="relative h-full flex flex-col bg-white shadow-xl rounded-md" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);" ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">
                                    <!-- overlay -->
                                    <div id="overlay" class="w-full h-full absolute top-0 left-0 pointer-events-none z-50 flex flex-col items-center justify-center rounded-md">
                                    <i>
                                       <svg class="fill-current w-12 h-12 mb-3 text-blue-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                          <path d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z" />
                                       </svg>
                                    </i>
                                    <p class="text-lg text-blue-700">Drop files to upload</p>
                                    </div>

                                    <!-- scroll area -->
                                    <section class="h-full overflow-auto p-8 w-full h-full flex flex-col">
                                    <header class="border-dashed border-2 border-gray-400 py-12 flex flex-col justify-center items-center">
                                       <p class="mb-3 font-semibold text-gray-900 flex flex-wrap justify-center">
                                          <span>Drag and drop your</span>&nbsp;<span>files anywhere or</span>
                                       </p>
                                       <input name="attachments[]" id="hidden-input" type="file" multiple class="hidden" />
                                       <button type="button" id="button" class="mt-2 rounded-sm px-3 py-1 bg-gray-200 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                                          Upload a file
                                       </button>
                                    </header>

                                    <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
                                       To Upload
                                    </h1>

                                    <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                       <li id="empty" class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                                          <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
                                          <span class="text-small text-gray-500">No files selected</span>
                                       </li>
                                    </ul>
                                    </section>

                                    <!-- sticky footer -->
                                    <!-- <footer class="flex justify-end px-8 pb-8 pt-4">
                                    <button type="button" id="submit" class="rounded-sm px-3 py-1 bg-blue-700 hover:bg-blue-500 text-white focus:shadow-outline focus:outline-none">
                                       Upload now
                                    </button>
                                    <button type="button" id="cancel" class="ml-3 rounded-sm px-3 py-1 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
                                       Cancel
                                    </button>
                                    </footer> -->
                                 </article>
                              </main>
                           </div>

                           <!-- using two similar templates for simplicity in js code -->
                           <template id="file-template">
                              <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                              <article tabindex="0" class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">
                                 <img alt="upload preview" class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />

                                 <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                    <h1 class="flex-1 group-hover:text-blue-800"></h1>
                                    <div class="flex">
                                    <span class="p-1 text-blue-800">
                                       <i>
                                          <svg class="fill-current w-4 h-4 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                          <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                          </svg>
                                       </i>
                                    </span>
                                    <p class="p-1 size text-xs text-gray-700"></p>
                                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                                       <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                          <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                       </svg>
                                    </button>
                                    </div>
                                 </section>
                              </article>
                              </li>
                           </template>

                           <template id="image-template">
                              <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
                              <article tabindex="0" class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                                 <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />

                                 <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                                    <h1 class="flex-1"></h1>
                                    <div class="flex">
                                    <span class="p-1">
                                       <i>
                                          <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                          <path d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                          </svg>
                                       </i>
                                    </span>

                                    <p class="p-1 size text-xs"></p>
                                    <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                                       <svg class="pointer-events-none fill-current w-4 h-4 ml-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                          <path class="pointer-events-none" d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                                       </svg>
                                    </button>
                                    </div>
                                 </section>
                              </article>
                              </li>
                           </template>

                        </div>
                        <div class="md:col-span-6 my-4">
                           <hr>
                        </div>
                        
                        <div class="md:col-span-3">
                           <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                              Products
                           </h3>
                        </div>
                        <div class="md:col-span-6 my-2">
                           <button onclick="toggleProductModal()" type="button" title="Add product" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm">Add Product</button>
                        </div>

                        <div class="md:col-span-6">
                           <div class="mx-auto">
                              <div class="flex flex-col">
                              <div class="overflow-x-auto shadow-md sm:rounded-lg">
                                 <div class="inline-block min-w-full align-middle">
                                       <div class="overflow-hidden ">
                                          <table id="productTable" class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                                             <thead class="bg-gray-100 dark:bg-gray-700">
                                                   <tr>
                                                      <!-- <th scope="col" class="p-4">
                                                         <div class="flex items-center">
                                                               <input id="checkbox-all" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                               <label for="checkbox-all" class="sr-only">checkbox</label>
                                                         </div>
                                                      </th> -->
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Quantity
                                                      </th>
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         UOM
                                                      </th>
                                                      <!-- <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Unit
                                                      </th> -->
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Code
                                                      </th>
                                                      <!-- <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Product Name
                                                      </th> -->
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Product Description
                                                      </th>
                                                      <!-- <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Stock available
                                                      </th> -->
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Previous price
                                                      </th>
                                                      <!-- <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Catalog price
                                                      </th> -->
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Catalog Price
                                                      </th>
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Quote price/deal
                                                      </th>
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Applied Discount
                                                      </th>
                                                      <!-- <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Approved price
                                                      </th> -->
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Total
                                                      </th>
                                                      <!-- <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Deal equivalent
                                                      </th> -->
                                                      <th scope="col" class="p-4">
                                                         <span class="sr-only">Edit</span>
                                                      </th>
                                                   </tr>
                                             </thead>
                                             <tbody id="productTableBody" class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                             </tbody>
                                          </table>
                                       </div>
                                 </div>
                              </div>
                              </div>
                           </div>
                        </div>
                  
                        <div class="mt-4 md:col-span-6 text-left">
                           <div class="inline-flex items-end">
                              <button id="submitButton" type="submit" class="w-32 font-bold bg-blue-500 hover:bg-blue-700 active:bg-blue-800 px-4 py-2 rounded-md text-white">Submit</button>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </form>

            <div id="productModal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
               <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

               <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                  <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
                     <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8">
                     <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <form id="productForm">
                           <div class="lg:col-span-2">
                              <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                                 Product Details
                              </h3>
                              <div class="grid gap-4 gap-y-2 text-sm grid-cols-6 md:grid-cols-6">
                                 <div class="col-span-6 md:col-span-6">
                                    <label for="product_code">Code</label>
                                    <input type="text" name="product_code" id="product_code" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['product_code']) ? 'border-red-500' : '' ?>" value="<?= old('product_code') ?>" required/>
                                    <?php if(isset($errors['product_code'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['product_code'] ?></span>
                                    <?php endif; ?>
                                    
                                    <ul id="dropdownOptions" class="px-4 rounded h-auto max-h-48 overflow-y-scroll">
                                          <!-- Options will be dynamically added here -->
                                    </ul>
                                 </div>
                                 <div class="col-span-3 md:col-span-3">
                                    <label for="product_qty">Quantity</label>
                                    <input type="hidden" name="id" id="id" value="" />
                                    <input type="text" name="product_qty" id="product_qty" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['product_qty']) ? 'border-red-500' : '' ?>" value="<?= old('product_qty') ?>" required/>
                                    <?php if(isset($errors['product_qty'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['product_qty'] ?></span>
                                    <?php endif; ?>
                                 </div>
                                 <div class="col-span-3 md:col-span-3">
                                    <label for="uom">UOM</label>
                                    <input readonly type="text" name="uom" id="uom" class="cursor-not-allowed h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['uom']) ? 'border-red-500' : '' ?>" value="<?= old('uom') ?>" required/>
                                    <?php if(isset($errors['uom'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['uom'] ?></span>
                                    <?php endif; ?>
                                 </div>

                                 <!-- <div class="col-span-2 md:col-span-2">
                                    <label for="product_unit">Unit</label>
                                    <input type="text" name="product_unit" id="product_unit" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['product_unit']) ? 'border-red-500' : '' ?>" value="<?= old('product_unit') ?>" required/>
                                    <?php if(isset($errors['product_unit'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['product_unit'] ?></span>
                                    <?php endif; ?>
                                 </div> -->

                                 <!-- <div class="col-span-3 md:col-span-6">
                                    <label for="product_name">Product name</label>
                                    <input type="text" name="product_name" id="product_name" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['product_name']) ? 'border-red-500' : '' ?>" value="<?= old('product_name') ?>" required/>
                                    <?php if(isset($errors['product_name'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['product_name'] ?></span>
                                    <?php endif; ?>
                                 </div> -->

                                 <!-- <div class="md:col-span-3">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['email']) ? 'border-red-500' : '' ?>" value="<?= old('email') ?>" />
                                    <?php if(isset($errors['email'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['email'] ?></span>
                                    <?php endif; ?>
                                 </div> -->

                                 <div class="col-span-6 md:col-span-6">
                                    <label for="product_description">Product description</label>
                                    <!-- <textarea class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" name="" id="" cols="30" rows="10"></textarea> -->
                                    <!-- <input type="text" name="product_description" id="product_description" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['product_description']) ? 'border-red-500' : '' ?>" value="<?= old('product_description') ?>" placeholder="" /> -->
                                    <textarea name="product_description" id="product_description" class="h-14 border mt-1 rounded p-2 w-full bg-gray-50 <?= isset($errors['product_description']) ? 'border-red-500' : '' ?>" name="" id="" cols="30" rows="10" required></textarea>
                                    <?php if(isset($errors['product_description'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['product_description'] ?></span>
                                    <?php endif; ?>
                                    <ul id="dropdownOptionsDescription" class="px-4 rounded h-auto max-h-48 overflow-y-scroll">
                                          <!-- Options will be dynamically added here -->
                                    </ul>
                                 </div>
                                 <div class="col-span-6 md:col-span-6">
                                    <label for="product_comment">Product comment</label>
                                    <textarea name="product_comment" id="product_comment" class="h-14 border mt-1 rounded p-2 w-full bg-gray-50 <?= isset($errors['product_comment']) ? 'border-red-500' : '' ?>" name="" id="" cols="30" rows="10"></textarea>
                                    <?php if(isset($errors['product_comment'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['product_comment'] ?></span>
                                    <?php endif; ?>
                                 </div>
                                 
                                 <!-- <div class="col-span-3 md:col-span-2">
                                    <label for="stock">Stock available</label>
                                    <input type="text" name="stock" id="stock" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['stock']) ? 'border-red-500' : '' ?>" value="<?= old('stock') ?>" required/>
                                    <?php if(isset($errors['stock'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['stock'] ?></span>
                                    <?php endif; ?>
                                 </div> -->

                                 <div class="col-span-3 md:col-span-3">
                                    <label for="comparative_price">Previous price</label>
                                    <input type="text" name="comparative_price" id="comparative_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['comparative_price']) ? 'border-red-500' : '' ?>" value="<?= old('comparative_price') ?>"/>
                                    <?php if(isset($errors['comparative_price'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['comparative_price'] ?></span>
                                    <?php endif; ?>
                                 </div>

                                 <!-- <div class="col-span-3 md:col-span-3">
                                    <label for="catalog_price">Catalog price</label>
                                    <input readonly type="text" name="catalog_price" id="catalog_price" class="cursor-not-allowed h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['catalog_price']) ? 'border-red-500' : '' ?>" value="<?= old('catalog_price') ?>" required/>
                                    <?php if(isset($errors['catalog_price'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['catalog_price'] ?></span>
                                    <?php endif; ?>
                                 </div> -->

                                 <div class="col-span-3 md:col-span-3">
                                    <label for="proposed_price">Quote price / deal</label>
                                    <input type="number" step="0.01" name="proposed_price" id="proposed_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['proposed_price']) ? 'border-red-500' : '' ?>" value="<?= old('proposed_price') ?>" required/>
                                    <?php if(isset($errors['proposed_price'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['proposed_price'] ?></span>
                                    <?php endif; ?>
                                    <div class="max-w-80">
                                       <span id="proposed_price_message" class="text-red-500"></span>
                                    </div>
                                 </div>
                                 <div class="col-span-3 md:col-span-3">
                                    <!-- <label for="wo_scd_price">W/O SCD Price</label> -->
                                    <label for="wo_scd_price">Catalog Price</label>
                                    <input readonly type="text" step="0.01" name="wo_scd_price" id="wo_scd_price" class="hidden cursor-not-allowed h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['wo_scd_price']) ? 'border-red-500' : '' ?>" value="<?= old('wo_scd_price') ?>" required/>
                                    
                                    <input readonly type="text" name="catalog_price" id="catalog_price" class="cursor-not-allowed h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['catalog_price']) ? 'border-red-500' : '' ?>" value="<?= old('catalog_price') ?>" required/>
                                    <?php if(isset($errors['wo_scd_price'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['wo_scd_price'] ?></span>
                                    <?php endif; ?>
                                 </div>
                                 <div class="col-span-3 md:col-span-3">
                                    <label for="additional_discount">Additional discount <span class="text-gray-400">(optional)</span></label>
                                    <input readonly type="number" max="79" name="additional_discount" id="additional_discount" class="cursor-not-allowed h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['additional_discount']) ? 'border-red-500' : '' ?>" value="<?= old('additional_discount') ?>"/>
                                 </div>
                                 <div class="col-span-3 md:col-span-3">
                                    <label for="applied_discount">Applied Discount</label>
                                    <input readonly type="number" name="applied_discount" id="applied_discount" class="cursor-not-allowed h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['applied_discount']) ? 'border-red-500' : '' ?>" value="<?= old('applied_discount') ?>" required/>
                                    <?php if(isset($errors['applied_discount'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['applied_discount'] ?></span>
                                    <?php endif; ?>
                                 </div>
                                 <!-- <div class="col-span-3 md:col-span-3">
                                    <label for="proposed_price_discount">Quoted price / deal (Discount in %)</label>
                                    <input type="number" min="20" max="99" step="0.01" name="proposed_price_discount" id="proposed_price_discount" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['proposed_price_discount']) ? 'border-red-500' : '' ?>" value="<?= old('proposed_price_discount') ?>" required/>
                                    <?php if(isset($errors['proposed_price_discount'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['proposed_price_discount'] ?></span>
                                    <?php endif; ?>
                                 </div> -->
                                 
                                 <!-- <div class="col-span-3 md:col-span-3">
                                    <label for="approved_price">Approved price</label>
                                    <input type="text" name="approved_price" id="approved_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['approved_price']) ? 'border-red-500' : '' ?>" value="<?= old('approved_price') ?>" required/>
                                    <?php if(isset($errors['approved_price'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['approved_price'] ?></span>
                                    <?php endif; ?>
                                 </div> -->

                                 <div class="col-span-3 md:col-span-3">
                                    <label for="product_total">Total</label>
                                    <input type="text" name="product_total" id="product_total" class="cursor-not-allowed h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['product_total']) ? 'border-red-500' : '' ?>" value="<?= old('product_total') ?>"/>
                                    <?php if(isset($errors['product_total'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['product_total'] ?></span>
                                    <?php endif; ?>
                                 </div>

                                 <!-- <div class="col-span-3 md:col-span-3">
                                    <label for="deal_equivalent">Deal Equivalent</label>
                                    <input type="text" name="deal_equivalent" id="deal_equivalent" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['deal_equivalent']) ? 'border-red-500' : '' ?>" value="<?= old('deal_equivalent') ?>" required/>
                                    <?php if(isset($errors['deal_equivalent'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['deal_equivalent'] ?></span>
                                    <?php endif; ?>
                                 </div> -->

                              </div>
                           </div>
                     <div class="bg-gray-50 py-3 sm:flex sm:flex-row-reverse">
                        <button id="productFormBtn" type="submit" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">Submit</button>
                        <button onclick="closeModal()" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                     </div>
                        </form>
                     </div>
                     </div>
                  </div>
               </div>
            </div>

            <pre id="pre"></pre>

         </main>
<!-- Footer -->
<?php require base_path('views/partials/footer.php') ?>

<style>
   .hasImage:hover section {
   background-color: rgba(5, 5, 5, 0.4);
   }
   .hasImage:hover button:hover {
   background: rgba(5, 5, 5, 0.45);
   }

   #overlay p,
   i {
   opacity: 0;
   }

   #overlay.draggedover {
   background-color: rgba(255, 255, 255, 0.7);
   }
   #overlay.draggedover p,
   #overlay.draggedover i {
   opacity: 1;
   }

   .group:hover .group-hover\:text-blue-800 {
   color: #2b6cb0;
   }
</style>

<script>
   const fileTempl = document.getElementById("file-template"),
   imageTempl = document.getElementById("image-template"),
   empty = document.getElementById("empty");

   // use to store pre selected files
   let FILES = {};

   // check if file is of type image and prepend the initialied
   // template to the target element
   function addFile(target, file) {
   const isImage = file.type.match("image.*"),
      objectURL = URL.createObjectURL(file);

   const clone = isImage
      ? imageTempl.content.cloneNode(true)
      : fileTempl.content.cloneNode(true);

   clone.querySelector("h1").textContent = file.name;
   clone.querySelector("li").id = objectURL;
   clone.querySelector(".delete").dataset.target = objectURL;
   clone.querySelector(".size").textContent =
      file.size > 1024
         ? file.size > 1048576
         ? Math.round(file.size / 1048576) + "mb"
         : Math.round(file.size / 1024) + "kb"
         : file.size + "b";

   isImage &&
      Object.assign(clone.querySelector("img"), {
         src: objectURL,
         alt: file.name
      });

   empty.classList.add("hidden");
   target.prepend(clone);

   FILES[objectURL] = file;
   }

   const gallery = document.getElementById("gallery"),
   overlay = document.getElementById("overlay");

   // click the hidden input of type file if the visible button is clicked
   // and capture the selected files
   const hidden = document.getElementById("hidden-input");
   document.getElementById("button").onclick = () => hidden.click();
   hidden.onchange = (e) => {
   for (const file of e.target.files) {
      addFile(gallery, file);
   }
   };

   // use to check if a file is being dragged
   const hasFiles = ({ dataTransfer: { types = [] } }) =>
   types.indexOf("Files") > -1;

   // use to drag dragenter and dragleave events.
   // this is to know if the outermost parent is dragged over
   // without issues due to drag events on its children
   let counter = 0;

   // reset counter and append file to gallery when file is dropped
   function dropHandler(ev) {
   ev.preventDefault();
   for (const file of ev.dataTransfer.files) {
      addFile(gallery, file);
      overlay.classList.remove("draggedover");
      counter = 0;
   }
   }

   // only react to actual files being dragged
   function dragEnterHandler(e) {
   e.preventDefault();
   if (!hasFiles(e)) {
      return;
   }
   ++counter && overlay.classList.add("draggedover");
   }

   function dragLeaveHandler(e) {
   1 > --counter && overlay.classList.remove("draggedover");
   }

   function dragOverHandler(e) {
   if (hasFiles(e)) {
      e.preventDefault();
   }
   }

   // event delegation to caputre delete events
   // fron the waste buckets in the file preview cards
   gallery.onclick = ({ target }) => {
   if (target.classList.contains("delete")) {
      const ou = target.dataset.target;
      document.getElementById(ou).remove(ou);
      gallery.children.length === 1 && empty.classList.remove("hidden");
      delete FILES[ou];
   }
   };

   // print all selected files
   // document.getElementById("submit").onclick = () => {
   //   alert(`Submitted Files:\n${JSON.stringify(FILES)}`);
   //   console.log(FILES);
   // };

   // // clear entire selection
   // document.getElementById("cancel").onclick = () => {
   //   while (gallery.children.length > 0) {
   //     gallery.lastChild.remove();
   //   }
   //   FILES = {};
   //   empty.classList.remove("hidden");
   //   gallery.append(empty);
   // };

</script>

<script>
   document.addEventListener("DOMContentLoaded", () => {
      refreshTableRow()
      document.getElementById('proposed_price').addEventListener('change', (e) => {
         // computeProposedPriceDiscount()
         // computeScdPrice()
         // computeAppliedDiscount()
         // computeTotal()
         handleDiscount()
      })
      document.getElementById('additional_discount').addEventListener('input', (e) => {
         // computeProposedPriceDiscount()
         computeScdPrice()
         computeAppliedDiscount()
         computeTotal()
      })

      const handleDiscount = () => {
         // computeProposedPriceDiscount()
         if(!isNaN(computeAppliedDiscount())){
            if(parseFloat(computeAppliedDiscount()) <= 20) {
               computeScdPrice()
               document.getElementById('additional_discount').readOnly = false
               document.getElementById('additional_discount').classList.remove('cursor-not-allowed')
               document.getElementById('proposed_price_message').innerText = ""
               document.getElementById('wo_scd_price').classList.remove('hidden')
               document.getElementById('catalog_price').classList.add('hidden')
            } else {
               document.getElementById('additional_discount').readOnly = true
               document.getElementById('additional_discount').classList.add('cursor-not-allowed')
               document.getElementById('wo_scd_price').value = document.getElementById('catalog_price').value
               document.getElementById('applied_discount').value = Math.trunc(computeAppliedDiscount()*Math.pow(10, 2))/Math.pow(10, 2)
               document.getElementById('proposed_price_message').innerText = "Warning: Your offer price is below Minimum level."
               document.getElementById('wo_scd_price').classList.add('hidden')
               document.getElementById('catalog_price').classList.remove('hidden')
            }
         } else {
            
            document.getElementById('catalog_price').value = computeScdPrice()
            console.log(computeScdPrice())
         }
         computeTotal()
      }
      // document.getElementById('proposed_price_discount').addEventListener('input', (e) => {
      //    computeProposedPrice()
      //    computeTotal()
      // })

      document.getElementById('product_qty').addEventListener('input', (e) => {
         // computeProposedPrice(e)
         computeTotal()
      })

      // document.getElementById('catalog_price').addEventListener('change', (e) => {
      //    if(document.getElementById('proposed_price').value !== '') {
      //       computeProposedPriceDiscount()
      //    } else {
      //       computeProposedPrice()
      //    }
      //    // // computeProposedPrice(e)
      //    computeTotal()
      // })
   });

   const computeScdPrice = () => {
      const proposed_price = parseFloat(document.getElementById('proposed_price').value)
      const additional_discount = parseFloat(document.getElementById('additional_discount').value)
      let reverse_cal = 0.8
      if(additional_discount && additional_discount < (reverse_cal * 100)) {
         reverse_cal -= (additional_discount / 100)
      }
      const wo_scd_price = proposed_price / reverse_cal
      document.getElementById('wo_scd_price').value = Math.trunc(wo_scd_price*Math.pow(10, 2))/Math.pow(10, 2)
      document.getElementById('applied_discount').value = Math.trunc(((wo_scd_price - proposed_price) / wo_scd_price * 100)*Math.pow(10, 2))/Math.pow(10, 2)
      return Math.trunc(wo_scd_price*Math.pow(10, 2))/Math.pow(10, 2)
   }
   const computeAppliedDiscount = () => {
      const proposed_price = parseFloat(document.getElementById('proposed_price').value)
      const catalog_price = parseFloat(document.getElementById('catalog_price').value)
      const applied_discount = 100 - (proposed_price / catalog_price * 100)
      // document.getElementById('applied_discount').value = applied_discount.toFixed(2)
      // document.getElementById('applied_discount').value = Math.trunc(applied_discount*Math.pow(10, 2))/Math.pow(10, 2)
      return applied_discount
   }
   // const computeProposedPriceDiscount = () => {
   //    const catalog_price = document.getElementById('catalog_price').value
   //    // console.log(catalog_price)
   //    if(catalog_price){
   //       const proposed_price_discount = (catalog_price - document.getElementById('proposed_price').value) / catalog_price * 100
   //       document.getElementById('proposed_price_discount').value = proposed_price_discount
   //    }
   // }

   // const computeProposedPrice = () => {
   //    const catalog_price = document.getElementById('catalog_price').value
   //    // console.log(catalog_price)
   //    if(catalog_price){
   //       const proposed_price = catalog_price - (catalog_price * document.getElementById('proposed_price_discount').value / 100)
   //       document.getElementById('proposed_price').value = proposed_price
   //    }
   //    // console.log(document.getElementById('proposed_price_discount').value)
   // }

   const computeTotal = () => {
      const product_qty = document.getElementById('product_qty').value
      const proposed_price = document.getElementById('proposed_price').value
      document.getElementById('product_total').value =  proposed_price * product_qty
   }

   const toggleProductModal = () => {
      const modal = document.getElementById('productModal')
      modal.classList.toggle('hidden')
   }

   const closeModal = () => {
      resetForm()
      toggleProductModal()
   }

   const productForm = document.getElementById('productForm')
   const productFormBtn = document.getElementById('productFormBtn')
   const successPanel = document.querySelector('.success-panel')
   const errorPanel = document.querySelector('.error-panel')
   const successMessage = document.querySelector('.successMessage')
   const errorMessage = document.querySelector('.errorMessage')
   let productLists = []

   productForm.addEventListener('submit', (e) => {
      e.preventDefault()
      const formData = new FormData(productForm);

      if(productLists.length <= 0) {
         document.getElementById('productTable').deleteRow(1)
      }

      // An object with { key: values }.
      const product = Object.fromEntries(formData);

      if(!product.id) {
         product.id = parseInt(productLists.length + 1)
   
         productLists.push(product)
   
         addRow(product)
      } else {
         updateProduct(parseInt(product.id), product)
         refreshTableRow()
      }
      resetForm()
      toggleProductModal()

      console.log(productLists)
      // console.log(JSON.stringify(productLists))
   })

   const resetForm = () => {
      document.getElementById('id').value = ''
      document.getElementById("productForm").reset();
   }
   const resetQuotationForm = () => {
      // document.getElementById('id').value = ''
      document.getElementById("quotationForm").reset();
   }

   const refreshTableRow = () => {
      document.getElementById('productTableBody').innerHTML = ''
      if(productLists.length <= 0) {
         // Get the table body element in which you want to add row
         let table = document.getElementById("productTableBody");
         
         // Create row element
         let row = document.createElement("tr")

         let c = document.createElement("td")
         c.classList.add('py-4', 'px-6', 'text-sm', 'font-medium', 'text-gray-900', 'whitespace-nowrap', 'dark:text-white', 'text-center')
         c.colSpan = "9"
         c.innerText = "No products Selected"

         // Append cells to row
         row.appendChild(c);
         // Append row to table body
         table.appendChild(row)
      } else {
         productLists.forEach(product => {
            addRow(product)
         })
      }
   }

   const addRow = (product) => {

      let cells = [
         'product_qty',
         'uom',
         // 'product_unit',
         'product_code',
         // 'product_name',
         'product_description',
         // 'stock',
         'comparative_price',
         // 'catalog_price',
         'wo_scd_price',
         'proposed_price',
         'applied_discount',
         // 'approved_price',
         'product_total',
         // 'deal_equivalent',
         'action',
      ]

      // Get the table body element in which you want to add row
      let table = document.getElementById("productTableBody");
   
      // Create row element
      let row = document.createElement("tr")

      // Create cells
      cells.forEach(cell => {
         let c = document.createElement("td")
         if(cell !== 'action') {
            c.classList.add('py-4', 'px-6', 'text-sm', 'font-medium', 'text-gray-900', 'whitespace-nowrap', 'dark:text-white')
            c.innerText = product[cell]
         }
         else {
            c.classList.add('py-4', 'px-6', 'text-sm', 'font-medium', 'text-right', 'whitespace-nowrap')
            let editBtn = document.createElement("a")
            editBtn.classList.add('text-blue-600', 'dark:text-blue-500', 'hover:underline', 'cursor-pointer', 'mb-2', 'mr-2')
            editBtn.innerText = `Edit`
            editBtn.addEventListener('click', (e) => {
               e.preventDefault()
               editProduct(product)
            })
            let deleteBtn = document.createElement("a")
            deleteBtn.classList.add('text-red-600', 'dark:text-red-500', 'hover:underline', 'cursor-pointer', 'mb-2', 'mr-2')
            deleteBtn.innerText = `Delete`
            deleteBtn.addEventListener('click', (e) => {
               e.preventDefault()
               removeProduct(product.id)
            })
            c.appendChild(editBtn)
            c.appendChild(deleteBtn)
         }

         // Append cells to row
         row.appendChild(c);
      })
      // // Append row to table body
      table.appendChild(row)
   }


   const editProduct = (product) => {
      let cells = [
         'product_qty',
         'uom',
         // 'product_unit',
         'product_code',
         // 'product_name',
         'product_description',
         // 'stock',
         'comparative_price',
         'catalog_price',
         'proposed_price',
         'wo_scd_price',
         'additional_discount',
         'applied_discount',
         // 'approved_price',
         'product_total',
         // 'deal_equivalent',
         'id'
      ]

      cells.forEach(cell =>  {
         document.getElementById(cell).value = product[cell]
      })
      toggleProductModal()
   }

   const updateProduct = (id, product) => {
      const index = productLists.findIndex(item => item.id == id)

      // Check if the object with the given ID was found
      if (index !== -1) {
         // Update the properties with new data
         productLists[index] = { ...productLists[index], ...product };
      } else {
         console.log('Item not found with ID:', id);
      }
   }

   const removeProduct = (id) => {
      productLists = productLists.filter(product => product.id != id)
      refreshTableRow()
   }

   
   const quotationForm = document.getElementById('quotationForm')
   quotationForm.addEventListener('submit', (e) => {
      e.preventDefault()
      const formData = new FormData(quotationForm)
      formData.append("products", JSON.stringify(productLists))
      // for (const pair of formData.entries()) {
      //    console.log(pair[0], pair[1]);
      // }
      sendData(formData)
   })

   async function sendData(formData) {
      const submitButton = document.getElementById('submitButton')
      try {
         hideMessage()
         submitButton.className = '';
         submitButton.className = 'w-32 bg-gray-300 px-4 py-2 rounded-md cursor-not-allowed opacity-50';
         submitButton.disabled = true;
         submitButton.innerText = "Loading...";
         const response = await fetch("/quotation", {
            method: "POST",
            body: formData,
         });
         const data = await response.json()
         if (data.success) {
            successPanel.classList.remove('hidden')
            successMessage.innerText = data.message
            document.getElementById('app').scrollIntoView({ behavior: 'smooth', block: 'start' });
            successPanel.focus()
            submitButton.className = '';
            submitButton.className = 'w-32 font-bold bg-blue-500 hover:bg-blue-700 active:bg-blue-800 px-4 py-2 rounded-md text-white';
            submitButton.disabled = false;
            submitButton.innerText = "Submit";
            resetQuotationForm()
            productLists = []
            refreshTableRow()
         } else {
            errorMessage.innerHTML = ''
            errorPanel.classList.remove('hidden')
            const ul = document.createElement('ul')
            ul.className = 'px-4 list-disc'
            if(typeof(data.message) === 'string') {
               const li = document.createElement('li')
               li.innerText = data.message
               ul.appendChild(li)
            } else {
               Object.values(data.message).forEach(error => {
                  // console.log(error)
                  const li = document.createElement('li')
                  li.innerText = error
                  ul.appendChild(li)
               })
            }
            console.log(data.message)
            errorMessage.appendChild(ul)
            document.getElementById('app').scrollIntoView({ behavior: 'smooth', block: 'start' });
            errorPanel.focus()
            submitButton.className = '';
            submitButton.className = 'w-32 font-bold bg-blue-500 hover:bg-blue-700 active:bg-blue-800 px-4 py-2 rounded-md text-white';
            submitButton.disabled = false;
            submitButton.innerText = "Submit";
         }
         // console.log(data.success);
      } catch (e) {
         console.error(e);
      }
   }

   const hideMessage = () => {
      successPanel.classList.add('hidden')
      
      errorPanel.classList.add('hidden')
   }

</script>

<!-- <script src="../js/products.js"></script> -->
<script>
//    document.addEventListener("DOMContentLoaded", function () {
//     const searchInput = document.getElementById("product_description");
//     const dropdownOptions = document.getElementById("dropdownOptions");

//    // allOptions = [...new Set(allOptions)]
//    // console.log(allOptions)
//    // Create a Set with unique names
//    const uniqueNamesSet = new Set(allOptions.map((option) => option.name));
   
//    // Create a new array with unique items
//    const uniqueOptions = [...uniqueNamesSet].map((uniqueName) => {
//       return allOptions.find((option) => option.name == uniqueName);
//    });
//    // console.log(allOptions.length)
//    // console.log(uniqueOptions.length)

//     // Event listener for input changes
//     searchInput.addEventListener("input", function () {
//         const searchTerm = searchInput.value.toLowerCase();
//         const filteredOptions = uniqueOptions.filter(option =>
//             option.name.toLowerCase().includes(searchTerm)
//         );

//         // Update the dropdown with filtered options
//         renderOptions(filteredOptions);
//     });

//     function renderOptions(options) {
//         // Clear existing options
//         dropdownOptions.innerHTML = "";

//         // Render filtered options
//         options.forEach(option => {
//             const li = document.createElement("li");
//             li.textContent = option.name;
//             li.className = 'text-gray-900 text-lg cursor-pointer hover:text-blue-500'

//             // Event listener for option click
//             li.addEventListener("click", function () {
//                 searchInput.value = option.name;
//                 document.getElementById('product_code').value  = option.code;
//                 // Additional action when an option is selected

//                 // Close the dropdown
//                 dropdownOptions.style.display = "none";
//             });

//             dropdownOptions.appendChild(li);
//         });

//         // Show or hide the dropdown based on the number of filtered options
//         dropdownOptions.style.display = options.length > 0 ? "block" : "none";
//     }

//     // Close dropdown when clicking outside
//     document.addEventListener("click", function (event) {
//         if (!event.target.closest(".searchable-dropdown")) {
//             dropdownOptions.style.display = "none";
//         }
//     });
// });


const searchInput = document.getElementById("product_code");
const dropdownOptions = document.getElementById("dropdownOptions");
const searchInputDescription = document.getElementById("product_description");
const dropdownOptionsDescription = document.getElementById("dropdownOptionsDescription");

const getProductLists = async () => {
try{
   const response = await fetch("/getProductLists")
   const data = await response.json()
   return data
} catch(e) {
   console.error(e)
}
}

// Event listener for input changes
searchInput.addEventListener("input", async function () {
   const searchTerm = searchInput.value.toLowerCase();
   try {
      const data = await getProductLists();
      
      const filteredOptions = data.filter(option =>
         option.code.toLowerCase().includes(searchTerm)
      );

      // Update the dropdown with filtered options
      renderOptions(filteredOptions);
   } catch (error) {
      console.error(error);
   }
});
// Event listener for input changes
searchInputDescription.addEventListener("input", async function () {
   const searchTerm = searchInputDescription.value.toLowerCase();
   try {
      const data = await getProductLists();
      
      const filteredOptions = data.filter(option =>
         option.description.toLowerCase().includes(searchTerm)
      );

      // Update the dropdown with filtered options
      renderOptionsDescription(filteredOptions);
   } catch (error) {
      console.error(error);
   }
});

function renderOptions(options) {
   // Clear existing options
   dropdownOptions.innerHTML = "";
   const region = document.getElementById('region').value

   // Render filtered options
   options.forEach(option => {
      const li = document.createElement("li");
      li.textContent = option.code;
      li.className = 'text-gray-900 text-lg cursor-pointer hover:text-blue-500 py-1'

      // Event listener for option click
      li.addEventListener("click", function () {
            searchInput.value = option.code
            document.getElementById('product_description').value  = option.description
            document.getElementById('uom').value  = option.uom
            let price
            if(region !== 'manila'){
               price = option.manila_price ?? ''
               // document.getElementById('catalog_price').value  = price = option.manila_price ?? ''
               // document.getElementById('wo_scd_price').value  = price = option.manila_price ?? ''
            }
            else{
               price = option.province_price ?? ''
               // document.getElementById('catalog_price').value  = price = option.province_price ?? ''
               // document.getElementById('wo_scd_price').value  = price = option.province_price ?? ''
            }
            document.getElementById('catalog_price').value  = price
            document.getElementById('wo_scd_price').value  = price
            // if(price == '' || price == null) {
               document.getElementById('applied_discount').value  = ''
               document.getElementById('proposed_price').value  = ''
            // }
            // Additional action when an option is selected

            // Close the dropdown
            dropdownOptions.style.display = "none";
            // computeScdPrice()
            // computeAppliedDiscount()
      });

      dropdownOptions.appendChild(li);
   });

   // Show or hide the dropdown based on the number of filtered options
   dropdownOptions.style.display = options.length > 0 ? "block" : "none";
}
function renderOptionsDescription(options) {
   // Clear existing options
   dropdownOptionsDescription.innerHTML = "";
   const region = document.getElementById('region').value

   // Render filtered options
   options.forEach(option => {
      const li = document.createElement("li");
      li.textContent = option.description;
      li.className = 'text-gray-900 text-lg cursor-pointer hover:text-blue-500 py-1'

      // Event listener for option click
      li.addEventListener("click", function () {
            searchInputDescription.value = option.description
            document.getElementById('product_code').value  = option.code
            document.getElementById('uom').value  = option.uom
            let price
            if(region !== 'manila'){
               price = option.manila_price ?? ''
               // document.getElementById('catalog_price').value  = price = option.manila_price ?? ''
               // document.getElementById('wo_scd_price').value  = price = option.manila_price ?? ''
            }
            else{
               price = option.province_price ?? ''
               // document.getElementById('catalog_price').value  = price = option.province_price ?? ''
               // document.getElementById('wo_scd_price').value  = price = option.province_price ?? ''
            }
            document.getElementById('catalog_price').value  = price
            document.getElementById('wo_scd_price').value  = price
            // if(price == '' || price == null) {
               document.getElementById('applied_discount').value  = ''
               document.getElementById('proposed_price').value  = ''
            // }
            // Additional action when an option is selected

            // Close the dropdown
            dropdownOptionsDescription.style.display = "none";
            // computeScdPrice()
            // computeAppliedDiscount()
      });

      dropdownOptionsDescription.appendChild(li);
   });

   // Show or hide the dropdown based on the number of filtered options
   dropdownOptionsDescription.style.display = options.length > 0 ? "block" : "none";
}

// Close dropdown when clicking outside
document.addEventListener("click", function (event) {
   if (!event.target.closest(".searchable-dropdown")) {
      dropdownOptions.style.display = "none";
      dropdownOptionsDescription.style.display = "none";
   }
});
</script>