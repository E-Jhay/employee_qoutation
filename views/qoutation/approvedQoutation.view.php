
<?php

use Core\QoutationStatus;
use Core\Role;

require base_path('views/partials/head.php') ?>
<div class="flex overflow-hidden bg-white pt-4">
<div class="w-full sm:w-3/5 mx-auto p-6 bg-white" id="invoice">


<!-- Client info -->
<!-- <div class="grid grid-cols-2 mt-4">
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

      <p class="font-bold text-gray-800 mt-4">
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
</div> -->

<div class="grid grid-cols-2 items-center mb-4">
   <div>
      <!--  Company logo  -->
      <img src="../images/logo.png" alt="company-logo" height="150" width="250">
   </div>
   <div class="text-right">
      <h1 class="font-bold text-gray-900 sm:text-4xl text-xl">Qoutation</h1>
      <h1 class="font-semibold text-gray-900 sm:text-xl text-xs">
         <?= $qoutation['control_no'] ?>
      </h1>
   </div>
</div>

<div class="flex justify-between gap-4 mt-2 sm:text-base text-xs">
   <div class="">
      <p class="font-bold text-gray-800">
         Qoutation for :
      </p>
      <p class="text-gray-500">
         <?= $qoutation['customer_name'] ?>
         <br />
         <?= $qoutation['customer_address'] ?>
         <br />
         <?= $qoutation['tel_no'] ?>
      </p>
   </div>

   <div class="text-right">
      <p class="">
         Quote created by:
         <span class="text-gray-500">
            <?= $qoutation['created_by'] ?>
         </span>
      </p>
      <p>
         <?= $qoutation['created_by'] ?>
      </p>
      <p class="text-gray-500 text-sm">
         <?= $qoutation['sales_email'] ?>
      </p>
      <p class="text-gray-500 text-sm mt-1">
         <?= $qoutation['sales_phone'] ?>
      </p>
   </div>
</div>

<div class="flex justify-between gap-4 mt-2 sm:text-base text-xs">
   <div class="">
      <p class="font-bold text-gray-800">
         <?= $qoutation['customer_contact_person'] ?>
      </p>
      <p class="text-gray-500">
         <?= $qoutation['customer_position'] ?>
      </p>
      <p class="text-gray-500">
         <?= $qoutation['customer_email'] ?>
      </p>
   </div>
   <div class="text-right">
      <p>
         Qoute created: 
         <span class="text-gray-500">
            <?= date('m-d-Y',strtotime($qoutation['created_at'])) ?>
         </span>
         <!-- <br />
         Qoute approved:
         <span class="text-gray-500">
            <?= date('m-d-Y',strtotime($qoutation['updated_at'])) ?? date('m-d-Y') ?>
         </span> -->
         <br />
         Qoute expires:
         <span class="text-gray-500">
            <?= date('m-d-Y',strtotime($qoutation['expired_at'])) ?? date('m-d-Y') ?>
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
<div class="-mx-4 flow-root sm:mx-0  overflow-x-auto">
   <table class="min-w-full">
      <thead class="border-b border-gray-300 text-gray-900">
         <tr>
            <th scope="col" class="w-1/3 py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Items</th>
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Quantity</th>
            <!-- <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Unit</th>
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Stock available</th>
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Comparative price</th>
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Catalog price</th>
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Proposed price</th> -->
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Price</th>
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Discount (%)</th>
            <th scope="col" class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900">Price after discount</th>
            <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">Discounted Total</th>
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
               <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
                  <div class="font-medium text-gray-900"><?= $product['description'] ?></div>
                  <div class="mt-1 truncate text-gray-500"><?= $product['code'] ?></div>
               </td>
               <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['quantity'] ?></td>
               <!-- <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['unit'] ?></td>
               <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['stock'] ?></td>
               <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['comparative_price'] ?></td>
               <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['catalog_price'] ?></td>
               <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['proposed_price'] ?></td> -->
               <td class="px-3 py-5 text-center text-sm text-gray-500"><?= number_format($product['catalog_price'], 2) ?></td>
               <td class="px-3 py-5 text-center text-sm text-gray-500"><?= $product['proposed_price_discount'] ?>%</td>
               <td class="px-3 py-5 text-center text-sm text-gray-500"><?= number_format($product['proposed_price'], 2) ?></td>
               <td class="py-5 pl-3 pr-4 text-right text-sm text-gray-500 sm:pr-0"><?= number_format($product['total'], 2) ?></td>
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
            <th scope="row" colspan="5" class="pl-4 pr-6 sm:pr-16 pt-4 text-right text-sm font-semibold text-gray-900">Total</th>
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

<?php if($qoutation['status'] == QoutationStatus::PENDING && (int)$_SESSION['user']['role_id'] == Role::SALES_MANAGER) : ?>
<div class="flex justify-end gap-2 mt-4">
   <button type="button" title="Approve" onclick="toggleModal('qoutationModal', 'Approve')" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm">Approve</button>
   <button type="button" title="Disapprove" onclick="toggleModal('qoutationModal', 'Disapprove')" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded text-sm">Disapprove</button>
   <!-- <button title="Create" href="/qoutation/create" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-add-line"></i></button> -->
</div>
<?php endif; ?>
<?php if(($qoutation['status'] == QoutationStatus::PENDING || $qoutation['status'] == QoutationStatus::DISAPPROVED) && (int)$_SESSION['user']['role_id'] == Role::SALES) : ?>
<div class="flex justify-end gap-2 mt-4">
   <a href="/qoutation/edit?id=<?= $qoutation['id'] ?>" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm">Modify</a>
   <!-- <button title="Create" href="/qoutation/create" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-add-line"></i></button> -->
</div>
<?php endif; ?>

<div class="my-8">
   <div class="my-4">
      <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
         Terms
      </h2>
      <p class="text-gray-500">
         <?= $qoutation['terms'] ?>
      </p>
   </div>
   <div class="my-4">
      <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
         Validity
      </h2>
      <p class="text-gray-500">
         <?= $qoutation['validity'] ?> days
      </p>
   </div>
   <div class="my-4">
      <h2 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight">
         Delivery
      </h2>
      <p class="text-gray-500">
         <?= $qoutation['delivery'] ?>
      </p>
   </div>
   <div class="my-4">
      <h2 class="mb-2 font-semibold text-gray-800 dark:text-gray-200 leading-tight">
         Questions? Contact me
      </h2>
      <p class="">
         <?= $qoutation['created_by'] ?>
      </p>
      <p class="text-gray-500 text-sm">
         <?= $qoutation['sales_email'] ?>
      </p>
      <p class="text-gray-500 text-sm mt-1">
         <?= $qoutation['sales_phone'] ?>
      </p>
   </div>
</div>


<div id="actionButtons" class="flex justify-end gap-2 mt-4">
   <button type="button" onclick="generatePdf('print')" title="Print" class="bg-gray-300 px-4 py-2 rounded-md font-semibold">Print</button>
   <!-- <button type="button" onclick="generatePdf('download')" title="Download" class="bg-gray-300 px-4 py-2 rounded-md font-semibold">Download</button> -->
   <!-- <button type="button" title="Disapprove" onclick="toggleModal('qoutationModal', 'Disapprove')" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded text-sm">Disapprove</button> -->
   <!-- <button title="Create" href="/qoutation/create" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-add-line"></i></button> -->
</div>

</div>
</div>
<script src="https://rawgit.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
<script>
   // const updateQoutation = (id) => {
   //    console.log(id)
   // }

   async function generatePdf(action) {

      document.getElementById('actionButtons').style.display = 'none'
      document.getElementById('invoice').className = 'w-full mx-auto p-6 bg-white'
      if(action === 'print') {
         window.print();
      } else {

         // Get the element to hide in the PDF
         const elementToHideInPDF = document.getElementById('actionButtons');

         // Clone the body content
         const clonedBody = document.body.cloneNode(true);

         // Apply a style to hide the element in the cloned body
         const elementToHideInPDFClone = clonedBody.querySelector('#actionButtons');
         elementToHideInPDFClone.style.display = 'none';
         
         clonedBody.querySelector('#invoice').className = 'w-full mx-auto p-6 bg-white'

         // Create a configuration object for html2pdf
   //  const options = {
   //      filename: 'downloaded_document.pdf',
   //      image: { type: 'jpeg', quality: 0.98 },
   //      html2canvas: { scale: 2 },
   //      jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
   //  };

    // All images are loaded, proceed to generate the PDF
   const options = {
      filename: 'pmc-qoutation.pdf',
      margin: 8,
      image: { type: 'jpeg', quality: 0.98 },
      html2canvas: { scale: 2 },
      jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
   };

   // Convert the entire body to a PDF with custom options
   // html2pdf(document.body, options);

    // Convert the cloned body to a PDF with custom options
    html2pdf(clonedBody, options);
         
      // // Clone the body content
      // const clonedBody = document.body.cloneNode(true);
      // // Apply a style to hide the element in the cloned body
      // clonedBody.document.getElementById('actionButtons').style.display = 'none'
      //    // // Convert the entire body to a PDF
      //    // const images = document.querySelectorAll('img');
      //    // const promises = [];

      //    // images.forEach(img => {
      //    //    const promise = new Promise((resolve, reject) => {
      //    //          if (img.complete) {
      //    //             resolve();
      //    //          } else {
      //    //             img.onload = resolve;
      //    //             img.onerror = reject;
      //    //          }
      //    //    });

      //    //    promises.push(promise);
      //    // });
      //    // Promise.all(promises)
      //    //    .then(() => {
      //    //          // All images are loaded, proceed to generate the PDF
      //    //          const options = {
      //    //             filename: 'pmc-qoutation.pdf',
      //    //             margin: 2,
      //    //             image: { type: 'jpeg', quality: 0.98 },
      //    //             html2canvas: { scale: 2 },
      //    //             jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
      //    //          };

      //    //          // Convert the entire body to a PDF with custom options
      //    //          html2pdf(document.body, options);
      //    // })
      //    // .catch(error => console.error('Error loading images:', error));
         
      //             // All images are loaded, proceed to generate the PDF
      //             const options = {
      //                filename: 'pmc-qoutation.pdf',
      //                margin: 2,
      //                image: { type: 'jpeg', quality: 0.98 },
      //                html2canvas: { scale: 2 },
      //                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
      //             };

      //             // Convert the entire body to a PDF with custom options
      //             html2pdf(clonedBody, options);
      }
      document.getElementById('actionButtons').style.display = ''
      document.getElementById('invoice').className = 'w-full sm:w-2/3 mx-auto p-6 bg-white'
      
   }

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