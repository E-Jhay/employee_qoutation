
<?php require base_path('views/partials/head.php') ?>
      <!-- Navbar -->
   <?php require base_path('views/partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require base_path('views/partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-2 lg:px-8">
            <div class="flex justify-start gap-2">
               <a href="/qoutations" title="Export" class="cursor-pointer bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-sm hover:text-white py-1.5 px-2 border border-gray-500 hover:border-transparent rounded">Go back</a>
            </div>
            <?php require base_path('views/partials/banner.php') ?>
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
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Stock available
                                                      </th>
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
                                                         Approved price
                                                      </th>
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Total
                                                      </th>
                                                      <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                                         Deal equivalent
                                                      </th>
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
                              <button type="submit" class="w-32 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">Submit</button>
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
                                 </div>
                                 
                                 <div class="col-span-3 md:col-span-2">
                                    <label for="stock">Stock available</label>
                                    <input type="text" name="stock" id="stock" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['stock']) ? 'border-red-500' : '' ?>" value="<?= old('stock') ?>" required/>
                                    <?php if(isset($errors['stock'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['stock'] ?></span>
                                    <?php endif; ?>
                                 </div>

                                 <div class="col-span-3 md:col-span-2">
                                    <label for="comparative_price">Comparative price</label>
                                    <input type="text" name="comparative_price" id="comparative_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['comparative_price']) ? 'border-red-500' : '' ?>" value="<?= old('comparative_price') ?>" required/>
                                    <?php if(isset($errors['comparative_price'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['comparative_price'] ?></span>
                                    <?php endif; ?>
                                 </div>

                                 <div class="col-span-3 md:col-span-2">
                                    <label for="catalog_price">Catalog price</label>
                                    <input type="text" name="catalog_price" id="catalog_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['catalog_price']) ? 'border-red-500' : '' ?>" value="<?= old('catalog_price') ?>" required/>
                                    <?php if(isset($errors['catalog_price'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['catalog_price'] ?></span>
                                    <?php endif; ?>
                                 </div>

                                 <div class="col-span-3 md:col-span-3">
                                    <label for="proposed_price">Proposed price / deal</label>
                                    <input type="text" name="proposed_price" id="proposed_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['proposed_price']) ? 'border-red-500' : '' ?>" value="<?= old('proposed_price') ?>" required/>
                                    <?php if(isset($errors['proposed_price'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['proposed_price'] ?></span>
                                    <?php endif; ?>
                                 </div>
                                 
                                 <div class="col-span-3 md:col-span-3">
                                    <label for="approved_price">Approved price</label>
                                    <input type="text" name="approved_price" id="approved_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['approved_price']) ? 'border-red-500' : '' ?>" value="<?= old('approved_price') ?>" required/>
                                    <?php if(isset($errors['approved_price'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['approved_price'] ?></span>
                                    <?php endif; ?>
                                 </div>

                                 <div class="col-span-3 md:col-span-3">
                                    <label for="product_total">Total</label>
                                    <input type="text" name="product_total" id="product_total" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['product_total']) ? 'border-red-500' : '' ?>" value="<?= old('product_total') ?>" required/>
                                    <?php if(isset($errors['product_total'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['product_total'] ?></span>
                                    <?php endif; ?>
                                 </div>

                                 <div class="col-span-3 md:col-span-3">
                                    <label for="deal_equivalent">Deal Equivalent</label>
                                    <input type="text" name="deal_equivalent" id="deal_equivalent" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50 <?= isset($errors['deal_equivalent']) ? 'border-red-500' : '' ?>" value="<?= old('deal_equivalent') ?>" required/>
                                    <?php if(isset($errors['deal_equivalent'])): ?>
                                       <span class="text-red-500 text-xs"><?= $errors['deal_equivalent'] ?></span>
                                    <?php endif; ?>
                                 </div>

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

         </main>
<!-- Footer -->
<?php require base_path('views/partials/footer.php') ?>

<script>
   document.addEventListener("DOMContentLoaded", () => {
      refreshTableRow()
   });
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

      // console.log(productLists)
      // console.log(JSON.stringify(productLists))
   })

   const resetForm = () => {
      document.getElementById('id').value = ''
      document.getElementById("productForm").reset();
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
         'stock',
         'comparative_price',
         'catalog_price',
         'proposed_price',
         'approved_price',
         'product_total',
         'deal_equivalent',
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
         'stock',
         'comparative_price',
         'catalog_price',
         'proposed_price',
         'approved_price',
         'product_total',
         'deal_equivalent',
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
      // Construct a FormData instance
      try {
         const response = await fetch("/qoutation", {
            method: "POST",
            body: formData,
         });
         console.log(await response.json());
      } catch (e) {
         console.error(e);
      }
   }

</script>