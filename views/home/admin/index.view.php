
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
                           <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $sales ?></span>
                           <h3 class="text-base font-normal text-gray-500">Number of sales</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-green-500 text-base font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z" fill="currentColor"></path></svg>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <div class="flex items-center">
                        <div class="flex-shrink-0">
                           <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $salesManager ?></span>
                           <h3 class="text-base font-normal text-gray-500">Number of sales manager</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-blue-500 text-base font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z" fill="currentColor"></path></svg>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <div class="flex items-center">
                        <div class="flex-shrink-0">
                           <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $teams ?></span>
                           <h3 class="text-base font-normal text-gray-500">Number of teams</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-amber-500 text-base font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40" fill="currentColor"><path d="M9.55 11.5C8.30736 11.5 7.3 10.4926 7.3 9.25C7.3 8.00736 8.30736 7 9.55 7C10.7926 7 11.8 8.00736 11.8 9.25C11.8 10.4926 10.7926 11.5 9.55 11.5ZM10 19.748V16.4C10 15.9116 10.1442 15.4627 10.4041 15.0624C10.1087 15.0213 9.80681 15 9.5 15C7.93201 15 6.49369 15.5552 5.37091 16.4797C6.44909 18.0721 8.08593 19.2553 10 19.748ZM4.45286 14.66C5.86432 13.6168 7.61013 13 9.5 13C10.5435 13 11.5431 13.188 12.4667 13.5321C13.3447 13.1888 14.3924 13 15.5 13C17.1597 13 18.6849 13.4239 19.706 14.1563C19.8976 13.4703 20 12.7471 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 12.9325 4.15956 13.8278 4.45286 14.66ZM18.8794 16.0859C18.4862 15.5526 17.1708 15 15.5 15C13.4939 15 12 15.7967 12 16.4V20C14.9255 20 17.4843 18.4296 18.8794 16.0859ZM12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM15.5 12.5C14.3954 12.5 13.5 11.6046 13.5 10.5C13.5 9.39543 14.3954 8.5 15.5 8.5C16.6046 8.5 17.5 9.39543 17.5 10.5C17.5 11.6046 16.6046 12.5 15.5 12.5Z"></path></svg>
                        </div>
                     </div>
                  </div>
                  <div class="bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8 ">
                     <div class="flex items-center">
                        <div class="flex-shrink-0">
                           <span class="text-2xl sm:text-3xl leading-none font-bold text-gray-900"><?= $roles ?></span>
                           <h3 class="text-base font-normal text-gray-500">Number of roles</h3>
                        </div>
                        <div class="ml-5 w-0 flex items-center justify-end flex-1 text-amber-500 text-base font-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="40" height="40"><path d="M5 4.60434V13.7889C5 15.1263 5.6684 16.3752 6.7812 17.1171L12 20.5963L17.2188 17.1171C18.3316 16.3752 19 15.1263 19 13.7889V4.60434L12 3.04879L5 4.60434ZM3.78307 2.82598L12 1L20.2169 2.82598C20.6745 2.92766 21 3.33347 21 3.80217V13.7889C21 15.795 19.9974 17.6684 18.3282 18.7812L12 23L5.6718 18.7812C4.00261 17.6684 3 15.795 3 13.7889V3.80217C3 3.33347 3.32553 2.92766 3.78307 2.82598ZM12 13.5L9.06107 15.0451L9.62236 11.7725L7.24472 9.45492L10.5305 8.97746L12 6L13.4695 8.97746L16.7553 9.45492L14.3776 11.7725L14.9389 15.0451L12 13.5Z" fill="currentColor"></path></svg>
                        </div>
                     </div>
                  </div>
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
   let salesThisYear = <?= $salesThisYear ?>

   // salesThisYear.reduce((acc, { total, month_name }) => {
   //    sales[month_name] = total
   // }, {})

   // console.log(salesThisYear)
   salesThisYear.forEach(sale => {
      sales[sale.month_name] = sale.total
   });


   new Chart(ctx, {
   type: 'line',
   data: {
      labels: Object.keys(sales),
      datasets: [{
         label: 'Monthly Sales',
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