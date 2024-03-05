
<?php require base_path('views/partials/head.php') ?>
      <!-- Navbar -->
   <?php require base_path('views/partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require base_path('views/partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-2 lg:px-8">
            <?php require base_path('views/partials/banner.php') ?>
            <?php require base_path('views/partials/alerts.php') ?>
            <?php if(isset($_SESSION['success'])): ?>
                  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative message-alert" role="alert">
                     <!-- <strong class="font-bold">Holy smokes!</strong> -->
                     <span class="block sm:inline"><?= $_SESSION['success'] ?></span>
                     <span onclick="removeMessage()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                     </span>
                  </div>
               <?php unset($_SESSION['success']); endif; ?>
            <!-- component -->
            <form id="validityForm">
               <!-- <input type="hidden" name="_method" value="PUT"> -->
               <input type="hidden" name="id" value="<?= $validity['id'] ?>">
               <div class="bg-white rounded shadow-lg p-4 px-2 md:p-8 mb-6">
                  <div class="lg:col-span-2">
                     <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-6">
                        <div class="md:col-span-3">
                           <label for="validity">Validity</label>
                           <input type="number" name="validity" id="validity" class="h-10 border mt-1 rounded px-2 w-full bg-gray-50" value="<?= $validity['validity'] ?>" />
                        </div>

                        <div class="mt-4 md:col-span-6 text-left">
                           <div class="inline-flex items-end">
                              <button type="submit" class="w-32 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">Update</button>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </form>
         </main>
<!-- Footer -->
<?php require base_path('views/partials/footer.php') ?>

<script>
    const validityForm = document.getElementById('validityForm')
    validityForm.addEventListener('submit', (e) => {
        e.preventDefault()
        const formData = new FormData(validityForm)

        sendData(formData)
    })

    async function sendData(formData) {
      const successPanel = document.querySelector('.success-panel')
      const errorPanel = document.querySelector('.error-panel')
      const successMessage = document.querySelector('.successMessage')
      const errorMessage = document.querySelector('.errorMessage')
      try {
         const response = await fetch("/validity/update", {
            method: "POST",
            body: formData,
         });
         const data = await response.json()
         if (data.success) {
            successPanel.classList.remove('hidden')
            successMessage.innerText = data.message
            document.getElementById('app').scrollIntoView({ behavior: 'smooth', block: 'start' });
            console.log(data.message)
         } else {
            errorPanel.classList.remove('hidden')
            errorMessage.innerText = data.message
            document.getElementById('app').scrollIntoView({ behavior: 'smooth', block: 'start' });
         }
         console.log(data);
      } catch (e) {
         console.error(e);
      }
   }
</script>