 <nav class="navbar navbar-dark navbar-theme-primary px-4 col-12 d-lg-none">
     <a class="navbar-brand me-lg-5" href="../../index.html">
         <img class="navbar-brand-dark" src="{{ asset('assets-admin/img/brand/light.svg') }}" alt="Volt logo" /> <img
             class="navbar-brand-light" src="{{ asset('') }}assets-admin/img/brand/dark.svg" alt="Volt logo" />
     </a>
     <div class="d-flex align-items-center">
         <button class="navbar-toggler d-lg-none collapsed" type="button" data-bs-toggle="collapse"
             data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
             aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
     </div>
 </nav>

 <nav id="sidebarMenu" class="sidebar d-lg-block bg-black text-white collapse" data-simplebar>
     <div class="sidebar-inner px-4 pt-3">
         <div
             class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
             <div class="d-flex align-items-center">
                 <div class="avatar-lg me-4">
                     <img src="{{ asset('assets-admin/img/team/profile-picture-3.jpg') }}"
                         class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                 </div>
                 <div class="d-block">
                     <h2 class="h5 mb-3">Hi, Jane</h2>
                     <a href="../../pages/examples/sign-in.html"
                         class="btn btn-secondary btn-sm d-inline-flex align-items-center">
                         <svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                             </path>
                         </svg>
                         Sign Out
                     </a>
                 </div>
             </div>
             <div class="collapse-close d-md-none">
                 <a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                     aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                     <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                         <path fill-rule="evenodd"
                             d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                             clip-rule="evenodd"></path>
                     </svg>
                 </a>
             </div>
         </div>
         <ul class="nav flex-column pt-3 pt-md-0">
             <li class="nav-item">
                 <a href="../../index.html" class="nav-link d-flex align-items-center">
                     <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                         viewBox="0 0 24 24">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                     </svg>

                     <span class="mt-1 ms-1 sidebar-text">Form pengisian data</span>
                 </a>
             </li>
             <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                 <path fill-rule="evenodd"
                     d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                     clip-rule="evenodd" />
             </svg><span class="mt-1 ms-1 sidebar-text">Master data</span>

             <li class="nav-item  active ">
                 <a href="{{ route('home') }}" class="nav-link">
                     <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                         viewBox="0 0 24 24">
                         <path fill-rule="evenodd"
                             d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                             clip-rule="evenodd" />
                     </svg>

                     <span class="sidebar-text">Warga</span>
                 </a>
             </li>


             <li class="nav-item  active ">
                 <a href="{{ route('user.index') }}" class="nav-link">
                     <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                         viewBox="0 0 24 24">
                         <path fill-rule="evenodd"
                             d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z"
                             clip-rule="evenodd" />
                     </svg>

                     <span class="sidebar-text">User</span>
                 </a>
             </li>
             <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                 <path
                     d="M11 21V2.352A3.451 3.451 0 0 0 9.5 2a3.5 3.5 0 0 0-3.261 2.238A3.5 3.5 0 0 0 4.04 8.015a3.518 3.518 0 0 0-.766 1.128c-.042.1-.064.209-.1.313a3.34 3.34 0 0 0-.106.344 3.463 3.463 0 0 0 .02 1.468A4.017 4.017 0 0 0 2.3 12.5l-.015.036a3.861 3.861 0 0 0-.216.779A3.968 3.968 0 0 0 2 14c.003.24.027.48.072.716a4 4 0 0 0 .235.832c.006.014.015.027.021.041a3.85 3.85 0 0 0 .417.727c.105.146.219.285.342.415.072.076.148.146.225.216.1.091.205.179.315.26.11.081.2.14.308.2.02.013.039.028.059.04v.053a3.506 3.506 0 0 0 3.03 3.469 3.426 3.426 0 0 0 4.154.577A.972.972 0 0 1 11 21Zm10.934-7.68a3.956 3.956 0 0 0-.215-.779l-.017-.038a4.016 4.016 0 0 0-.79-1.235 3.417 3.417 0 0 0 .017-1.468 3.387 3.387 0 0 0-.1-.333c-.034-.108-.057-.22-.1-.324a3.517 3.517 0 0 0-.766-1.128 3.5 3.5 0 0 0-2.202-3.777A3.5 3.5 0 0 0 14.5 2a3.451 3.451 0 0 0-1.5.352V21a.972.972 0 0 1-.184.546 3.426 3.426 0 0 0 4.154-.577A3.506 3.506 0 0 0 20 17.5v-.049c.02-.012.039-.027.059-.04.106-.064.208-.13.308-.2s.214-.169.315-.26c.077-.07.153-.14.225-.216a4.007 4.007 0 0 0 .459-.588c.115-.176.215-.361.3-.554.006-.014.015-.027.021-.041.087-.213.156-.434.205-.659.013-.057.024-.115.035-.173.046-.237.07-.478.073-.72a3.948 3.948 0 0 0-.066-.68Z" />
             </svg>

             <span class="mt-1 ms-1 sidebar-text">Fitur</span>


             <li class="nav-item  active ">
                 <a href="{{ route('produk.index') }}" class="nav-link">
                     <svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                         viewBox="0 0 24 24">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M7.99999 10.8571 12 13.1428m-4.00001-2.2857L4 13.1428m3.99999-2.2857.00004-4.57139M12 13.1428v4.5715m0-4.5715-4.00001 2.2857M12 13.1428l4-2.2857m-4 2.2857V8.57143m0 4.57137 4 2.2858m-4 2.2857L7.99999 20M12 17.7143 16 20m-8.00001 0L4 17.7143v-4.5715M7.99999 20v-4.5715M4 13.1428l3.99999 2.2857M16 6.28571 12 4 8.00003 6.28571m7.99997 0v4.57139m0-4.57139-4 2.28572m4 2.28567 4 2.2858M8.00003 6.28571 12 8.57143m8 4.57147v4.5714L16 20m4-6.8571-4 2.2857M16 20v-4.5714" />
                     </svg>

                     <span class="sidebar-text">Produk</span>
                 </a>
             </li>

             <li role="separator" class="dropdown-divider mt-4 mb-3 border-gray-700"></li>
         </ul>
     </div>
 </nav>
