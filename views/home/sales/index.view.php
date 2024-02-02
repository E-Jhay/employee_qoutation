
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
                           <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $pendingQoutations ?></span>
                           <h3 class="text-base font-normal text-gray-500">Pending qoutations</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-amber-500 text-base font-bold">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z" fill="currentColor"></path></svg>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <div class="flex items-center">
                        <div class="flex-shrink-0">
                           <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $approvedQoutations ?></span>
                           <h3 class="text-base font-normal text-gray-500">Approved qoutations this month</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z" fill="currentColor"></path></svg>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <div class="flex items-center">
                        <div class="flex-shrink-0">
                           <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $disapprovedQoutations ?></span>
                           <h3 class="text-base font-normal text-gray-500">Disapproved qoutations</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-red-500 text-base font-bold">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z" fill="currentColor"></path></svg>
                        </div>
                     </div>
                  </div>
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
   
   qoutedThisYear.forEach(sale => {
      sales[sale.month_name] = sale.total
   });

   new Chart(ctx, {
   type: 'line',
   data: {
      labels: Object.keys(sales),
      datasets: [{
         label: 'Monthly approved qoutation',
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