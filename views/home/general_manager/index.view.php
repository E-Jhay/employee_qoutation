
<?php require_once base_path('views/partials/head.php') ?>
      <!-- Navbar -->
   <?php require_once base_path('views/partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require_once base_path('views/partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-4 lg:px-8">
            <?php require_once base_path('views/partials/banner.php') ?>
            <div>
               <div class="my-4 w-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <div class="flex items-center">
                        <div class="flex-shrink-0">
                           <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $averageApprovalTime ?></span>
                           <h3 class="text-base font-normal text-gray-500">Average Approval Time</h3>
                        </div>
                        
                     </div>
                  </div>
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <div class="flex items-center">
                        <div class="flex-shrink-0">
                           <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $pendingQuotations ?></span>
                           <h3 class="text-base font-normal text-gray-500">Pending quotations</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-amber-500 text-base font-bold">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z" fill="currentColor"></path></svg>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <div class="flex items-center">
                        <div class="flex-shrink-0">
                           <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $approvedQuotations ?></span>
                           <h3 class="text-base font-normal text-gray-500">Approved quotations this month</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z" fill="currentColor"></path></svg>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <div class="flex items-center">
                        <div class="flex-shrink-0">
                           <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $agentsCount ?></span>
                           <h3 class="text-base font-normal text-gray-500">Number of agents</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-blue-500 text-base font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z" fill="currentColor"></path></svg>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="my-4">
                  <div class="bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                     <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold leading-none text-gray-900">Latest Customers</h3>
                        <!-- <a href="#" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                        View all
                        </a> -->
                     </div>
                     <div class="flow-root">
                        <ul role="list" class="divide-y divide-gray-200">
                           <?php foreach($latestCustomers as $customer): ?>
                           <li class="py-3 sm:py-4">
                              <div class="flex items-center space-x-4">
                                 <!-- <div class="flex-shrink-0">
                                    <img class="h-8 w-8 rounded-full" src="https://demo.themesberg.com/windster/images/users/neil-sims.png" alt="Neil image">
                                 </div> -->
                                 <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                       <?= $customer['name'] ?>
                                    </p>
                                    <p class="text-sm text-gray-500 max-w-80">
                                       <!-- <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="17727a767e7b57607e7973646372653974787a">[email&#160;protected]</a> -->
                                       <?= $customer['address_line_1'] ?>
                                       <?= $customer['address_line_2'] ?>
                                       <?= $customer['city'] ?>
                                       <?= $customer['province'] ?>
                                    </p>
                                 </div>
                                 <!-- <div class="inline-flex items-center text-base font-semibold text-gray-900">
                                    $320
                                 </div> -->
                              </div>
                           </li>
                           <?php endforeach; ?>
                        </ul>
                     </div>
                  </div>
                  <!-- <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 mt-4 sm:mt-0">
                     <h3 class="text-xl leading-none font-bold text-gray-900 mb-2">Top Agents</h3>
                     <h3 class="text-base font-normal text-gray-500 mb-10">Month of <?= date('F') ?></h3>
                     <div class="block w-full overflow-x-auto">
                        <table class="items-center w-full bg-transparent border-collapse">
                           <thead>
                              <tr>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Agent name</th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap">Qouted</th>
                                 <th class="px-4 bg-gray-50 text-gray-700 align-middle py-3 text-xs font-semibold text-left uppercase border-l-0 border-r-0 whitespace-nowrap min-w-140-px"></th>
                              </tr>
                           </thead>
                           <tbody class="divide-y divide-gray-100">
                              <?php foreach($topAgents as $agent): ?>
                              <tr class="text-gray-500">
                                 <th class="border-t-0 px-4 align-middle text-sm font-normal whitespace-nowrap p-4 text-left"><?= $agent['name'] ?></th>
                                 <td class="border-t-0 px-4 align-middle text-xs font-medium text-gray-900 whitespace-nowrap p-4"><?= $agent['total'] ?></td>
                                 <td class="border-t-0 px-4 align-middle text-xs whitespace-nowrap p-4">
                                    <div class="flex items-center">
                                       <span class="basis-1/2 sm:mr-0 mr-2 text-xs font-medium"><?= $agent['percentage'] = number_format($agent['percentage'], 2) ?>%</span>
                                       <div class="relative w-full">
                                          <div class="w-full bg-gray-200 rounded-sm h-2">
                                             <div class="bg-cyan-600 h-2 rounded-sm" style="width: <?= $agent['percentage'] ?>%"></div>
                                          </div>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <?php endforeach; ?>
                           </tbody>
                        </table>
                     </div>
                  </div> -->
               </div>
               <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
                  <div class="flex items-center justify-between mb-4">
                     <div class="flex-shrink-0">
                        <!-- <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900">$45,385</span> -->
                        <h3 class="text-xl font-bold leading-none text-gray-900">Qouted this <?= date('Y') ?></h3>
                     </div>
                     <!-- <div class="flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                        12.5%
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                     </div> -->
                  </div>
                  <canvas id="main-chart" width="400" height="150"></canvas>
               </div>
            </div>
         </main>
<!-- Footer -->
<?php require_once base_path('views/partials/footer.php') ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   const ctx = document.getElementById('main-chart')
   let sales = {
      "January" : 0,
      "February" : 0,
      "March" : 0,
      "April" : 0,
      "May" : 0,
      "June" : 0,
      "July" : 0,
      "August" : 0,
      "September" : 0,
      "October" : 0,
      "November" : 0,
      "December" : 0
   }
   let qoutedThisYear = <?= $qoutedThisYear ?>

   // qoutedThisYear.reduce((acc, { total, month_name }) => {
   //    sales[month_name] = total
   // }, {})

   // console.log(qoutedThisYear)
   qoutedThisYear.forEach(sale => {
      sales[sale.month_name] = sale.total
   });


   new Chart(ctx, {
   type: 'line',
   data: {
      labels: Object.keys(sales),
      datasets: [{
         label: 'Monthly approved quotation',
         backgroundColor: 'rgba(75, 192, 192, 0.2)',
         borderColor: 'rgba(75, 192, 192, 1)',
         borderWidth: 2,
         data: Object.values(sales),
         // borderWidth: 1
      }]
   },
   options: {
         scales: {
            x: {
               type: 'category',
               labels: Object.keys(sales),
            },
            y: {
               beginAtZero: true
            }
         }
   }
   });
</script>