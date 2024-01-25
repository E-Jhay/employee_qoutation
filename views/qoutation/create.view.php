
<?php require base_path('views/partials/head.php') ?>
      <!-- Navbar -->
   <?php require base_path('views/partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require base_path('views/partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative lg:ml-64">
         <main class="pt-6 px-2 lg:px-8">
            <div class="flex justify-start gap-2">
               <a href="/qoutations" title="Export" class="cursor-pointer bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-sm hover:text-white py-1.5 px-2 border border-gray-500 hover:border-transparent rounded">Go back</a>
            </div>

            <?php require base_path('views/partials/banner.php') ?>
            <?php require base_path('views/partials/alerts.php') ?>
            <!-- component -->
            <form id="qoutationForm">
               <div class="bg-white rounded shadow-lg p-4 px-2 md:p-8 mb-6">
                  <div class="lg:col-span-2">
                     <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                        Qoutation Details
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
                           <label for="email">Email</label>
                           <input type="text" name="email" id="email" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['email']) ? 'border-red-500' : '' ?>" value="<?= old('email') ?>" />
                           <?php if(isset($errors['email'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['email'] ?></span>
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
                        <div class="md:col-span-3">
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
                        </div>
                        <div class="md:col-span-6">
                           <label for="terms">Terms</label>
                           <textarea name="terms" id="terms" class="h-14 border mt-1 rounded p-2 w-full bg-gray-50 <?= isset($errors['terms']) ? 'border-red-500' : '' ?>" name="" id="" cols="30" rows="10"></textarea>
                           <?php if(isset($errors['terms'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['terms'] ?></span>
                           <?php endif; ?>
                        </div>
                        <div class="md:col-span-3">
                           <label for="needed_at">Date Needed</label>
                           <input type="date" name="needed_at" id="needed_at" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['needed_at']) ? 'border-red-500' : '' ?>" value="<?= old('needed_at') ?>" />
                           <?php if(isset($errors['needed_at'])): ?>
                              <span class="text-red-500 text-xs"><?= $errors['needed_at'] ?></span>
                           <?php endif; ?>
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
                                                         Unit
                                                      </th>
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
                                                         Comparative price
                                                      </th>
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Catalog price
                                                      </th>
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Proposed price/deal
                                                      </th>
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Proposed price/deal (Discount in %)
                                                      </th>
                                                      <!-- <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Approved price
                                                      </th> -->
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Discounted Total
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
                                 <div class="col-span-2 md:col-span-2">
                                    <label for="product_qty">Quantity</label>
                                    <input type="hidden" name="id" id="id" value="" />
                                    <input type="text" name="product_qty" id="product_qty" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['product_qty']) ? 'border-red-500' : '' ?>" value="<?= old('product_qty') ?>" required/>
                                    <?php if(isset($errors['product_qty'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['product_qty'] ?></span>
                                    <?php endif; ?>
                                 </div>

                                 <div class="col-span-2 md:col-span-2">
                                    <label for="product_unit">Unit</label>
                                    <input type="text" name="product_unit" id="product_unit" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['product_unit']) ? 'border-red-500' : '' ?>" value="<?= old('product_unit') ?>" required/>
                                    <?php if(isset($errors['product_unit'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['product_unit'] ?></span>
                                    <?php endif; ?>
                                 </div>

                                 <div class="col-span-2 md:col-span-2">
                                    <label for="product_code">Code</label>
                                    <input type="text" name="product_code" id="product_code" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['product_code']) ? 'border-red-500' : '' ?>" value="<?= old('product_code') ?>" required/>
                                    <?php if(isset($errors['product_code'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['product_code'] ?></span>
                                    <?php endif; ?>
                                 </div>

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
                                    
                                    <ul id="dropdownOptions" class="px-4 rounded h-auto max-h-48 overflow-y-scroll">
                                          <!-- Options will be dynamically added here -->
                                    </ul>
                                 </div>
                                 
                                 <!-- <div class="col-span-3 md:col-span-2">
                                    <label for="stock">Stock available</label>
                                    <input type="text" name="stock" id="stock" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['stock']) ? 'border-red-500' : '' ?>" value="<?= old('stock') ?>" required/>
                                    <?php if(isset($errors['stock'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['stock'] ?></span>
                                    <?php endif; ?>
                                 </div> -->

                                 <div class="col-span-3 md:col-span-3">
                                    <label for="comparative_price">Comparative price</label>
                                    <input type="text" name="comparative_price" id="comparative_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['comparative_price']) ? 'border-red-500' : '' ?>" value="<?= old('comparative_price') ?>" required/>
                                    <?php if(isset($errors['comparative_price'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['comparative_price'] ?></span>
                                    <?php endif; ?>
                                 </div>

                                 <div class="col-span-3 md:col-span-3">
                                    <label for="catalog_price">Catalog price</label>
                                    <input type="text" name="catalog_price" id="catalog_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['catalog_price']) ? 'border-red-500' : '' ?>" value="<?= old('catalog_price') ?>" required/>
                                    <?php if(isset($errors['catalog_price'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['catalog_price'] ?></span>
                                    <?php endif; ?>
                                 </div>

                                 <div class="col-span-3 md:col-span-3">
                                    <label for="proposed_price">Proposed price / deal</label>
                                    <input type="number" step="0.01" name="proposed_price" id="proposed_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['proposed_price']) ? 'border-red-500' : '' ?>" value="<?= old('proposed_price') ?>" required/>
                                    <?php if(isset($errors['proposed_price'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['proposed_price'] ?></span>
                                    <?php endif; ?>
                                 </div>
                                 <div class="col-span-3 md:col-span-3">
                                    <label for="proposed_price_discount">Proposed price / deal (Discount in %)</label>
                                    <input type="number" min="20" max="99" step="0.01" name="proposed_price_discount" id="proposed_price_discount" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['proposed_price_discount']) ? 'border-red-500' : '' ?>" value="<?= old('proposed_price_discount') ?>" required/>
                                    <?php if(isset($errors['proposed_price_discount'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['proposed_price_discount'] ?></span>
                                    <?php endif; ?>
                                 </div>
                                 
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

<script>
   document.addEventListener("DOMContentLoaded", () => {
      refreshTableRow()
      document.getElementById('proposed_price').addEventListener('input', (e) => {
         computeProposedPriceDiscount()
         computeTotal()
      })
      document.getElementById('proposed_price_discount').addEventListener('input', (e) => {
         computeProposedPrice()
         computeTotal()
      })

      document.getElementById('product_qty').addEventListener('input', (e) => {
         // computeProposedPrice(e)
         computeTotal()
      })

      document.getElementById('catalog_price').addEventListener('change', (e) => {
         if(document.getElementById('proposed_price').value !== '') {
            computeProposedPriceDiscount()
         } else {
            computeProposedPrice()
         }
         // // computeProposedPrice(e)
         computeTotal()
      })
   });

   const computeProposedPriceDiscount = () => {
      const catalog_price = document.getElementById('catalog_price').value
      // console.log(catalog_price)
      if(catalog_price){
         const proposed_price_discount = (catalog_price - document.getElementById('proposed_price').value) / catalog_price * 100
         document.getElementById('proposed_price_discount').value = proposed_price_discount
      }
   }

   const computeProposedPrice = () => {
      const catalog_price = document.getElementById('catalog_price').value
      // console.log(catalog_price)
      if(catalog_price){
         const proposed_price = catalog_price - (catalog_price * document.getElementById('proposed_price_discount').value / 100)
         document.getElementById('proposed_price').value = proposed_price
      }
      // console.log(document.getElementById('proposed_price_discount').value)
   }

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
   const resetQoutationForm = () => {
      // document.getElementById('id').value = ''
      document.getElementById("qoutationForm").reset();
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
         c.colSpan = "13"
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
         'product_unit',
         'product_code',
         // 'product_name',
         'product_description',
         // 'stock',
         'comparative_price',
         'catalog_price',
         'proposed_price',
         'proposed_price_discount',
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
         'product_unit',
         'product_code',
         // 'product_name',
         'product_description',
         // 'stock',
         'comparative_price',
         'catalog_price',
         'proposed_price',
         'proposed_price_discount',
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
      const index = productLists.findIndex(item => item.id === id)

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

   
   const qoutationForm = document.getElementById('qoutationForm')
   qoutationForm.addEventListener('submit', (e) => {
      e.preventDefault()
      const formData = new FormData(qoutationForm)
      formData.append("products", JSON.stringify(productLists))

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
         const response = await fetch("/qoutation", {
            method: "POST",
            body: formData,
         });
         const data = await response.json()
         if (data.success) {
            successPanel.classList.remove('hidden')
            successMessage.innerText = data.message
            document.getElementById('main-content').scrollIntoView({ behavior: 'smooth', block: 'start' });
            successPanel.focus()
            submitButton.className = '';
            submitButton.className = 'w-32 font-bold bg-blue-500 hover:bg-blue-700 active:bg-blue-800 px-4 py-2 rounded-md text-white';
            submitButton.disabled = false;
            submitButton.innerText = "Submit";
         } else {
            errorPanel.classList.remove('hidden')
            errorMessage.innerText = data.message
            document.getElementById('main-content').scrollIntoView({ behavior: 'smooth', block: 'start' });
            errorPanel.focus()
            submitButton.className = '';
            submitButton.className = 'w-32 font-bold bg-blue-500 hover:bg-blue-700 active:bg-blue-800 px-4 py-2 rounded-md text-white';
            submitButton.disabled = false;
            submitButton.innerText = "Submit";
         }
         resetQoutationForm()
         productLists = []
         refreshTableRow()
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

<script src="../js/products.js"></script>
<script>
   document.addEventListener("DOMContentLoaded", function () {
    const searchInput = document.getElementById("product_description");
    const dropdownOptions = document.getElementById("dropdownOptions");

   // allOptions = [...new Set(allOptions)]
   // console.log(allOptions)
   // Create a Set with unique names
   const uniqueNamesSet = new Set(allOptions.map((option) => option.name));
   
   // Create a new array with unique items
   const uniqueOptions = [...uniqueNamesSet].map((uniqueName) => {
      return allOptions.find((option) => option.name === uniqueName);
   });
   // console.log(allOptions.length)
   // console.log(uniqueOptions.length)

    // Event listener for input changes
    searchInput.addEventListener("input", function () {
        const searchTerm = searchInput.value.toLowerCase();
        const filteredOptions = uniqueOptions.filter(option =>
            option.name.toLowerCase().includes(searchTerm)
        );

        // Update the dropdown with filtered options
        renderOptions(filteredOptions);
    });

    function renderOptions(options) {
        // Clear existing options
        dropdownOptions.innerHTML = "";

        // Render filtered options
        options.forEach(option => {
            const li = document.createElement("li");
            li.textContent = option.name;
            li.className = 'text-gray-900 text-lg cursor-pointer hover:text-blue-500'

            // Event listener for option click
            li.addEventListener("click", function () {
                searchInput.value = option.name;
                document.getElementById('product_code').value  = option.code;
                // Additional action when an option is selected

                // Close the dropdown
                dropdownOptions.style.display = "none";
            });

            dropdownOptions.appendChild(li);
        });

        // Show or hide the dropdown based on the number of filtered options
        dropdownOptions.style.display = options.length > 0 ? "block" : "none";
    }

    // Close dropdown when clicking outside
    document.addEventListener("click", function (event) {
        if (!event.target.closest(".searchable-dropdown")) {
            dropdownOptions.style.display = "none";
        }
    });
});
</script>