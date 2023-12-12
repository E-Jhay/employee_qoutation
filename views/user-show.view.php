
<?php require_once('partials/head.php') ?>
      <!-- Navbar -->
   <?php require_once('partials/nav.php') ?>
   <div class="flex overflow-hidden bg-white pt-16">
      <!-- Sidebar -->
      <?php require_once('partials/sidebar.php') ?>
      <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
         <main class="pt-6 px-4 lg:px-8">
            <?php require_once('partials/banner.php') ?>
            <div>
               <div class="flex justify-end gap-2 mb-4 -mt-12">
                  <a title="Export" href="" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-file-download-line"></i></a>
                  <a title="Import" href="" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-file-line"></i></a>
                  <a title="Create" href="" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-add-line"></i></a>
               </div>
               <div class="shadow overflow-hidden border-b sm:rounded-lg py-8">
                  <div class="flex flex-col">
                     <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                              <div class="">
                                 <table class="min-w-full divide-y divide-gray-200 w-full">
                                    <thead>
                                       <tr>
                                          <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                             Name
                                          </th>
                                          <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                             Email
                                          </th>
                                          <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                             Phone
                                          </th>
                                          <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                             Email
                                          </th>
                                          <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                             Phone
                                          </th>
                                          <th scope="col" width="200" class="px-6 py-3 bg-gray-100">
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                       <tr>
                                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                             <?= $user['name'] ?>
                                          </td>
                                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                             <?= $user['email'] ?>
                                          </td>
                                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                             <?= $user['phone'] ?>
                                          </td>
                                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                             <?= $user['email'] ?>
                                          </td>
                                          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                             <?= $user['phone'] ?>
                                          </td>
                                          <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                             <a href="{{ route('tasks.show', $task->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                             <a href="/user/edit?id=<?= $user['id'] ?>" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a>
                                             <form class="inline-block" action="{{ route('tasks.destroy', $task->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                   <input type="submit" class="cursor-pointer text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                             </form>
                                          </td>
                                       </tr>
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
<!-- Footer -->
<?php require_once('partials/footer.php') ?>