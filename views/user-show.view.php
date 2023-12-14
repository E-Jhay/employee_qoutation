
<?php require_once('partials/head.php') ?>
      <!-- Navbar -->
   <?php require_once('partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require_once('partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-4 lg:px-8">
            <?php require_once('partials/banner.php') ?>
            <h1><?= $user['name'] ?></h1>
         </main>
<!-- Footer -->
<?php require_once('partials/footer.php') ?>