
<?php require_once('partials/head.php') ?>
      <!-- Navbar -->
   <?php require_once('partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require_once('partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-4">
            <!-- This is an example component -->
            <div class="bg-gray-50 flex items-center">
                <div class="container flex flex-col md:flex-row items-center justify-between px-5 text-gray-700">
                        <div class="w-full lg:w-1/2 mx-8">
                            <div class="text-7xl text-gray-900 font-dark font-extrabold mb-8">403 Not Authorized</div>
                        <p class="text-2xl md:text-3xl font-light leading-normal mb-8">
                            Sorry you are not authorized with this request
                        </p>
                        
                        <a href="/" class="px-5 inline py-3 text-sm font-medium leading-5 shadow-2xl text-white transition-all duration-400 border border-transparent rounded-lg focus:outline-none bg-gray-600 active:bg-gray-500 hover:bg-gray-500 hover:text-gray-900">back to homepage</a>
                </div>
                    <div class="w-full lg:flex lg:justify-end lg:w-1/2 mx-5 my-12">
                    <img src="https://user-images.githubusercontent.com/43953425/166269493-acd08ccb-4df3-4474-95c7-ad1034d3c070.svg" class="" alt="Page not found">
                    </div>
                
                </div>
            </div>
         </main>
<!-- Footer -->
<?php require_once('partials/footer.php') ?>