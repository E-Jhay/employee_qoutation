
<?php require base_path('views/partials/head.php') ?>
      <!-- Navbar -->
   <?php require base_path('views/partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require base_path('views/partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-4 lg:px-8">
            <?php require base_path('views/partials/banner.php') ?>
            <div>
               <div class="flex justify-end gap-2 mb-4 -mt-12">
                  <a title="Export" href="" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-file-download-line"></i></a>
                  <a title="Import" href="" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-file-line"></i></a>
                  <a title="Create" href="/team/create" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-add-line"></i></a>
               </div>
               <?php if(Core\Session::get('success')): ?>
                  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative message-alert" role="alert">
                     <!-- <strong class="font-bold">Holy smokes!</strong> -->
                     <span class="block sm:inline"><?= Core\Session::get('success') ?></span>
                     <span onclick="removeMessage()" class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                     </span>
                  </div>
               <?php Core\Session::unflash('success'); endif; ?>
               <div class="shadow overflow-hidden border-b sm:rounded-lg py-8">
                  <div class="flex flex-col">
                     <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                              <div class="">
                                 <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                       <tr>
                                          <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                             Team Name
                                          </th>
                                          <!-- <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                             Region
                                          </th> -->
                                          <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                             Address
                                          </th>
                                          <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                             Manager
                                          </th>
                                          <th scope="col" width="200" class="px-6 py-3 bg-gray-100">
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    <?php foreach($teams as $team): ?>
                                          <tr>
                                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?= $team['name'] ?>
                                             </td>
                                             <!-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?= $team['region'] ?>
                                             </td> -->
                                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <?= htmlspecialchars($team['address']) ?>
                                             </td>
                                             <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                   <?= $team['manager'] ?>
                                                </span>
                                             </td>
                                             <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                <a href="/team/show?id=<?= $team['id'] ?>" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                                <a href="/team/edit?id=<?= $team['id'] ?>" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                                <!-- <a onclick="deleteteam(<?= $team['id'] ?>)" class="cursor-pointer text-red-600 hover:text-red-900 mb-2 mr-2">Delete</a> -->
                                                <form class="inline-block" action="/team/delete" method="POST" onsubmit="return confirm('Are you sure?');">
                                                      <input type="hidden" name="_method" value="DELETE">
                                                      <input type="hidden" name="id" value="<?= $team['id'] ?>">
                                                      <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                                      <input type="submit" class="cursor-pointer text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                                </form>
                                             </td>
                                          </tr>
                                    <?php endforeach ?>
                                    <!-- <tr>
                                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                             1
                                          </td>
                                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                             Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                          </td>
                                          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                             <a href="" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                             <a href="" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                             <form class="inline-block" action="" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                             </form>
                                          </td>
                                    </tr> -->
                                    </tbody>
                                 </table>
                              </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </main>

<!-- <script>
   const deleteteam = (id) => {
      if(confirm("Are you sure you want to delete this?")) {
         window.location.href = '/team/delete?id=' + id;
      }
   }
</script> -->
<!-- Footer -->
<?php require base_path('views/partials/footer.php') ?>