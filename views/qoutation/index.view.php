
<?php

use Core\QoutationStatus;
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
            <?php require base_path('views/partials/alerts.php') ?>
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
                     <li class="active px-4 py-2 text-sm sm:text-base -mb-px font-semibold text-gray-800 border-b-2 border-blue-400 rounded-t"><button id="<?= QoutationStatus::PENDING ?>" type="button" onclick="filterBystatus(this, <?= QoutationStatus::PENDING ?>)">Pending</button></li>
                     <li class="px-4 py-2 text-sm sm:text-base font-semibold text-gray-800 rounded-t"><button id="<?= QoutationStatus::APPROVED ?>" type="button" onclick="filterBystatus(this, <?= QoutationStatus::APPROVED ?>)">Approved</button></li>
                     <li class="px-4 py-2 text-sm sm:text-base font-semibold text-gray-800 rounded-t"><button id="<?= QoutationStatus::DISAPPROVED ?>" type="button" onclick="filterBystatus(this, <?= QoutationStatus::DISAPPROVED ?>)">Disapproved</button></li>
                     <li class="px-4 py-2 text-sm sm:text-base font-semibold text-gray-800 rounded-t"><button id="all" type="button" onclick="filterBystatus(this, 'all')">All</button></li>
                  </ul>

                  <div id="pending" class="shadow overflow-hidden border-b sm:rounded-lg mt-4 py-2">
                     <div class="px-4 mb-2 d-flex">
                        <select name="itemsPerPage" id="itemsPerPage" autocomplete="itemsPerpage" class="h-10 border rounded px-2 w-18 bg-transparent border-gray-300">
                           <option value="10" selected>10</option>
                           <option value="20">20</option>
                           <option value="25">25</option>
                           <option value="50">50</option>
                        </select>

                        <input type="text" name="searchTerm" id="searchTerm" class="h-10 border rounded px-2 bg-transparent border-gray-300" placeholder="Search..." />
                     </div>
                     <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                           <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                 <div class="">
                                    <table id="table" class="min-w-full divide-y divide-gray-200 w-full">
                                       <thead>
                                          <tr>
                                             <th onclick="sortTable(0)" scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                                                Control no
                                             </th>
                                             <th onclick="sortTable(1)" scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                                                Created by
                                             </th>
                                             <th onclick="sortTable(2)" scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                                                Customer
                                             </th>
                                             <th onclick="sortTable(3)" scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                                                Status
                                             </th>
                                             <th onclick="sortTable(4)" scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                                                Created at
                                             </th>
                                             <th onclick="sortTable(5)" scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                                                Needed at
                                             </th>
                                             <th onclick="sortTable(6)" scope="col" class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-800 uppercase tracking-wider cursor-pointer">
                                                Released at
                                             </th>
                                             <th scope="col" width="100" class="px-6 py-3 bg-gray-100">
                                             </th>
                                          </tr>
                                       </thead>
                                       <tbody id="tbody" class="bg-white divide-y divide-gray-200">

                                       </tbody>
                                    </table>
                                 </div>
                           </div>
                        </div>
                     </div>
                     <div class="my-4 flex justify-center sm:justify-end sm:pr-2">
                        <nav id="pagination" class="flex space-x-2" aria-label="Pagination">
                        </nav>
                     </div>

                     
                     
                  </div>
               </div>

            </div>
         </main>

<script>
   document.addEventListener("DOMContentLoaded", function () {
      getData(<?= QoutationStatus::PENDING ?>)
   })
   let sortOrders = {}; // Object to track sorting order for each column

   const getActiveStatus = () => {
      const status = document.querySelector('#tabs li.active button').id
      return status
   }
   const getItemsPerPage = () => {
      const itemsPerPage = document.getElementById('itemsPerPage').value
      return itemsPerPage
   }
   const getSearchTerm = () => {
      const searchTerm = document.getElementById('searchTerm').value
      return searchTerm
   }

   const filterBystatus = (button, status) => {
      let tabsContainer = document.querySelector("#tabs");
      
      let tabTogglers = tabsContainer.querySelectorAll("button");
      
      tabTogglers.forEach(toggler => {
         toggler.parentElement.classList.remove("active", "border-blue-400", "border-b-2", "-mb-px", "opacity-100")
      })
      button.parentElement.classList.add("active", "border-blue-400", "border-b-2", "-mb-px", "opacity-100");

      getData(status, getItemsPerPage(), getSearchTerm())
   }

   document.getElementById('itemsPerPage').addEventListener('change', (e) => {
      getData(getActiveStatus(), e.target.value, getSearchTerm())
   })
   document.getElementById('searchTerm').addEventListener('input', (e) => {
      getData(getActiveStatus(), getItemsPerPage(), e.target.value)
   })

   async function getData(status, itemsPerPage = 10, searchTerm = '', page = 1) {
      try {
         const response = await fetch(`/get-qoutations?status=${status}&itemsPerPage=${itemsPerPage}&searchTerm=${searchTerm}&page=${page}`);
         const data = await response.json()
         loadTable(data.qoutations)
         if(data.totalPages > 1) {
            displayPagination(data.totalPages, data.currentPage)
         } else {    
            const pagination = document.getElementById('pagination');
            pagination.innerHTML = '';
         }
      } catch (e) {
         console.error(e);
      }
   }

   // Function to display pagination controls
   function displayPagination(totalPages, currentPage) {
      const pagination = document.getElementById('pagination');
      pagination.innerHTML = '';

      if (currentPage > 1) {
         pagination.innerHTML += `<button class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-300 cursor-pointer leading-5 rounded-md transition duration-150 ease-in-out focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10" onclick="getData(${getActiveStatus()}, ${getItemsPerPage()}, '${getSearchTerm()}', ${currentPage - 1})">Previous</button>`;
      }

      let startPage = Math.max(1, currentPage - 1);
      let endPage = Math.min(totalPages, currentPage + 1);

      if (currentPage === 1) {
         endPage = Math.min(totalPages, currentPage + 2);
      } else if (currentPage === totalPages) {
         startPage = Math.max(1, currentPage - 2);
      }

      for (let i = startPage; i <= endPage; i++) {
         if (i === currentPage) {
            pagination.innerHTML += `<button class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 border border-gray200 bg-blue-200 cursor-pointer leading-5 rounded-md transition duration-150 ease-in-out focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10" onclick="getData(${getActiveStatus()}, ${getItemsPerPage()}, '${getSearchTerm()}', ${i})">${i}</button>`
         } else {
            pagination.innerHTML += `<button class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-300 cursor-pointer leading-5 rounded-md transition duration-150 ease-in-out focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10" onclick="getData(${getActiveStatus()}, ${getItemsPerPage()}, '${getSearchTerm()}', ${i})">${i}</button>`
         }
         
      }

      if (currentPage < totalPages) {
         pagination.innerHTML += `<button class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-300 cursor-pointer leading-5 rounded-md transition duration-150 ease-in-out focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10" onclick="getData(${getActiveStatus()}, ${getItemsPerPage()}, '${getSearchTerm()}', ${currentPage + 1})">Next</button>`;
      }
   }

   const loadTable = (qoutations) => {
      document.getElementById('tbody').innerHTML = ""
      let cells = [
         'control_no',
         'created_by_name',
         'customer_name',
         // 'product_name',
         'status_name',
         // 'stock',
         'created_at',
         'needed_at',
         'released_at',
         'action',
      ]

      qoutations.forEach(qoutation => {
         const tr = document.createElement('tr')
         cells.forEach(cell => {
            const td = document.createElement('td')
            if(cell !== 'action') {
               td.className = "px-6 py-4 whitespace-nowrap text-sm text-gray-900"
               if(cell == 'status_name') {
                  const span = document.createElement('span')
                  let status_color = 'amber'
                  qoutation['status'] == <?= QoutationStatus::APPROVED ?> ? status_color = 'green' : (qoutation['status'] == <?= QoutationStatus::DISAPPROVED ?> ? status_color = 'red' : status_color = 'amber');
                  span.className = `px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-${status_color}-200 text-${status_color}-800`
                  span.innerText = qoutation[cell]
                  td.appendChild(span)
               } else {
                  td.innerText = qoutation[cell]
               }
            }
            else {
               td.classList.add('py-4', 'px-6', 'text-sm', 'font-medium', 'text-right', 'whitespace-nowrap')
               let editBtn = document.createElement("a")
               
               editBtn.classList.add('text-blue-600', 'dark:text-blue-500', 'hover:underline', 'cursor-pointer', 'mb-2', 'mr-2')
               editBtn.innerText = `View`
               editBtn.href = `/qoutation/show?id=${qoutation['id']}`
               td.appendChild(editBtn)
               
               if (<?= (int)$_SESSION['user']['role_id'] === Role::SALES ? 1 : 0 ?> && qoutation['status'] === <?= QoutationStatus::PENDING ?>) {
                  let deleteBtn = document.createElement("a")

                  deleteBtn.classList.add('text-red-600', 'dark:text-red-500', 'hover:underline', 'cursor-pointer', 'mb-2', 'mr-2')
                  deleteBtn.innerText = `Delete`
                  deleteBtn.addEventListener('click', async (e) => {
                     e.preventDefault()
                     
                     const successPanel = document.querySelector('.success-panel')
                     const errorPanel = document.querySelector('.error-panel')
                     const successMessage = document.querySelector('.successMessage')
                     const errorMessage = document.querySelector('.errorMessage')
                     try {
                        const response = await fetch("/qoutation/delete", {
                           method: "DELETE",
                           headers: {
                              'Content-Type': 'application/json'
                           },
                           body: JSON.stringify({id : qoutation['id']})
                        });
                        const data = await response.json()
                        // const status = document.querySelector('#tabs li.active button').id
                        if (data.success) {
                           successPanel.classList.remove('hidden')
                           successMessage.innerText = data.message
                        } else {
                           errorPanel.classList.remove('hidden')
                           errorMessage.innerText = data.message
                        }
                        getData(getActiveStatus(), getItemsPerPage(), getSearchTerm())
                     } catch (e) {
                        console.error(e);
                     }
                  })
                  td.appendChild(deleteBtn)
               }
            }
            // Append cells to row
            tr.appendChild(td);
         })
         // // Append row to table body
         document.getElementById('tbody').appendChild(tr)
      })
   }
   
   const sortTable = (columnIndex) =>  {
      const table = document.getElementById("table");
      const rows = Array.from(table.getElementsByTagName("tr"));
      // Remove the header row
      rows.shift();

      // Toggle sorting order for the clicked column
      const currentOrder = sortOrders[columnIndex] || 'asc';
      const newOrder = currentOrder === 'asc' ? 'desc' : 'asc';
      sortOrders[columnIndex] = newOrder;

      rows.sort((a, b) => {
         const aValue = a.getElementsByTagName("td")[columnIndex].textContent;
         const bValue = b.getElementsByTagName("td")[columnIndex].textContent;
         return newOrder === 'asc' ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
      });

    // Clear the table body
    const tbody = table.getElementsByTagName("tbody")[0];
    tbody.innerHTML = "";

    // Re-append sorted rows
    rows.forEach(row => tbody.appendChild(row));

    // Remove arrows from all headers
    const headers = table.getElementsByTagName("th");
    for (let i = 0; i < headers.length; i++) {
        headers[i].querySelector('.sort-arrow')?.remove();
    }

    // Append arrow to the clicked header
    const clickedHeader = event.currentTarget;
    const arrow = document.createElement("span");
    arrow.className = "sort-arrow";
    arrow.innerHTML = `
        <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="12" height="12" fill="currentColor">
            <path d="${newOrder === 'desc' ? 'M12 14L6 8H18L12 14Z' : 'M12 8L18 14H6L12 8Z'}"></path>
        </svg>
    `;
    clickedHeader.appendChild(arrow);
   }
</script>
<!-- Footer -->
<?php require base_path('views/partials/footer.php') ?>