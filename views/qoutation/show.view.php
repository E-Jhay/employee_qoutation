
<?php

use Core\QoutationStatus;
use Core\Role;

 require base_path('views/partials/head.php') ?>
      <!-- Navbar -->
   <?php require base_path('views/partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require base_path('views/partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-4 lg:px-8">
            <div class="flex justify-start gap-2">
               <a href="/qoutations" title="Export" class="cursor-pointer bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-sm hover:text-white py-1.5 px-2 border border-gray-500 hover:border-transparent rounded">Go back</a>
            </div>
            <?php require base_path('views/partials/alerts.php') ?>
            <?php require base_path('views/partials/banner.php') ?>
            <div class="bg-white rounded shadow-lg p-4 px-2 md:p-8 mb-6">
               <div class="mx-auto p-6 bg-white rounded shadow-sm my-6" id="invoice">

                  <div class="grid grid-cols-2 items-center">
                     <div>
                        <!--  Company logo  -->
                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Tailwind_CSS_Logo.svg" alt="company-logo" height="100" width="100">
                     </div>

                     <div class="text-right">
                        <p>
                           <?= $qoutation['created_by'] ?>
                        </p>
                        <p class="text-gray-500 text-sm">
                           <?= $qoutation['sales_email'] ?>
                        </p>
                        <p class="text-gray-500 text-sm mt-1">
                           <?= $qoutation['sales_phone'] ?>
                        </p>
                        <!-- <p class="text-gray-500 text-sm mt-1">
                           VAT: 8657671212
                        </p> -->
                     </div>
                  </div>

                  <!-- Client info -->
                  <div class="grid grid-cols-2 items-center mt-8">
                     <div>
                        <p class="font-bold text-gray-800">
                           Bill to :
                        </p>
                        <p class="text-gray-500">
                           <?= $qoutation['customer_name'] ?>
                           <br />
                           <?= $qoutation['customer_address'] ?>
                        </p>
                        <p class="text-gray-500">
                           <?= $qoutation['customer_position'] ?>
                        </p>
                        <p class="text-gray-500">
                           <?= $qoutation['customer_email'] ?>
                        </p>
                     </div>

                     <div class="text-right">
                        <p class="">
                           Control number:
                           <span class="text-gray-500">
                              <?= $qoutation['control_no'] ?>
                           </span>
                        </p>
                        <p>
                           Qoute created: 
                           <span class="text-gray-500">
                              <?= $qoutation['created_at'] ?>
                           </span>
                           <br />
                           Qoute expires:
                           <span class="text-gray-500">
                              <?= $qoutation['expired_at'] ?? date('Y-m-d') ?>
                           </span>
                        </p>
                     </div>
                  </div>

                  <!-- Invoice Items -->
                  <div class="-mx-4 mt-8 flow-root sm:mx-0  overflow-x-auto">
                     <table class="min-w-full">
                        <colgroup>
                           <col class="w-full sm:w-1/5">
                           <col class="sm:w-1/12">
                           <col class="sm:w-1/12">
                           <col class="sm:w-1/12">
                           <col class="sm:w-1/12">
                           <col class="sm:w-1/12">
                           <col class="sm:w-1/12">
                           <col class="sm:w-1/12">
                           <col class="sm:w-1/12">
                           <col class="sm:w-1/12">
                           <col class="sm:w-1/12">
                           <col class="sm:w-1/12">
                        </colgroup>
                        <thead class="border-b border-gray-300 text-gray-900">
                           <tr>
                              <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Items</th>
                              <th scope="col" class="hidden px-3 py-3.5 text-center text-sm font-semibold text-gray-900 sm:table-cell">Quantity</th>
                              <th scope="col" class="hidden px-3 py-3.5 text-center text-sm font-semibold text-gray-900 sm:table-cell">Unit</th>
                              <th scope="col" class="hidden px-3 py-3.5 text-center text-sm font-semibold text-gray-900 sm:table-cell">Price</th>
                              <th scope="col" class="hidden px-3 py-3.5 text-center text-sm font-semibold text-gray-900 sm:table-cell">Stock available</th>
                              <th scope="col" class="hidden px-3 py-3.5 text-center text-sm font-semibold text-gray-900 sm:table-cell">Comparative price</th>
                              <th scope="col" class="hidden px-3 py-3.5 text-center text-sm font-semibold text-gray-900 sm:table-cell">Catalog price</th>
                              <th scope="col" class="hidden px-3 py-3.5 text-center text-sm font-semibold text-gray-900 sm:table-cell">Proposed price</th>
                              <th scope="col" class="hidden px-3 py-3.5 text-center text-sm font-semibold text-gray-900 sm:table-cell">Approved price</th>
                              <th scope="col" class="hidden px-3 py-3.5 text-center text-sm font-semibold text-gray-900 sm:table-cell">Total</th>
                              <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">Deal equivalent</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if(count($products) <= 0): ?>
                              <tr class="border-b border-gray-200">
                                 <td colspan="11" class="hidden px-3 py-5 text-center text-sm text-gray-500 sm:table-cell">
                                    No products selected
                                 </td>
                              </tr>
                           <?php endif; ?>
                           <?php foreach($products as $product) : ?>
                              <tr class="border-b border-gray-200">
                                 <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
                                    <div class="font-medium text-gray-900"><?= $product['description'] ?></div>
                                    <div class="mt-1 truncate text-gray-500"><?= $product['code'] ?></div>
                                 </td>
                                 <td class="hidden px-3 py-5 text-center text-sm text-gray-500 sm:table-cell">500.0</td>
                                 <td class="hidden px-3 py-5 text-center text-sm text-gray-500 sm:table-cell">$100.00</td>
                                 <td class="hidden px-3 py-5 text-center text-sm text-gray-500 sm:table-cell">500.0</td>
                                 <td class="hidden px-3 py-5 text-center text-sm text-gray-500 sm:table-cell">$100.00</td>
                                 <td class="hidden px-3 py-5 text-center text-sm text-gray-500 sm:table-cell">$100.00</td>
                                 <td class="hidden px-3 py-5 text-center text-sm text-gray-500 sm:table-cell">$100.00</td>
                                 <td class="hidden px-3 py-5 text-center text-sm text-gray-500 sm:table-cell">$100.00</td>
                                 <td class="hidden px-3 py-5 text-center text-sm text-gray-500 sm:table-cell">$100.00</td>
                                 <td class="hidden px-3 py-5 text-center text-sm text-gray-500 sm:table-cell">$100.00</td>
                                 <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0">$5,000.00</td>
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                        <!-- <tfoot>
                           <tr>
                           <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-6 text-right text-sm font-normal text-gray-500 sm:table-cell sm:pl-0">Subtotal</th>
                           <th scope="row" class="pl-6 pr-3 pt-6 text-left text-sm font-normal text-gray-500 sm:hidden">Subtotal</th>
                           <td class="pl-3 pr-6 pt-6 text-right text-sm text-gray-500 sm:pr-0">$10,500.00</td>
                           </tr>
                           <tr>
                           <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-normal text-gray-500 sm:table-cell sm:pl-0">Tax</th>
                           <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-normal text-gray-500 sm:hidden">Tax</th>
                           <td class="pl-3 pr-6 pt-4 text-right text-sm text-gray-500 sm:pr-0">$1,050.00</td>
                           </tr>
                           <tr>
                           <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-normal text-gray-500 sm:table-cell sm:pl-0">Discount</th>
                           <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-normal text-gray-500 sm:hidden">Discount</th>
                           <td class="pl-3 pr-6 pt-4 text-right text-sm text-gray-500 sm:pr-0">- 10%</td>
                           </tr>
                           <tr>
                           <th scope="row" colspan="3" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-semibold text-gray-900 sm:table-cell sm:pl-0">Total</th>
                           <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-semibold text-gray-900 sm:hidden">Total</th>
                           <td class="pl-3 pr-4 pt-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">$11,550.00</td>
                           </tr>
                        </tfoot> -->
                     </table>
                  </div>

                  <!--  Footer  -->
                  <!-- <div class="border-t-2 pt-4 text-xs text-gray-500 text-center mt-16">
                  Please pay the invoice before the due date. You can pay the invoice by logging in to your account from our client portal.
                  </div> -->

                  <?php if($qoutation['status'] == QoutationStatus::PENDING && $_SESSION['user']['role_id'] == Role::SALES_MANAGER) : ?>
                  <div class="flex justify-end gap-2 mt-4">
                     <button type="button" title="Approve" onclick="toggleModal('qoutationModal', 'Approve')" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm">Approve</button>
                     <button type="button" title="Disapprove" onclick="toggleModal('qoutationModal', 'Disapprove')" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded text-sm">Disapprove</button>
                     <!-- <button title="Create" href="/qoutation/create" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-add-line"></i></button> -->
                  </div>
                  <?php endif; ?>
                  <?php if(($qoutation['status'] == QoutationStatus::PENDING || $qoutation['status'] == QoutationStatus::DISAPPROVED) && $_SESSION['user']['role_id'] == Role::SALES) : ?>
                  <div class="flex justify-end gap-2 mt-4">
                     <a href="/qoutation/edit?id=<?= $qoutation['id'] ?>" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm">Modify</a>
                     <!-- <button title="Create" href="/qoutation/create" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-add-line"></i></button> -->
                  </div>
                  <?php endif; ?>

                  </div>
               </div>
         </main>

         
         <div id="qoutationModal" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
               <!--
                  Background backdrop, show/hide based on modal state.

                  Entering: "ease-out duration-300"
                  From: "opacity-0"
                  To: "opacity-100"
                  Leaving: "ease-in duration-200"
                  From: "opacity-100"
                  To: "opacity-0"
               -->
               <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

               <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                  <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
                     <!--
                           Modal panel, show/hide based on modal state.

                           Entering: "ease-out duration-300"
                           From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                           To: "opacity-100 translate-y-0 sm:scale-100"
                           Leaving: "ease-in duration-200"
                           From: "opacity-100 translate-y-0 sm:scale-100"
                           To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                     -->
                     <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                           <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                              <div class="sm:flex sm:items-start">
                                 <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-amber-100 sm:mx-0 sm:h-10 sm:w-10">
                                       <svg class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                       </svg>
                                 </div>
                                 <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                       <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title"><span class="modalText"></span> Qoutation</h3>
                                       <div class="mt-2">
                                          <p class="text-sm text-gray-500">Are you sure you want to <span class="modalText"></span> this qoutation? This action cannot be undone.</p>
                                       </div>
                                 </div>
                              </div>
                           </div>
                           <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                              <button onclick="updateQoutation(<?= $_GET['id'] ?>)" type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto"><span class="modalText"></span></button>
                              <button type="button" onclick="toggleModal('qoutationModal')" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                           </div>
                     </div>
                  </div>
               </div>
         </div>
<!-- Footer -->
<?php require base_path('views/partials/footer.php') ?>

<script>
   // const updateQoutation = (id) => {
   //    console.log(id)
   // }

   async function updateQoutation(id) {
      const successPanel = document.querySelector('.success-panel')
      const errorPanel = document.querySelector('.error-panel')
      const successMessage = document.querySelector('.successMessage')
      const errorMessage = document.querySelector('.errorMessage')
      const mode = document.querySelector('.modalText').innerHTML
      const formData = new FormData()
      formData.append("id", id)
      formData.append("mode", mode)
      try {
         const response = await fetch("/qoutation/change-status", {
            method: "POST",
            body: formData
         });
         const data = await response.json()
         if (data.success) {
            successPanel.classList.remove('hidden')
            successMessage.innerText = data.message
            toggleModal('qoutationModal')
         } else {
            errorPanel.classList.remove('hidden')
            errorMessage.innerText = data.message
            toggleModal('qoutationModal')
         }
         // console.log(data.success);
      } catch (e) {
         console.error(e);
      }
   }
</script>