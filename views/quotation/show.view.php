
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

               <div class="grid grid-cols-2 items-center mb-4">
                  <div>
                     <!--  Company logo  -->
                     <img class="w-80" src="../images/logo.png" alt="company-logo">
                     <img class="hidden" src="../images/pmc-logo.png" alt="company-logo" height="150" width="250">
                  </div>
                  <div class="place-self-end grid grid-cols-2 max-w-28 items-center justify-items-end gap-2">
                     <img class="max-w-12" src="../images/1.jpg" alt="">
                     <img class="max-w-12" src="../images/2.jpg" alt="">
                     <div class="col-span-2 justify-self-end text-[6px] font-semibold">
                        <p>
                           The first ISO 9001:2015 certified <br>
                           Healthcare Products Distribution Company <br>
                           in the Philippines
                        </p>
                     </div>
                  </div>
               </div>
               <div class="grid grid-cols-2 mb-4">
                  <div class="col-span-2 text-right">
                     <h1 class="font-bold text-gray-900 sm:text-4xl text-xl">Quotation</h1>
                     <h1 class="font-bold text-gray-900 sm:text-[1.2rem] text-[1rem]">
                        <?= $quotation['control_no'] ?>
                     </h1>
                  </div>
                  <div>
                     <p class="font-bold text-gray-800 sm:text-[1.2rem] text-[1rem]">
                        Quotation for :
                     </p>
                     <p class="text-gray-500 max-w-52 sm:text-[1rem] text-[.7rem]">
                        <?= $quotation['customer_name'] ?>
                        <br />
                        <?= $quotation['customer_address_line_1'] ?>
                        <?= $quotation['customer_address_line_2'] ?>
                        <!-- <br />
                        <?= $quotation['tel_no'] ?> -->
                     </p>
                     <p class="text-gray-500 max-w-52 sm:text-[1rem] text-[.7rem]">
                        <?= $quotation['customer_city'] ?>
                        <?= $quotation['customer_province'] ?>
                     </p>
                     <div class="mt-2">
                        <p class="font-semibold text-gray-800 sm:text-[1.2rem] text-[1rem]">
                           <?= $quotation['customer_contact_person'] ?>
                        </p>
                        <p class="text-gray-500 sm:text-[1rem] text-[.7rem]">
                           <?= $quotation['customer_position'] ?>
                        </p>
                        <p class="text-gray-500 sm:text-[1rem] text-[.7rem]">
                           <?= $quotation['customer_email'] ?>
                        </p>
                     </div>
                  </div>

                  <div class="text-right">
                     <div>
                        <p class="">
                           <span class="font-bold sm:text-[1.2rem] text-[1rem]">Quote created by:</span>
                           <br>
                           <span class="text-gray-500 sm:text-[1rem] text-[.7rem]">
                              <?= $quotation['created_by'] ?>
                           </span>
                        </p>
                        <!-- <p>
                           <?= $quotation['created_by'] ?>
                        </p> -->
                        <p class="text-gray-500 text-sm sm:text-[1rem] text-[.7rem]">
                           <?= $quotation['sales_email'] ?>
                        </p>
                        <p class="text-gray-500 text-sm mt-1 sm:text-[1rem] text-[.7rem]">
                           <?= $quotation['sales_phone'] ?>
                        </p>
                     </div>
                     <div class="text-right mt-2">
                        <p>
                           <span class="font-bold sm:text-[1.2rem] text-[1rem]">On: </span>
                           <span class="text-gray-500 sm:text-[1rem] text-[.7rem]">
                              <?= $quotation['updated_at'] != NULL ? date('m-d-Y',strtotime($quotation['updated_at'])) : date('m-d-Y') ?>
                           </span>
                           <!-- <br />
                           Qoute approved:
                           <span class="text-gray-500">
                              <?= date('m-d-Y',strtotime($quotation['updated_at'])) ?? date('m-d-Y') ?>
                           </span> -->
                           <br />
                           <span class="font-bold sm:text-[1.2rem] text-[1rem]">Expires:</span>
                           <span class="text-gray-500 sm:text-[1rem] text-[.7rem]">
                              <?= date('m-d-Y',strtotime($quotation['expired_at'])) ?? date('m-d-Y') ?>
                           </span>
                        </p>
                     </div>
                  </div>
               </div>
               
               <?php if($comments): ?>
                  <div class="mx-auto mt-4 sm:text-base text-xs text-blue-800">
                     <!-- <h2 class="mb-2 font-semibold text-xl leading-tight">
                        Comments
                     </h2> -->
                     <div class="border border-blue-400 px-4 py-3 rounded">
                        <?php foreach($comments as $comment): ?>
                           <div class="mb-2">
                              <h4 class="font-semibold">
                                 <?= $comment['comment_heading'] ?>
                                 <span class="text-green-500"><?= $comment['comment_by'] == $_SESSION['user']['id'] ? '(Me)' : '' ?></span>
                              </h4>
                              <p><?= $comment['comments'] ?></p>
                           </div>
                        <?php endforeach; ?>
                     </div>
                  </div>
               <?php endif; ?>

               <div class="mx-auto mt-4">
                  <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                     Products
                  </h2>
               </div>

                  <!-- Invoice Items -->
                  <div class="-mx-4 mt-4 flow-root sm:mx-0 overflow-x-auto">
                     <table class="min-w-full">
                        <thead class="border-b border-gray-300 text-gray-900">
                           <tr>
                              <th scope="col" class="w-1/3 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Items</th>
                              <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Quantity</th>
                              <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">UOM</th>
                              <!-- <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Code</th> -->
                              <!-- <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Stock available</th> -->
                              <!-- <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Comparative price</th> -->
                              <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Catalog price</th>
                              <!-- <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">W/O SCD price</th> -->
                              <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Quote price</th>
                              <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Discount (%)</th>
                              <!-- <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Discount (%)</th> -->
                              <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">Total</th>
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
                                 <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['uom'] ?></td>
                                 <?php
                                    $discountPercentage = number_format(100 - ($product['proposed_price'] / $product['catalog_price'] * 100), 2);
                                    $cat_price = $product['catalog_price'];
                                    $discount = $product['catalog_price'] - $product['proposed_price'];
                                    if($discountPercentage < 20) {
                                       $cat_price = $discountPercentage < 20 ? $product['wo_scd_price'] : $product['catalog_price'];
                                       $discount = $product['wo_scd_price'] - $product['proposed_price'];
                                       $discountPercentage = number_format(100 - ($product['proposed_price'] / $product['wo_scd_price'] * 100), 2);
                                    }
                                 ?>
                                 <td class="px-3 py-5 text-center text-sm text-gray-500">₱<?= $cat_price ? number_format($cat_price, 2) : '' ?></td>
                                 <!-- <td class="px-3 py-5 text-center text-sm text-gray-500">₱<?= number_format($product['wo_scd_price'], 2) ?></td> -->
                                 <td class="px-3 py-5 text-center text-sm text-<?= $product['approved_price'] > 0 ? 'red' : 'gray' ?>-500">₱<?= number_format($product['proposed_price'], 2) ?></td>
                                 <td class="px-3 py-5 text-center text-sm text-gray-500">
                                    ₱<?= number_format($discount, 2) ?>
                                    ( <?= is_numeric($discountPercentage) ? $discountPercentage . '%' : '' ?> )
                                 </td>
                                 <!-- <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['proposed_price_discount'] ?>%</td> -->
                                 <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0">₱<?= number_format($product['total'], 2) ?></td>
                                 <!-- <?php if($quotation['status'] == QuotationStatus::PENDING && (int)$_SESSION['user']['role_id'] == Role::SALES_MANAGER): ?>
                                 <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500">
                                    <button type="button" onclick="toggleApprovedPricesModal(<?= $product['id'] ?>, <?= $product['proposed_price'] ?>, <?= $product['proposed_price_discount'] ?>, <?= $product['total'] ?>, <?= $product['catalog_price'] ?>, <?= $product['quantity'] ?>)" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">Change price</button>
                                 </td>
                                 <?php endif; ?> -->
                                 <!-- <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0"><?= $product['deal_equivalent'] ?></td> -->
                              </tr>
                           <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                           <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <th scope="row" class="pt-4 text-sm font-semibold text-gray-900">Total</th>
                              <td class="pt-4 text-right text-sm font-semibold text-gray-900 pr-4 sm:pr-0">₱<?= number_format($grand_total, 2) ?></td>
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
                        <h2 class="mb-2 font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                           Terms & Conditions: 
                        </h2>
                        <p class="text-gray-500 text-sm">
                           
                           <?= $quotation['vat'] ?><br>
                           We reserve the right to modify the quotation if apparent errors were made in the process. <br>
                           Prices are subject to change without prior notice, even prior to the expiry indicated above. <br>
                           Prices are NET of all discounts including Senior Citizen Discount (SCD) / Persons with Disability (PWD), etc. <br>
                           No approved, signed Purchase Order received, no processing or delivery will be made. <br>
                           Items are subject to availability at the time of receipt of Purchase Order. <br>
                           We reserve the right not to accept or process orders below P5,000.00.
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
                           Or contact the company directly
                        </h2>
                        <p class="">
                           <?= $company['name'] ?>
                        </p>
                        <p class="text-gray-500 text-sm max-w-64">
                           <?= $company['address_line_1'] ?>
                           <?= $company['address_line_2'] ?>
                           </br>
                           <?= $company['city'] ?>
                           <?= $company['province'] ?>
                        </p>
                        <p class="text-gray-500 text-sm">
                           <?= $company['email'] ?>
                        </p>
                        <p class="text-gray-500 text-sm mt-1">
                           <?= $company['tel_no'] ?>
                        </p>
                        <p class="text-gray-500 text-sm mt-1">
                           <?= $company['mobile_no'] ?>
                        </p>
                     </div>
                     <?php if($attachments): ?>
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
                     <?php endif; ?>
                  </div>

                  <?php if(($quotation['status'] == QuotationStatus::PENDING || $quotation['status'] == QuotationStatus::INITIAL_APPROVED) && (int)$_SESSION['user']['role_id'] != Role::SALES) : ?>
                     <div id="remarksField" class="col-span-6 md:col-span-6">
                        <label for="remarks">Comments</label>
                        <input type="hidden" id="current_status" value="<?= $quotation['status_name'] ?>">
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
                                    <label for="proposed_price">Quoted price / deal</label>
                                    <input type="number" id="proposed_price" class="cursor-not-allowed h-10 border mt-1 rounded px-2 w-full bg-gray-50" disabled/>
                                    <input type="hidden" name="id" id="id" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50"/>
                                    <input type="hidden" id="catalog_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50"/>
                                    <input type="hidden" id="quantity" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50"/>
                                 </div>
                                 <div class="col-span-6 md:col-span-2">
                                    <label for="proposed_price_discount">Quoted price / deal (Discount in %)</label>
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
                                    <label for="approved_price">Quoted price / deal</label>
                                    <input type="number" step="0.01" name="approved_price" id="approved_price" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50"/>
                                 </div>
                                 <div class="col-span-6 md:col-span-2">
                                    <label for="approved_price_discount">Quoted price / deal (Discount in %)</label>
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
      const current_status = document.getElementById('current_status').value
      const formData = new FormData()
      const actionBtn = document.getElementById('actionBtn')
      
      // actionButtons.forEach(button => {
      //    button.className = 'actionBtn w-32 bg-gray-300 px-4 py-2 rounded-md cursor-not-allowed opacity-50'
      // })

      formData.append("id", id)
      formData.append("mode", mode)
      formData.append("remarks", remarks)
      formData.append("current_status", current_status)
      if(mode == 'Disapprove' && remarks === '') {
         // formData.append("approvedPrices", JSON.stringify(approvedPrices))
         errorPanel.classList.remove('hidden')
         errorMessage.innerText = "Comments is required for disapproval"
         document.getElementById('app').scrollIntoView({ behavior: 'smooth', block: 'start' });
         toggleModal('quotationModal')
         return
      }
      
      actionBtn.innerText = 'Loading...'
      actionBtn.className = 'actionBtn bg-gray-300 px-4 py-2 rounded-md cursor-not-allowed opacity-50'
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