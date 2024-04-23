
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
    <script src="https://cdn.tailwindcss.com/3.4.3"></script>
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
               padding-bottom: 0 !important;
               padding-inline: 24px !important;
               /* background-color: blue; */
            }
            .top-space {
               height: 50px;
            }
            .space {
               height: 70px;
               /* background-color: red; */
            }

            footer {
               background-color: transparent;
               position: fixed;
               bottom: 0;
               left: 0;
               right: 0;
               width: 100%;
               margin: 0 auto;
               padding-inline: 36px;
               padding-bottom: 16px
            }
            /* html, body {
               width: 210mm;
               height: 297mm;
            } */

         }
         @page {
            size: A4 portrait !important;
            /* padding: 0 !important; */
            margin: 0 !important;
         }
      </style>
</head>
<body>

<div id="no-print" class="flex overflow-hidden">
   <div class="w-full sm:w-3/5 mx-auto p-6" id="invoice">

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
               <?= ucwords($quotation['customer_name']) ?>
               <br />
               <?= ucwords($quotation['customer_address_line_1']) ?>
               <?= ucwords($quotation['customer_address_line_2']) ?>
               <!-- <br />
               <?= $quotation['tel_no'] ?> -->
            </p>
            <p class="text-gray-500 max-w-52 sm:text-[1rem] text-[.7rem]">
               <?= ucwords($quotation['customer_city']) ?>,
               <?= ucwords($quotation['customer_province']) ?>
            </p>
            <div class="mt-2">
               <p class="font-semibold text-gray-800 sm:text-[1.2rem] text-[1rem]">
                  <?= ucwords($quotation['customer_contact_person']) ?>
               </p>
               <p class="text-gray-500 sm:text-[1rem] text-[.7rem]">
                  <?= ucwords($quotation['customer_position']) ?>
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
      

      <div class="mx-auto mt-8">
         <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Products
         </h2>
      </div>

      <!-- Invoice Items -->
      <div class="-mx-4 flow-root sm:mx-0  overflow-x-auto">
         <table class="min-w-full">
            <thead class="border-b border-gray-300 text-gray-900">
               <tr class="border-b border-gray-700">
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
                     <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0 min-w-36">
                        <div class="font-medium text-wrap text-gray-900"><?= $product['description'] ?></div>
                        <div class="mt-1 truncate text-gray-500"><?= $product['code'] ?></div>
                        <?php if($product['comment']): ?>
                           <div class="mt-1 text-gray-500">( <?= $product['comment'] ?> )</div>
                        <?php endif; ?>
                     </td>
                     <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['quantity'] ?></td>
                     <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['uom'] ?></td>
                     <td class="px-3 py-5 text-center text-sm text-gray-500">₱<?= number_format($product['wo_scd_price'], 2) ?></td>
                     <td class="px-3 py-5 text-center text-sm text-gray-500">₱<?= number_format($product['proposed_price'], 2) ?></td>
                     <td class="px-3 py-5 text-center text-sm text-gray-500">
                        ₱<?= number_format($product['wo_scd_price'] - $product['proposed_price'], 2)?>
                        (<?= number_format(($product['wo_scd_price'] - $product['proposed_price']) / $product['wo_scd_price'] * 100 , 2) ?>%)
                     </td>
                     <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0">₱<?= number_format($product['total'], 2) ?></td>
                     <!-- <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0"><?= $product['deal_equivalent'] ?></td> -->
                  </tr>
               <?php endforeach; ?>
            </tbody>
               <tfoot>
                  <tr class="border-b border-gray-700">
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <th scope="row" class="py-4 text-sm font-semibold text-gray-900">Total</th>
                     <td class="py-4 text-right text-sm font-semibold text-gray-900 pr-4 sm:pr-0">₱<?= number_format($grand_total, 2) ?></td>
                  </tr>
               </tfoot>
         </table>
      </div>

      <!--  Footer  -->
      <!-- <div class="border-t-2 pt-4 text-xs text-gray-500 text-center mt-16">
      Please pay the invoice before the due date. You can pay the invoice by logging in to your account from our client portal.
      </div> -->

      <div class="my-8">
         <!-- <div class="my-4">
            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
               <?= $quotation['vat'] ?>
            </h2>
         </div> -->
         <div class="my-4">
            <h2 class="mb-2 font-semibold text-gray-800 dark:text-gray-200 leading-tight">
               Terms & Conditions: 
            </h2>
            <p class="text-gray-500">
               
               <?= $quotation['vat'] ?><br>
               We reserve the right to modify the quotation if apparent errors were made in the process. <br>
               Prices are subject to change without prior notice, even prior to the expiry indicated above. <br>
               Prices are NET of all discounts including Senior Citizen Discount (SCD) / Persons with Disability (PWD), etc. <br>
               No approved, signed Purchase Order received, no processing or delivery will be made. <br>
               Items are subject to availability at the time of receipt of Purchase Order. <br>
               We reserve the right not to accept or process orders below P5,000.00.
            </p>
         </div>
         <!-- <div class="my-4">
            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
               Terms
            </h2>
            <p class="text-gray-500">
               
               No approved signed PO received, no processing <br>
               P5000.00 Minimum order
            </p>
         </div> -->
         <div class="my-4">
            <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
               Validity
            </h2>
            <p class="text-gray-500">
               <?= $quotation['validity'] ?> days
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
            <p class="">
               <?= $company['name'] ?>
            </p>
            <p class="text-gray-500 text-sm max-w-64">
               <?= $company['address_line_1'] ?>
               <?= $company['address_line_2'] ?>
               </br>
               <?= $company['city'] ?>,
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
      
      <div id="actionButtons" class="flex justify-end gap-2 mt-4">
         <button type="button" onclick="generatePdf('print')" title="Print" class="bg-gray-300 px-4 py-2 rounded-md font-semibold">Print</button>
         <!-- <button type="button" onclick="generatePdf('download')" title="Download" class="bg-gray-300 px-4 py-2 rounded-md font-semibold">Download</button> -->
         <!-- <button type="button" title="Disapprove" onclick="toggleModal('quotationModal', 'Disapprove')" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded text-sm">Disapprove</button> -->
         <!-- <button title="Create" href="/quotation/create" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-add-line"></i></button> -->
      </div>
   </div>
</div>

<section class="hidden container mx-auto sm:px-24 px-4">
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
            </th>
         </tr>
        </thead>
        <tbody class="">
         <tr>
            <td colspan="7">
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
                     <?= ucwords($quotation['customer_name']) ?>
                     <br />
                     <?= ucwords($quotation['customer_address_line_1']) ?>
                     <?= ucwords($quotation['customer_address_line_2']) ?>
                     <!-- <br />
                     <?= $quotation['tel_no'] ?> -->
                  </p>
                  <p class="text-gray-500 max-w-52 sm:text-[1rem] text-[.7rem]">
                     <?= ucwords($quotation['customer_city']) ?>,
                     <?= ucwords($quotation['customer_province']) ?>
                  </p>
                  <div class="mt-2">
                     <p class="font-semibold text-gray-800 sm:text-[1.2rem] text-[1rem]">
                        <?= ucwords($quotation['customer_contact_person']) ?>
                     </p>
                     <p class="text-gray-500 sm:text-[1rem] text-[.7rem]">
                        <?= ucwords($quotation['customer_position']) ?>
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
               <td class="max-w-0 py-2 pl-4 pr-3 text-sm sm:pl-0">
                  <div class="font-medium text-gray-900"><?= $product['description'] ?></div>
                  <div class="mt-1 truncate text-gray-500"><?= $product['code'] ?></div>
                  <?php if($product['comment']): ?>
                     <div class="mt-1 text-gray-500">( <?= $product['comment'] ?> )</div>
                  <?php endif; ?>
               </td>
               <td class="px-3 py-2 text-center text-sm text-gray-500"><?= $product['quantity'] ?></td>
               <td class="px-3 py-2 text-center text-sm text-gray-500"><?= $product['uom'] ?></td>
               <td class="px-3 py-2 text-center text-sm text-gray-500">₱<?= number_format($product['wo_scd_price'], 2) ?></td>
               <td class="px-3 py-2 text-center text-sm text-gray-500">₱<?= number_format($product['proposed_price'], 2) ?></td>
               <td class="px-3 py-2 text-center text-sm text-gray-500">
                  ₱<?= number_format($product['wo_scd_price'] - $product['proposed_price'], 2)?>
                  (<?= number_format(($product['wo_scd_price'] - $product['proposed_price']) / $product['wo_scd_price'] * 100 , 2) ?>%)
               </td>
               <td class="py-2 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0">₱<?= number_format($product['total'], 2) ?></td>
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
            <div class="">
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
               <div class="mt-4">
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
                     <?= $company['city'] ?>,
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
            </div>


            <!-- <div id="actionButtons" class="flex justify-start gap-2 mt-4">
               <button type="button" onclick="generatePdf('print')" title="Print" class="bg-gray-300 px-4 py-2 rounded-md font-semibold">Print</button>
            </div> -->
            </td>
         </tr>
        </tbody>
        <tfoot>
         <tr>
            <td colspan="7">
               <div class="space">&nbsp;</div>
               <!-- <div class=""><span class="bg-blue-500">&nbsp;</span></div>
               <div class=""><span class="bg-green-500">&nbsp;</span></div> -->
            </td>
         </tr>
        </tfoot>
      </table>
      <footer class="flex justify-between gap-4 font-semibold">
         <div class="">
            <p class="text-blue-900 text-xs">
               200 C. Raymundo Avenue, Caniogan, Pasig City 1606 Philippines
               <br />
               T +63 (2) 8656 6888  E info.pmc.ph
            </p>
         </div>

         <div class="text-right">
            <p class="text-blue-900 font-bold text-lg">
               www.pmc.ph
            </p>
         </div>
      </footer>
    </div>
  </div>
</section>
<!-- <div class="footer">...</div> -->
</body>
<!-- <script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

<script>

   async function generatePdf(action) {
      const attachments = document.getElementById('attachments')
      document.getElementById('actionButtons').style.display = 'none'
      document.querySelector('#no-print').style.display = 'none'
      document.querySelector('.container').classList.remove('hidden')
      if(attachments) {
         attachments.style.display = 'none'
      }
      // document.getElementById('invoice').className = 'w-full mx-auto'
      if(action == 'print') {
         window.print();
      }  
      // else {
      //    const section = document.querySelector('.container')
      //    console.log(section)
      //    html2pdf().from(section).save()
      // }

      
      document.getElementById('actionButtons').style.display = ''
      document.querySelector('#no-print').style.display = ''
      document.querySelector('.container').classList.add('hidden')
   }

</script>