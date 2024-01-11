
<?php

use Core\Role;

 require base_path('views/partials/head.php') ?>
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
                  <a title="Create" href="/qoutation/create" class="bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded text-sm"><i class="ri-add-line"></i></a>
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
               <div class="rounded">
                  <!-- Tabs -->
                  <ul id="tabs" class="inline-flex w-full px-1 pt-2 ">
                     <li class="px-4 py-2 text-sm sm:text-base -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t"><a id="default-tab" href="#pending">Pending</a></li>
                     <li class="px-4 py-2 text-sm sm:text-base font-semibold text-gray-800 rounded-t"><a href="#approved">Approved</a></li>
                     <li class="px-4 py-2 text-sm sm:text-base font-semibold text-gray-800 rounded-t"><a href="#disapproved">Disapproved</a></li>
                     <li class="px-4 py-2 text-sm sm:text-base font-semibold text-gray-800 rounded-t"><a href="#all">All</a></li>
                  </ul>

                  <!-- Tab Contents -->
                  <div id="tab-contents">
                     <div id="pending" class="shadow overflow-hidden border-b sm:rounded-lg py-8">
                        <div class="flex flex-col">
                           <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="">
                                       <table class="min-w-full divide-y divide-gray-200 w-full">
                                          <thead>
                                             <tr>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Control no
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Created by
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Customer
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Status
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Created at
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Needed at
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Released at
                                                </th>
                                                <th scope="col" width="100" class="px-6 py-3 bg-gray-100">
                                                </th>
                                             </tr>
                                          </thead>
                                          <tbody class="bg-white divide-y divide-gray-200">
                                          <?php if(count($pendingQoutations) <= 0): ?>
                                             <tr>
                                                <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                   No items
                                                </td>
                                             </tr>
                                          <?php endif; ?>
                                          <?php foreach($pendingQoutations as $qoutation): ?>
                                             <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['control_no'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['created_by_name'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['customer_name'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?php
                                                      $status_color = 'amber';
                                                      $qoutation['status'] == 2 ? $status_color = 'green' : ($qoutation['status'] == 3 ? $status_color = 'red' : $status_color = 'amber');
                                                   ?>
                                                   <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-<?= $status_color ?>-200 text-<?= $status_color ?>-800">
                                                      <?= $qoutation['status_name'] ?>
                                                   </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= date('Y-m-d', strtotime($qoutation['created_at'])) ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['needed_at'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['released_at'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                   <a href="/qoutation/show?id=<?= $qoutation['id'] ?>" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                                   <!--<a href="/qoutation/edit?id=<?= $qoutation['id'] ?>" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a> -->
                                                   <!-- <a onclick="deleteqoutation(<?= $qoutation['id'] ?>)" class="cursor-pointer text-red-600 hover:text-red-900 mb-2 mr-2">Delete</a> -->
                                                   <?php if ($_SESSION['user']['role_id'] === Role::SALES && $qoutation['status'] === \Core\QoutationStatus::PENDING): ?>
                                                   <form class="inline-block" action="/qoutation/delete" method="POST" onsubmit="return confirm('Are you sure?');">
                                                         <input type="hidden" name="_method" value="DELETE">
                                                         <input type="hidden" name="id" value="<?= $qoutation['id'] ?>">
                                                         <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                                         <input type="submit" class="cursor-pointer text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                                   </form>
                                                   <?php endif; ?>
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
                     <div id="approved" class="shadow overflow-hidden border-b sm:rounded-lg py-8">
                        <div class="flex flex-col">
                           <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="">
                                       <table class="min-w-full divide-y divide-gray-200 w-full">
                                          <thead>
                                             <tr>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Control no
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Created by
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Customer
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Status
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Created at
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Needed at
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Released at
                                                </th>
                                                <th scope="col" width="100" class="px-6 py-3 bg-gray-100">
                                                </th>
                                             </tr>
                                          </thead>
                                          <tbody class="bg-white divide-y divide-gray-200">
                                          <?php if(count($approvedQoutations) <= 0): ?>
                                             <tr>
                                                <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                   No items
                                                </td>
                                             </tr>
                                          <?php endif; ?>
                                          <?php foreach($approvedQoutations as $qoutation): ?>
                                             <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['control_no'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['created_by_name'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['customer_name'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?php
                                                      $status_color = 'amber';
                                                      $qoutation['status'] == 2 ? $status_color = 'green' : ($qoutation['status'] == 3 ? $status_color = 'red' : $status_color = 'amber');
                                                   ?>
                                                   <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-<?= $status_color ?>-200 text-<?= $status_color ?>-800">
                                                      <?= $qoutation['status_name'] ?>
                                                   </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= date('Y-m-d', strtotime($qoutation['created_at'])) ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['needed_at'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['released_at'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                   <a href="/qoutation/show?id=<?= $qoutation['id'] ?>" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                                   <!--<a href="/qoutation/edit?id=<?= $qoutation['id'] ?>" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a> -->
                                                   <!-- <a onclick="deleteqoutation(<?= $qoutation['id'] ?>)" class="cursor-pointer text-red-600 hover:text-red-900 mb-2 mr-2">Delete</a> -->
                                                   <?php if ($_SESSION['user']['role_id'] === Role::SALES && $qoutation['status'] === \Core\QoutationStatus::PENDING): ?>
                                                   <form class="inline-block" action="/qoutation/delete" method="POST" onsubmit="return confirm('Are you sure?');">
                                                         <input type="hidden" name="_method" value="DELETE">
                                                         <input type="hidden" name="id" value="<?= $qoutation['id'] ?>">
                                                         <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                                         <input type="submit" class="cursor-pointer text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                                   </form>
                                                   <?php endif; ?>
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
                     <div id="disapproved" class="shadow overflow-hidden border-b sm:rounded-lg py-8">
                        <div class="flex flex-col">
                           <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="">
                                       <table class="min-w-full divide-y divide-gray-200 w-full">
                                          <thead>
                                             <tr>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Control no
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Created by
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Customer
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Status
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Created at
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Needed at
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Released at
                                                </th>
                                                <th scope="col" width="100" class="px-6 py-3 bg-gray-100">
                                                </th>
                                             </tr>
                                          </thead>
                                          <tbody class="bg-white divide-y divide-gray-200">
                                          <?php if(count($disapprovedQoutations) <= 0): ?>
                                             <tr>
                                                <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                   No items
                                                </td>
                                             </tr>
                                          <?php endif; ?>
                                          <?php foreach($disapprovedQoutations as $qoutation): ?>
                                             <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['control_no'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['created_by_name'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['customer_name'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?php
                                                      $status_color = 'amber';
                                                      $qoutation['status'] == 2 ? $status_color = 'green' : ($qoutation['status'] == 3 ? $status_color = 'red' : $status_color = 'amber');
                                                   ?>
                                                   <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-<?= $status_color ?>-200 text-<?= $status_color ?>-800">
                                                      <?= $qoutation['status_name'] ?>
                                                   </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= date('Y-m-d', strtotime($qoutation['created_at'])) ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['needed_at'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['released_at'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                   <a href="/qoutation/show?id=<?= $qoutation['id'] ?>" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                                   <!--<a href="/qoutation/edit?id=<?= $qoutation['id'] ?>" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a> -->
                                                   <!-- <a onclick="deleteqoutation(<?= $qoutation['id'] ?>)" class="cursor-pointer text-red-600 hover:text-red-900 mb-2 mr-2">Delete</a> -->
                                                   <?php if ($_SESSION['user']['role_id'] === Role::SALES && $qoutation['status'] === \Core\QoutationStatus::PENDING): ?>
                                                   <form class="inline-block" action="/qoutation/delete" method="POST" onsubmit="return confirm('Are you sure?');">
                                                         <input type="hidden" name="_method" value="DELETE">
                                                         <input type="hidden" name="id" value="<?= $qoutation['id'] ?>">
                                                         <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                                         <input type="submit" class="cursor-pointer text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                                   </form>
                                                   <?php endif; ?>
                                                </td>
                                             </tr>
                                          <?php endforeach ?>
                                          </tbody>
                                       </table>
                                    </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div id="all" class="shadow overflow-hidden border-b sm:rounded-lg py-8">
                        <div class="flex flex-col">
                           <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="">
                                       <table class="min-w-full divide-y divide-gray-200 w-full">
                                          <thead>
                                             <tr>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Control no
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Created by
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Customer
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Status
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Created at
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Needed at
                                                </th>
                                                <th scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider">
                                                   Released at
                                                </th>
                                                <th scope="col" width="100" class="px-6 py-3 bg-gray-100">
                                                </th>
                                             </tr>
                                          </thead>
                                          <tbody class="bg-white divide-y divide-gray-200">
                                          <?php if(count($allQoutations) <= 0): ?>
                                             <tr>
                                                <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center">
                                                   No items
                                                </td>
                                             </tr>
                                          <?php endif; ?>
                                          <?php foreach($allQoutations as $qoutation): ?>
                                             <tr>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['control_no'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['created_by_name'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['customer_name'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?php
                                                      $status_color = 'amber';
                                                      $qoutation['status'] == 2 ? $status_color = 'green' : ($qoutation['status'] == 3 ? $status_color = 'red' : $status_color = 'amber');
                                                   ?>
                                                   <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-<?= $status_color ?>-200 text-<?= $status_color ?>-800">
                                                      <?= $qoutation['status_name'] ?>
                                                   </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= date('Y-m-d', strtotime($qoutation['created_at'])) ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['needed_at'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                   <?= $qoutation['released_at'] ?>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                   <a href="/qoutation/show?id=<?= $qoutation['id'] ?>" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">View</a>
                                                   <!--<a href="/qoutation/edit?id=<?= $qoutation['id'] ?>" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">Edit</a> -->
                                                   <!-- <a onclick="deleteqoutation(<?= $qoutation['id'] ?>)" class="cursor-pointer text-red-600 hover:text-red-900 mb-2 mr-2">Delete</a> -->
                                                   <?php if ($_SESSION['user']['role_id'] === Role::SALES && $qoutation['status'] === \Core\QoutationStatus::PENDING): ?>
                                                   <form class="inline-block" action="/qoutation/delete" method="POST" onsubmit="return confirm('Are you sure?');">
                                                         <input type="hidden" name="_method" value="DELETE">
                                                         <input type="hidden" name="id" value="<?= $qoutation['id'] ?>">
                                                         <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                                         <input type="submit" class="cursor-pointer text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                                   </form>
                                                   <?php endif; ?>
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
               </div>

            </div>
         </main>

<!-- <script>
   const deleteqoutation = (id) => {
      if(confirm("Are you sure you want to delete this?")) {
         window.location.href = '/qoutation/delete?id=' + id;
      }
   }
</script> -->
<script>
   let tabsContainer = document.querySelector("#tabs");

   let tabTogglers = tabsContainer.querySelectorAll("a");
   // console.log(tabTogglers);

   tabTogglers.forEach(function(toggler) {
   toggler.addEventListener("click", function(e) {
      e.preventDefault();

      let tabName = this.getAttribute("href");

      let tabContents = document.querySelector("#tab-contents");

      for (let i = 0; i < tabContents.children.length; i++) {

         tabTogglers[i].parentElement.classList.remove("border-blue-400", "border-b",  "-mb-px", "opacity-100");  tabContents.children[i].classList.remove("hidden");
         if ("#" + tabContents.children[i].id === tabName) {
         continue;
         }
         tabContents.children[i].classList.add("hidden");

      }
      e.target.parentElement.classList.add("border-blue-400", "border-b-4", "-mb-px", "opacity-100");
   });
   });

   document.getElementById("default-tab").click();

</script>
<!-- Footer -->
<?php require base_path('views/partials/footer.php') ?>