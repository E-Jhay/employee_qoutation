
<aside id="sidebar" class="fixed hidden z-20 h-full top-0 left-0 pt-16 flex lg:flex flex-shrink-0 flex-col w-64 transition-width duration-75" aria-label="Sidebar">
    <div class="relative flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white pt-0">
        <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
            <div class="flex-1 px-3 bg-white divide-y space-y-1">
                <ul class="space-y-2 pb-2">
                <li class="group <?= urlIs(['/', '/dashboard', '/admin']) ? 'active' : '' ?>">
                    <a href="<?= (int)$_SESSION['user']['role_id'] == \Core\Role::SALES ? '/' : ((int)$_SESSION['user']['role_id'] == \Core\Role::SALES_MANAGER ? '/dashboard' : '/admin') ?>" class="flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M13 21V11H21V21H13ZM3 13V3H11V13H3ZM9 11V5H5V11H9ZM3 21V15H11V21H3ZM5 19H9V17H5V19ZM15 19H19V13H15V19ZM13 3H21V9H13V3ZM15 5V7H19V5H15Z" fill="currentColor"></path></svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <!-- <li class="group">
                    <a href="/" class="flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 group-[.active]:text-white transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                        </svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Kanban</span>
                        <span class="bg-gray-200 text-gray-800 ml-3 text-sm font-medium inline-flex items-center justify-center px-2 rounded-full">Pro</span>
                    </a>
                </li>
                <li class="group">
                    <a href="#" class="flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 group-[.active]:text-white transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                            <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
                        </svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Inbox</span>
                        <span class="bg-gray-200 text-gray-800 ml-3 text-sm font-medium inline-flex items-center justify-center px-2 rounded-full">Pro</span>
                    </a>
                </li> -->
                <?php

                    use Core\Role;

                    if((int)$_SESSION['user']['role_id'] == Role::ADMIN): ?>
                <li class="group <?= urlIs(['/users', '/user/create', '/user/show', '/user/edit']) ? 'active' : '' ?>">
                    <a href="/users" class="flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z" fill="currentColor"></path></svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Users</span>
                    </a>
                </li>
                <li class="group <?= urlIs(['/roles', '/role/create', '/role/show', '/role/edit']) ? 'active' : '' ?>">
                    <a href="/roles" class="flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M5 4.60434V13.7889C5 15.1263 5.6684 16.3752 6.7812 17.1171L12 20.5963L17.2188 17.1171C18.3316 16.3752 19 15.1263 19 13.7889V4.60434L12 3.04879L5 4.60434ZM3.78307 2.82598L12 1L20.2169 2.82598C20.6745 2.92766 21 3.33347 21 3.80217V13.7889C21 15.795 19.9974 17.6684 18.3282 18.7812L12 23L5.6718 18.7812C4.00261 17.6684 3 15.795 3 13.7889V3.80217C3 3.33347 3.32553 2.92766 3.78307 2.82598ZM12 13.5L9.06107 15.0451L9.62236 11.7725L7.24472 9.45492L10.5305 8.97746L12 6L13.4695 8.97746L16.7553 9.45492L14.3776 11.7725L14.9389 15.0451L12 13.5Z" fill="currentColor"></path></svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Roles</span>
                    </a>
                </li>
                <li class="group <?= urlIs(['/teams', '/team/create', '/team/show', '/team/edit']) ? 'active' : '' ?>">
                    <a href="/teams" class="flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M2 22C2 17.5817 5.58172 14 10 14C14.4183 14 18 17.5817 18 22H16C16 18.6863 13.3137 16 10 16C6.68629 16 4 18.6863 4 22H2ZM10 13C6.685 13 4 10.315 4 7C4 3.685 6.685 1 10 1C13.315 1 16 3.685 16 7C16 10.315 13.315 13 10 13ZM10 11C12.21 11 14 9.21 14 7C14 4.79 12.21 3 10 3C7.79 3 6 4.79 6 7C6 9.21 7.79 11 10 11ZM18.2837 14.7028C21.0644 15.9561 23 18.752 23 22H21C21 19.564 19.5483 17.4671 17.4628 16.5271L18.2837 14.7028ZM17.5962 3.41321C19.5944 4.23703 21 6.20361 21 8.5C21 11.3702 18.8042 13.7252 16 13.9776V11.9646C17.6967 11.7222 19 10.264 19 8.5C19 7.11935 18.2016 5.92603 17.041 5.35635L17.5962 3.41321Z" fill="currentColor"></path></svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Teams</span>
                    </a>
                </li>
                <li class="group <?= urlIs(['/terms', '/term/create', '/term/show', '/term/edit']) ? 'active' : '' ?>">
                    <a href="/terms" class="flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z"></path></svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Terms</span>
                    </a>
                </li>
                <li class="group <?= urlIs(['/validity']) ? 'active' : '' ?>">
                    <a href="/validity" class="flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z"></path></svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Validity</span>
                    </a>
                </li>
                <li class="group <?= urlIs(['/companies', '/company/create', '/company/show', '/company/edit']) ? 'active' : '' ?>">
                    <a href="/companies" class="flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z"></path></svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Company</span>
                    </a>
                </li>
                <?php endif; ?>
                <?php if((int)$_SESSION['user']['role_id'] !== Role::ADMIN): ?>
                <li class="group <?= urlIs(['/quotations', '/quotation/create', '/quotation/show', '/quotation/edit']) ? 'active' : '' ?>">
                    <a href="/quotations" class="flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z" fill="currentColor"></path></svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Quotations</span>
                    </a>
                </li>
                <?php endif; ?>
                <li class="group">
                    <form method="POST" action="/session">
                        <input type="hidden" name="_method" value="DELETE"/>

                        <button type="submit" class="w-full flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M4 18H6V20H18V4H6V6H4V3C4 2.44772 4.44772 2 5 2H19C19.5523 2 20 2.44772 20 3V21C20 21.5523 19.5523 22 19 22H5C4.44772 22 4 21.5523 4 21V18ZM6 11H13V13H6V16L1 12L6 8V11Z" fill="currentColor"></path></svg>
                            <span class="ml-3 whitespace-nowrap">Logout</span>
                        </button>
                    </form>
                </li>
                <!-- <li class="group">
                    <a href="#" class="flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white sidebar-dropdown-toggle">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 group-[.active]:text-white transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Orders</span>
                        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
                    </a>
                    <ul class="pl-7 mt-4 hidden group-[.selected]:block">
                        <li class="mb-4">
                            <a href="#" class="text-gray-900 text-sm flex items-center before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Active order</a>
                        </li> 
                        <li class="mb-4">
                            <a href="#" class="text-gray-900 text-sm flex items-center before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Completed order</a>
                        </li> 
                        <li class="mb-4">
                            <a href="#" class="text-gray-900 text-sm flex items-center before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3">Canceled order</a>
                        </li> 
                    </ul>
                </li>
                <li class="group">
                    <a href="#" class="flex items-center p-2 text-gray-900 hover:bg-gray-200 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 group-[.active]:text-white transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Products</span>
                    </a>
                </li> -->
                <!-- <li>
                    <a href="#" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Sign In</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 flex items-center p-2 group ">
                        <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-3 flex-1 whitespace-nowrap">Sign Up</span>
                    </a>
                </li>
                </ul>
                <div class="space-y-2 pt-2">
                <a href="#" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                    <svg class="w-5 h-5 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="gem" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M378.7 32H133.3L256 182.7L378.7 32zM512 192l-107.4-141.3L289.6 192H512zM107.4 50.67L0 192h222.4L107.4 50.67zM244.3 474.9C247.3 478.2 251.6 480 256 480s8.653-1.828 11.67-5.062L510.6 224H1.365L244.3 474.9z"></path>
                    </svg>
                    <span class="ml-4">Upgrade to Pro</span>
                </a>
                <a href="#" target="_blank" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                    <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-3">Documentation</span>
                </a>
                <a href="#" target="_blank" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                    <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path>
                    </svg>
                    <span class="ml-3">Components</span>
                </a>
                <a href="#" target="_blank" class="text-base text-gray-900 font-normal rounded-lg hover:bg-gray-100 group transition duration-75 flex items-center p-2">
                    <svg class="w-6 h-6 text-gray-500 flex-shrink-0 group-hover:text-gray-900 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-3">Help</span>
                </a>
                </div> -->
            </div>
        </div>
    </div>
</aside>
<div class="bg-gray-900 opacity-50 hidden fixed inset-0 z-10" id="sidebarBackdrop"></div>