
<?php

use Core\QuotationStatus;
use Core\Role;

// require base_path('views/partials/head.php') 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMC - Quotation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../images/pmc-ico.png">
      <style>
         /* Styles for the watermark */
         @media print {
            body::after {
            -webkit-print-color-adjust: exact !important;   /* Chrome, Safari */
            color-adjust: exact !important;  
               content: "";
               /* transform: rotate(180deg); */
               position: fixed;
               top: 50%;
               left: 50%;
               width: 50%;
               height: 50%;
               transform: translate(-50%, -50%);
               /* transform: rotate(-40deg); */
               /* background-color: red; */
               
               background-image: url('../images/pmc-logo.png'); /* Replace 'watermark.png' with your watermark image */
               background-repeat: no-repeat; /* Repeat the watermark */
               background-size: contain; /* Size of the watermark */
               opacity: 0.1; /* Adjust the opacity as needed */
               z-index: -1; /* Place the watermark behind other content */
            }
            section {
               padding-block: 0 !important;
               padding-inline: 24px !important;
               /* background-color: blue; */
            }
            .top-space {
               height: 50px;
            }
            .space {
               height: 30px;
            }

         }
         @page {
            size:A4 portrait !important;
         }
      </style>
</head>
<body>
<section class="container mx-auto py-8 sm:px-24 px-4">
  <div class="w-full mb-8 overflow-hidden">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
         <tr>
            <th colspan="7">
               <div class="top-space">&nbsp;</div>
               <div id="header" class="grid grid-cols-2 items-center mb-4">
                     <div>
                        <!--  Company logo  -->
                        <img src="../images/logo.png" alt="company-logo" height="150" width="250">
                        <img class="hidden" src="../images/pmc-logo.png" alt="company-logo" height="150" width="250">
                     </div>
                     <div class="text-right">
                        <h1 class="font-bold text-gray-900 sm:text-4xl text-xl">Quotation</h1>
                        <h1 class="font-semibold text-gray-900 sm:text-xl text-xs">
                           <?= $quotation['control_no'] ?>
                        </h1>
                     </div>
                  </div>
            </th>
         </tr>
        </thead>
        <tbody class="">
         <tr>
            <td colspan="7">
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
                        <!-- <br />
                        <?= $quotation['tel_no'] ?> -->
                     </p>
                     <p class="text-gray-500 max-w-52">
                        <?= $quotation['customer_city'] ?>
                        <?= $quotation['customer_province'] ?>
                     </p>
                  </div>

                  <div class="text-right">
                     <p class="">
                        <span class="font-bold">Quote created by:</span>
                        <br>
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
                        <span class="font-bold">On: </span>
                        <span class="text-gray-500">
                           <?= date('m-d-Y',strtotime($quotation['created_at'])) ?>
                        </span>
                        <!-- <br />
                        Qoute approved:
                        <span class="text-gray-500">
                           <?= date('m-d-Y',strtotime($quotation['updated_at'])) ?? date('m-d-Y') ?>
                        </span> -->
                        <br />
                        <span class="font-bold">Expires:</span>
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
            </td>
         </tr>
         <tr class="-mx-4 sm:mx-0 border-b border-gray-700">
            <th scope="col" class="w-1/3 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Items</th>
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Quantity</th>
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">UOM</th>
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Catalog price</th>
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Quote Price</th>
            <!-- <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">SCD Price</th> -->
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Discount (%)</th>
            <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">Total</th>
            <!-- <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">Deal equivalent</th> -->
         </tr>
         <?php if(count($products) <= 0): ?>
            <tr class="border-b border-gray-200">
               <td colspan="7" class="hidden px-3 py-5 text-center text-sm text-gray-500 sm:table-cell">
                  No products selected
               </td>
            </tr>
         <?php endif; ?>
         <?php foreach($products as $product) : ?>
            <tr class="border-b border-gray-200 -mx-4 sm:mx-0">
               <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
                  <div class="font-medium truncate text-gray-900"><?= $product['description'] ?></div>
                  <div class="mt-1 truncate text-gray-500"><?= $product['code'] ?></div>
                  <?php if($product['comment']): ?>
                     <div class="mt-1 text-gray-500">( <?= $product['comment'] ?> )</div>
                  <?php endif; ?>
               </td>
               <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['quantity'] ?></td>
               <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['uom'] ?></td>
               <td class="px-3 py-5 text-center text-sm text-gray-500">₱<?= number_format($product['wo_scd_price'], 2) ?></td>
               <td class="px-3 py-5 text-center text-sm text-gray-500">₱<?= number_format($product['proposed_price'], 2) ?></td>
               <!-- <td class="px-3 py-5 text-center text-sm text-gray-500"><?= number_format($product['catalog_price'], 2) ?></td> -->
               <td class="px-3 py-5 text-center text-sm text-gray-500">
                  ₱<?= number_format($product['wo_scd_price'] - $product['proposed_price'], 2)?>
                  (<?= number_format(($product['wo_scd_price'] - $product['proposed_price']) / $product['wo_scd_price'] * 100 , 2) ?>%)
               </td>
               <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0">₱<?= number_format($product['total'], 2) ?></td>
               <!-- <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0"><?= $product['deal_equivalent'] ?></td> -->
            </tr>
         <?php endforeach; ?>
         <tr class="border-b border-gray-700">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <th scope="row" class="py-4 text-sm font-semibold text-gray-900">Total</th>
            <td class="py-4 text-right text-sm font-semibold text-gray-900 pr-4 sm:pr-0">₱<?= number_format($grand_total, 2) ?></td>
         </tr>
         <tr>
            <td colspan="7">
            <div class="my-8">
               <div class="my-4">
                  <h2 class="mb-2 font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                     Terms & Conditions: 
                  </h2>
                  <p class="text-gray-500 text-sm">
                     <?= $quotation['terms'] ?> <br>
                     <?= $quotation['vat'] ?><br>
                     We reserve the right to modify our quotation if apparent errors were made in the process.<br>
                     Prices are subject to change without prior notice, even prior to the expiry indicated above.<br>
                     All items are subject to availability at the time of receipt of Purchase Order.<br>
                     No approved signed PO received, no processing <br>
                     P5000.00 Minimum order
                  </p>
               </div>
               <div class="my-4">
                  <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                     Validity
                  </h2>
                  <p class="text-gray-500 text-sm">
                     <?= $quotation['validity'] ?> days
                  </p>
               </div>
               <div class="my-4">
                  <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                     Delivery
                  </h2>
                  <p class="text-gray-500 text-sm">
                     <?= $quotation['delivery'] ?>
                  </p>
               </div>
               <div class="my-4">
                  <h2 class="mb-2 font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                     Questions? Contact me
                  </h2>
                  <p class="text-sm">
                     <?= $quotation['created_by'] ?><br>
                     <?= $quotation['sales_email'] ?><br>
                     <?= $quotation['sales_phone'] ?>
                  </p>
                  <!-- <p class="text-gray-500 text-sm">
                     <?= $quotation['sales_email'] ?>
                  </p>
                  <p class="text-gray-500 text-sm mt-1">
                     <?= $quotation['sales_phone'] ?>
                  </p> -->
               </div>
               <div class="my-4">
                  <h2 class="mb-2 font-semibold text-gray-800 dark:text-gray-200 leading-tight">
                     Or contact the company directly
                  </h2>
                  <p class="text-sm">
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
                  <div class="my-4" id="attachments">
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


            <div id="actionButtons" class="flex justify-start gap-2 mt-4">
               <button type="button" onclick="generatePdf('print')" title="Print" class="bg-gray-300 px-4 py-2 rounded-md font-semibold">Print</button>
               <!-- <button type="button" onclick="generatePdf('download')" title="Download" class="bg-gray-300 px-4 py-2 rounded-md font-semibold">Download</button> -->
               <!-- <button type="button" title="Disapprove" onclick="toggleModal('quotationModal', 'Disapprove')" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded text-sm">Disapprove</button> -->
               <!-- <button title="Create" href="/quotation/create" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-add-line"></i></button> -->
            </div>
            </td>
         </tr>
        </tbody>
        <tfoot>
         <tr>
            <td>
               <div class="space">&nbsp;</div>
            </td>
         </tr>
        </tfoot>
      </table>
    </div>
  </div>
</section>
<!-- <div class="footer">...</div> -->
</body>
<script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script>

   async function generatePdf(action) {
      const attachments = document.getElementById('attachments')
      document.getElementById('actionButtons').style.display = 'none'
      if(attachments) {
         attachments.style.display = 'none'
      }
      // document.getElementById('invoice').className = 'w-full mx-auto'
      if(action == 'print') {
         window.print();
      }  
   }

   async function updateQuotation(id) {
      const successPanel = document.querySelector('.success-panel')
      const errorPanel = document.querySelector('.error-panel')
      const successMessage = document.querySelector('.successMessage')
      const errorMessage = document.querySelector('.errorMessage')
      const mode = document.querySelector('.modalText').innerHTML
      const formData = new FormData()
      formData.append("id", id)
      formData.append("mode", mode)
      try {
         const response = await fetch("/quotation/change-status", {
            method: "POST",
            body: formData
         });
         const data = await response.json()
         if (data.success) {
            successPanel.classList.remove('hidden')
            successMessage.innerText = data.message
            toggleModal('quotationModal')
         } else {
            errorPanel.classList.remove('hidden')
            errorMessage.innerText = data.message
            toggleModal('quotationModal')
         }
         // console.log(data.success);
      } catch (e) {
         console.error(e);
      }
   }
</script>