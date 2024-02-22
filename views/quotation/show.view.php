
<?php

use Core\QuotationStatus;
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
               <a href="/quotations" title="Export" class="cursor-pointer bg-transparent hover:bg-gray-500 text-gray-700 font-semibold text-sm hover:text-white py-1.5 px-2 border border-gray-500 hover:border-transparent rounded">Go back</a>
            </div>
            <?php require base_path('views/partials/alerts.php') ?>
            <?php require base_path('views/partials/banner.php') ?>
            <div class="bg-white rounded shadow-lg p-4 px-2 md:p-8 mb-6">
               <div class="mx-auto p-6 bg-white rounded shadow-sm my-6" id="invoice">

               <div class="grid grid-cols-2 items-center mb-8">
                  <div>
                     <!--  Company logo  -->
                     <img src="../images/logo.png" alt="company-logo" height="150" width="250">
                  </div>
                  <div class="text-right">
                     <h1 class="font-bold text-gray-900 sm:text-4xl text-xl">Quotation</h1>
                     <h1 class="font-semibold text-gray-900 sm:text-xl text-xs">
                        <?= $quotation['control_no'] ?>
                     </h1>
                  </div>
               </div>

               <div class="flex justify-between gap-4 mt-2 sm:text-base text-xs">
                  <div class="">
                     <p class="font-bold text-gray-800">
                        Quotation for :
                     </p>
                     <p class="text-gray-500 max-w-52">
                        <?= $quotation['customer_name'] ?>
                        <br />
                        <?= $quotation['customer_address_line_1'] ?>
                        <?= $quotation['customer_address_line_2'] ?>
                     </p>
                     <p class="text-gray-500 max-w-52">
                        <?= $quotation['customer_city'] ?>
                        <?= $quotation['customer_province'] ?>
                     </p>
                  </div>

                  <div class="text-right">
                     <p class="">
                        Quote created by:
                        <span class="text-gray-500">
                           <?= $quotation['created_by'] ?>
                        </span>
                     </p>
                     <!-- <p>
                        <?= $quotation['created_by'] ?>
                     </p> -->
                     <p class="text-gray-500 text-sm">
                        <?= $quotation['sales_email'] ?>
                     </p>
                     <p class="text-gray-500 text-sm mt-1">
                        <?= $quotation['sales_phone'] ?>
                     </p>
                  </div>
               </div>

               <div class="flex justify-between gap-4 mt-2 sm:text-base text-xs">
                  <div class="">
                     <p class="font-bold text-gray-800">
                        <?= $quotation['customer_contact_person'] ?>
                     </p>
                     <p class="text-gray-500">
                        <?= $quotation['customer_position'] ?>
                     </p>
                     <p class="text-gray-500">
                        <?= $quotation['customer_email'] ?>
                     </p>
                  </div>
                  <div class="text-right">
                     <p>
                        Qoute created: 
                        <span class="text-gray-500">
                           <?= date('m-d-Y',strtotime($quotation['created_at'])) ?>
                        </span>
                        <!-- <br />
                        Qoute approved:
                        <span class="text-gray-500">
                           <?= date('m-d-Y',strtotime($quotation['updated_at'])) ?? date('m-d-Y') ?>
                        </span> -->
                        <br />
                        Qoute expires:
                        <span class="text-gray-500">
                           <?= date('m-d-Y',strtotime($quotation['expired_at'])) ?? date('m-d-Y') ?>
                        </span>
                     </p>
                  </div>
               </div>

               <div class="mx-auto mt-8">
                  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                     Products
                  </h2>
               </div>

                  <!-- Invoice Items -->
                  <div class="-mx-4 mt-8 flow-root sm:mx-0 overflow-x-auto">
                     <table class="min-w-full">
                        <thead class="border-b border-gray-300 text-gray-900">
                           <tr>
                              <th scope="col" class="w-1/3 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Items</th>
                              <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Quantity</th>
                              <!-- <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Code</th> -->
                              <!-- <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Stock available</th> -->
                              <!-- <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Comparative price</th> -->
                              <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Catalog price</th>
                              <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Discount</th>
                              <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Proposed price</th>
                              <?php if($quotation['status'] == QuotationStatus::DISAPPROVED && (int)$_SESSION['user']['role_id'] == Role::SALES): ?>
                              <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Recommended price</th>
                              <?php endif; ?>
                              <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Discount (%)</th>
                              <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">Discounted Total</th>
                              <?php if($quotation['status'] == QuotationStatus::PENDING && (int)$_SESSION['user']['role_id'] == Role::SALES_MANAGER): ?>
                              <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900"></th>
                              <?php endif; ?>
                              <!-- <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">Deal equivalent</th> -->
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
                                 <td class="py-5 pl-4 pr-3 text-sm sm:pl-0">
                                    <div class="font-medium truncate text-gray-900"><?= $product['description'] ?></div>
                                    <div class="mt-1 text-gray-500"><?= $product['code'] ?></div>
                                    <?php if($product['comment']): ?>
                                       <div class="mt-1 text-gray-500">( <?= $product['comment'] ?> )</div>
                                    <?php endif; ?>
                                 </td>
                                 <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['quantity'] ?></td>
                                 <!-- <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['code'] ?></td> -->
                                 <!-- <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['stock'] ?></td> -->
                                 <!-- <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['comparative_price'] ?></td> -->
                                 <td class="px-3 py-5 text-center text-sm text-gray-500"><?= number_format($product['catalog_price'], 2) ?></td>
                                 <td class="px-3 py-5 text-center text-sm text-gray-500"><?= number_format($product['catalog_price'] / 100 * $product['proposed_price_discount'], 2) ?></td>
                                 <td class="px-3 py-5 text-center text-sm text-<?= $product['approved_price'] > 0 ? 'red' : 'gray' ?>-500"><?= number_format($product['proposed_price'], 2) ?></td>
                                 <?php if($quotation['status'] == QuotationStatus::DISAPPROVED && (int)$_SESSION['user']['role_id'] == Role::SALES): ?>
                                 <td class="px-3 py-5 text-center text-sm text-green-500"><?= number_format($product['approved_price'], 2) ?></td>
                                 <?php endif; ?>
                                 <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['proposed_price_discount'] ?>%</td>
                                 <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0"><?= number_format($product['total'], 2) ?></td>
                                 <?php if($quotation['status'] == QuotationStatus::PENDING && (int)$_SESSION['user']['role_id'] == Role::SALES_MANAGER): ?>
                                 <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500">
                                    <button type="button" onclick="toggleApprovedPricesModal(<?= $product['id'] ?>, <?= $product['proposed_price'] ?>, <?= $product['proposed_price_discount'] ?>, <?= $product['total'] ?>, <?= $product['catalog_price'] ?>, <?= $product['quantity'] ?>)" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Change price</button>
                                 </td>
                                 <?php endif; ?>
                                 <!-- <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0"><?= $product['deal_equivalent'] ?></td> -->
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                           <!-- <tr>
                           <th scope="row" colspan="8" class="hidden pl-4 pr-3 pt-6 text-right text-sm font-normal text-gray-500 sm:table-cell sm:pl-0">Subtotal</th>
                           <th scope="row" class="pl-6 pr-3 pt-6 text-left text-sm font-normal text-gray-500 sm:hidden">Subtotal</th>
                           <td class="pl-3 pr-6 pt-6 text-center text-sm text-gray-500 sm:pr-0">$10,500.00</td>
                           </tr>
                           <tr>
                           <th scope="row" colspan="8" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-normal text-gray-500 sm:table-cell sm:pl-0">Tax</th>
                           <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-normal text-gray-500 sm:hidden">Tax</th>
                           <td class="pl-3 pr-6 pt-4 text-center text-sm text-gray-500 sm:pr-0">$1,050.00</td>
                           </tr>
                           <tr>
                           <th scope="row" colspan="8" class="hidden pl-4 pr-3 pt-4 text-right text-sm font-normal text-gray-500 sm:table-cell sm:pl-0">Discount</th>
                           <th scope="row" class="pl-6 pr-3 pt-4 text-left text-sm font-normal text-gray-500 sm:hidden">Discount</th>
                           <td class="pl-3 pr-6 pt-4 text-center text-sm text-gray-500 sm:pr-0">- 10%</td>
                           </tr> -->
                           <tr>
                           <th scope="row" colspan="<?=$quotation['status'] == QuotationStatus::DISAPPROVED && (int)$_SESSION['user']['role_id'] == Role::SALES ? '7' : '6' ?>" class="pl-4 pr-6 sm:pr-<?=$quotation['status'] == QuotationStatus::PENDING && (int)$_SESSION['user']['role_id'] == Role::SALES_MANAGER ? '14' : '16' ?> pt-4 text-right text-sm font-semibold text-gray-900">Total</th>
                           <!-- <th scope="row" class="pl-4 pr-3 pt-4 text-left text-sm font-semibold text-gray-900 sm:hidden">Total</th> -->
                           <td class="pl-3 pr-4 pt-4 text-right text-sm font-semibold text-gray-900 sm:pr-0"><?= number_format($grand_total, 2) ?></td>
                           </tr>
                        </tfoot>
                     </table>
                  </div>

                  <!--  Footer  -->
                  <!-- <div class="border-t-2 pt-4 text-xs text-gray-500 text-center mt-16">
                  Please pay the invoice before the due date. You can pay the invoice by logging in to your account from our client portal.
                  </div> -->


                  <div class="my-8">
                     <div class="my-4">
                        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                           Terms
                        </h2>
                        <p class="text-gray-500">
                           <?= $quotation['terms'] ?>
                        </p>
                     </div>
                     <div class="my-4">
                        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                           Validity
                        </h2>
                        <p class="text-gray-500">
                           <?= $quotation['validity'] ?>
                        </p>
                     </div>
                     <div class="my-4">
                        <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                           Delivery
                        </h2>
                        <p class="text-gray-500">
                           <?= $quotation['delivery'] ?>
                        </p>
                     </div>
                     <div class="my-4">
                        <h2 class="mb-2 font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                           Questions? Contact me
                        </h2>
                        <p class="">
                           <?= $quotation['created_by'] ?>
                        </p>
                        <p class="text-gray-500 text-sm">
                           <?= $quotation['sales_email'] ?>
                        </p>
                        <p class="text-gray-500 text-sm mt-1">
                           <?= $quotation['sales_phone'] ?>
                        </p>
                     </div>
                     <div class="my-4">
                        <h2 class="mb-2 font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                           Attachments
                        </h2>
                        <div class="flex flex-col">
                           <?php foreach($attachments as $attachment) : ?>
                              <a class="text-blue-500 hover:underline" href="../images/quotation/<?= $attachment['name'] ?>" target="_blank"><?= $attachment['name'] ?></a>
                           <?php endforeach; ?>
                        </div>
                     </div>
                  </div>

                  <?php if($quotation['status'] == QuotationStatus::PENDING && (int)$_SESSION['user']['role_id'] == Role::SALES_MANAGER) : ?>
                     <div id="remarksField" class="col-span-6 md:col-span-6">
                        <label for="remarks">Comments</label>
                        <textarea name="remarks" id="remarks" class="h-20 border mt-1 rounded p-2 w-full bg-transparent <?= isset($errors['remarks']) ? 'border-red-500' : '' ?>" name="" id="" cols="30" rows="10"></textarea>
                        <?php if(isset($errors['remarks'])): ?>
                           <span class="text-red-500 text-xs"><?= $errors['remarks'] ?></span>
                        <?php endif; ?>
                     </div>
                     <div class="actionBtnDiv flex justify-end gap-2 mt-4">
                        <button id="approveButton" type="button" title="Approve" onclick="toggleModal('quotationModal', 'Approve')" class="actionBtn bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm">Approve</button>
                        <button type="button" title="Disapprove" onclick="toggleModal('quotationModal', 'Disapprove')" class="actionBtn bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded text-sm">Disapprove</button>
                        <!-- <button title="Create" href="/quotation/create" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-add-line"></i></button> -->
                     </div>
                  <?php endif; ?>
                  <?php if(($quotation['status'] == QuotationStatus::PENDING || $quotation['status'] == QuotationStatus::DISAPPROVED) && (int)$_SESSION['user']['role_id'] == Role::SALES) : ?>
                  <div class="flex justify-end gap-2 mt-4">
                     <a href="/quotation/edit?id=<?= $quotation['id'] ?>" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm">Modify</a>
                     <!-- <button title="Create" href="/quotation/create" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-add-line"></i></button> -->
                  </div>
                  <?php endif; ?>

                  </div>
               </div>
         </main>

         
         <div id="quotationModal" class="hidden relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
                                       <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title"><span class="modalText"></span> Quotation</h3>
                                       <div class="mt-2">
                                          <p class="text-sm text-gray-500">Are you sure you want to <span class="modalText"></span> this quotation? This action cannot be undone.</p>
                                       </div>
                                 </div>
                              </div>
                           </div>
                           <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                              <button id="actionBtn" onclick="updateQuotation(<?= $_GET['id'] ?>)" type="button" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto"><span class="modalText"></span></button>
                              <button type="button" onclick="toggleModal('quotationModal')" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Cancel</button>
                           </div>
                     </div>
                  </div>
               </div>
         </div>

         <div id="approvedPricesModal" class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
               <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

               <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                  <div class="flex min-h-full items-center justify-center p-4 text-center sm:items-center sm:p-0">
                     <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8">
                     <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                        <form id="ApprovedPricesForm">
                           <div class="lg:col-span-2">
                              <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                                 Change Price
                              </h3>
                              <div class="grid gap-4 gap-y-2 text-sm grid-cols-6 md:grid-cols-6">
                                 <div class="col-span-6 md:col-span-6">
                                    <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                                       From
                                    </h3>
                                 </div>
                                 <div class="col-span-6 md:col-span-2">
                                    <label for="proposed_price">Proposed price / deal</label>
                                    <input type="number" id="proposed_price" class="cursor-not-allowed h-10 border mt-1 rounded px-2 w-full bg-gray-50" disabled/>
                                    <input type="hidden" name="id" id="id" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50"/>
                                    <input type="hidden" id="catalog_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50"/>
                                    <input type="hidden" id="quantity" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50"/>
                                 </div>
                                 <div class="col-span-6 md:col-span-2">
                                    <label for="proposed_price_discount">Proposed price / deal (Discount in %)</label>
                                    <input type="number" id="proposed_price_discount" class="cursor-not-allowed h-10 border mt-1 rounded px-2 w-full bg-gray-50" disabled/>
                                 </div>

                                 <div class="col-span-6 md:col-span-2">
                                    <label for="proposed_price_total">Total</label>
                                    <input type="number" id="proposed_price_total" class="cursor-not-allowed h-10 border mt-1 rounded px-2 w-full bg-gray-50" disabled/>
                                 </div>

                                 <div class="col-span-6 md:col-span-6">
                                    <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mt-4">
                                       To
                                    </h3>
                                 </div>

                                 <div class="col-span-6 md:col-span-2">
                                    <label for="approved_price">Proposed price / deal</label>
                                    <input type="number" step="0.01" name="approved_price" id="approved_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50"/>
                                 </div>
                                 <div class="col-span-6 md:col-span-2">
                                    <label for="approved_price_discount">Proposed price / deal (Discount in %)</label>
                                    <input type="number" step="0.01" id="approved_price_discount" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50"/>
                                 </div>
                                 <div class="col-span-6 md:col-span-2">
                                    <label for="approved_price_total">Total</label>
                                    <input type="number" id="approved_price_total" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50"/>
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
<!-- Footer -->
<?php require base_path('views/partials/footer.php') ?>

<script>
   // const updateQuotation = (id) => {
   //    console.log(id)
   // }
   let approvedPrices = []

   const toggleApprovedPricesModal = (id, proposed_price, proposed_price_discount, total, catalog_price, quantity) => {
      document.getElementById('id').value = id
      document.getElementById('catalog_price').value = catalog_price
      document.getElementById('quantity').value = quantity
      document.getElementById('proposed_price').value = proposed_price
      document.getElementById('proposed_price_discount').value = proposed_price_discount
      document.getElementById('proposed_price_total').value = total
      const modal = document.getElementById('approvedPricesModal')
      modal.classList.remove('hidden')
   }

   const closeModal = () => {
      resetForm()
      const modal = document.getElementById('approvedPricesModal')
      modal.classList.add('hidden')
   }

   const approvedPricesForm = document.getElementById('ApprovedPricesForm')

   const resetForm = () => {
      document.getElementById('id').value = ''
      approvedPricesForm.reset();
   }

   document.getElementById('approved_price').addEventListener('input', (e) => {
      computeProposedPriceDiscount()
      computeTotal()
   })
   document.getElementById('approved_price_discount').addEventListener('input', (e) => {
      computeProposedPrice()
      computeTotal()
   })


   approvedPricesForm.addEventListener('submit', (e) => {
      
      e.preventDefault()
      const formData = new FormData(approvedPricesForm);
      // Display the key/value pairs
      // for (const pair of formData.entries()) {
      // console.log(pair[0], pair[1]);
      // }
      const price = Object.fromEntries(formData);
      // console.log(prices)

      // Find the index of the object with id: 2
      let indexToUpdate = approvedPrices.findIndex(item => item.id == price.id);

      // Use spread operator for updating or inserting the object
      approvedPrices = indexToUpdate !== -1
         ? approvedPrices.map(item => (item.id == price.id ? { ...item, ...price } : item))
         : [...approvedPrices, price];
      // approvedPrices.push(price)
      console.log(approvedPrices)
      closeModal()
      document.getElementById('approveButton').classList.add('hidden')
   })

   const computeProposedPriceDiscount = () => {
      const catalog_price = document.getElementById('catalog_price').value
      // console.log(catalog_price)
      if(catalog_price){
         const approved_price_discount = (catalog_price - document.getElementById('approved_price').value) / catalog_price * 100
         document.getElementById('approved_price_discount').value = approved_price_discount
      }
   }

   const computeProposedPrice = () => {
      const catalog_price = document.getElementById('catalog_price').value
      // console.log(catalog_price)
      if(catalog_price){
         const approved_price = catalog_price - (catalog_price * document.getElementById('approved_price_discount').value / 100)
         document.getElementById('approved_price').value = approved_price
      }
      // console.log(document.getElementById('proposed_price_discount').value)
   }

   const computeTotal = () => {
      const product_qty = document.getElementById('quantity').value
      const approved_price = document.getElementById('approved_price').value
      document.getElementById('approved_price_total').value =  approved_price * product_qty
   }


   async function updateQuotation(id) {
      const successPanel = document.querySelector('.success-panel')
      const errorPanel = document.querySelector('.error-panel')
      const successMessage = document.querySelector('.successMessage')
      const errorMessage = document.querySelector('.errorMessage')
      const mode = document.querySelector('.modalText').innerHTML
      const remarks = document.getElementById('remarks').value
      const formData = new FormData()
      const actionBtn = document.getElementById('actionBtn')
      
      actionBtn.innerText = 'Loading...'
      actionBtn.className = 'actionBtn bg-gray-300 px-4 py-2 rounded-md cursor-not-allowed opacity-50'
      // actionButtons.forEach(button => {
      //    button.className = 'actionBtn w-32 bg-gray-300 px-4 py-2 rounded-md cursor-not-allowed opacity-50'
      // })

      formData.append("id", id)
      formData.append("mode", mode)
      formData.append("remarks", remarks)
      if(mode == 'Disapprove') {
         formData.append("approvedPrices", JSON.stringify(approvedPrices))
      }
      try {
         const response = await fetch("/quotation/change-status", {
            method: "POST",
            body: formData
         });
         const data = await response.json()
         if (data.success) {
            successPanel.classList.remove('hidden')
            successMessage.innerText = data.message
            document.getElementById('app').scrollIntoView({ behavior: 'smooth', block: 'start' });
            toggleModal('quotationModal')
            document.querySelector('.actionBtnDiv').classList.add('hidden')
         } else {
            errorPanel.classList.remove('hidden')
            errorMessage.innerText = data.message
            document.getElementById('app').scrollIntoView({ behavior: 'smooth', block: 'start' });
            toggleModal('quotationModal')
         }
         // console.log(data.success);
      } catch (e) {
         console.error(e);
      }
   }
</script>