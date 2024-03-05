
<?php require_once('partials/head.php') ?>
    <!-- This is an example component -->
    <div class="h-screen w-screen bg-gray-50 flex items-center">
        <div class="container flex flex-col md:flex-row items-center justify-between px-5 text-gray-700">
                <div class="w-full lg:w-1/2 md:ml-48">
                    <div class="text-7xl text-gray-800 font-dark font-extrabold mb-8">403 Not Authorized</div>
                <p class="text-2xl md:text-3xl font-light leading-normal mb-10">
                Sorry you are not authorized with this request
                </p>
                
                <a href="<?= (int)$_SESSION['user']['role_id'] == \Core\Role::SALES ? '/' : ((int)$_SESSION['user']['role_id'] == \Core\Role::SALES_MANAGER ? '/dashboard' : '/admin') ?>" class="px-5 inline py-3 text-sm font-medium leading-5 shadow-2xl text-white transition-all duration-400 border border-transparent rounded-lg focus:outline-none bg-gray-500 active:bg-gray-700 hover:bg-gray-700">back to homepage</a>
        </div>
            <div class="w-full lg:flex lg:justify-end lg:w-1/2 mx-5 my-12">
            <img src="https://user-images.githubusercontent.com/43953425/166269493-acd08ccb-4df3-4474-95c7-ad1034d3c070.svg" class="" alt="Page not found">
            </div>
        </div>
    </div>
</div>
</body>
</html>