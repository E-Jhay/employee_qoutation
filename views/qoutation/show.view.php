
<?php require base_path('views/partials/head.php') ?>
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
                  <div class="-mx-4 mt-8 flow-root sm:mx-0">
                     <table class="min-w-full">
                        <colgroup>
                           <col class="w-full sm:w-1/2">
                           <col class="sm:w-1/6">
                           <col class="sm:w-1/6">
                           <col class="sm:w-1/6">
                        </colgroup>
                        <thead class="border-b border-gray-300 text-gray-900">
                           <tr>
                           <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Items</th>
                           <th scope="col" class="hidden px-3 py-3.5 text-right text-sm font-semibold text-gray-900 sm:table-cell">Quantity</th>
                           <th scope="col" class="hidden px-3 py-3.5 text-right text-sm font-semibold text-gray-900 sm:table-cell">Price</th>
                           <th scope="col" class="py-3.5 pl-3 pr-4 text-right text-sm font-semibold text-gray-900 sm:pr-0">Amount</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($products as $product) : ?>
                              <tr class="border-b border-gray-200">
                                 <td class="max-w-0 py-5 pl-4 pr-3 text-sm sm:pl-0">
                                    <div class="font-medium text-gray-900"><?= $product['description'] ?></div>
                                    <div class="mt-1 truncate text-gray-500"><?= $product['code'] ?></div>
                                 </td>
                                 <td class="hidden px-3 py-5 text-right text-sm text-gray-500 sm:table-cell">500.0</td>
                                 <td class="hidden px-3 py-5 text-right text-sm text-gray-500 sm:table-cell">$100.00</td>
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
                  <div class="border-t-2 pt-4 text-xs text-gray-500 text-center mt-16">
                  Please pay the invoice before the due date. You can pay the invoice by logging in to your account from our client portal.
                  </div>

                  </div>
               </div>
         </main>
<!-- Footer -->
<?php require base_path('views/partials/footer.php') ?>