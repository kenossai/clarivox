 <div class="navbar-area style-three position-relative" id="navbar">
     <div class="container-fluid">
         <div class="navbar-wrapper d-flex justify-content-between align-items-center">
             <a href="index.html" class="navbar-brand">
                 <img src="assets/img/logo-white.png" alt="Logo">
             </a>
             <div class="menu-area me-auto">
                 <div class="overlay"></div>
                 <nav class="menu">
                     <div class="menu-mobile-header">
                         <button type="button" class="menu-mobile-arrow bg-transparent border-0"><i
                                 class="ri-arrow-left-s-line"></i></button>
                         <div class="menu-mobile-title"></div>
                         <button type="button" class="menu-mobile-close bg-transparent border-0"><i
                                 class="ri-close-line"></i></button>
                     </div>
                     <ul class="menu-section p-0 mb-0 lh-1">
                         <li class="menu-item-has-children">
                             <a href="{{ route('creative.home') }}" class="active">Home</a>
                         </li>
                         <li class="menu-item-has-children">
                             <a href="javascript:void(0)">About Us</a>
                         </li>
                         <li class="menu-item-has-children">
                             <a href="javascript:void(0)">Work</a>
                         </li>
                         <li class="menu-item-has-children">
                             <a href="javascript:void(0)">Blog<i class="ri-add-line"></i></a>
                             <ul class="menu-subs menu-column-1">
                                 <li class="menu-item-has-children"><a href="javascript:void(0)">Blog Layout<i
                                             class="ri-add-line"></i></a>
                                     <ul class="menu-subs menu-column-1">
                                         <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                         <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                         <li><a href="blog-grid.html">Blog Grid</a></li>
                                     </ul>
                                 </li>
                                 <li class="menu-item-has-children"><a href="javascript:void(0)">Blog Details Layout<i
                                             class="ri-add-line"></i></a>
                                     <ul class="menu-subs menu-column-1">
                                         <li><a href="blog-details-left-sidebar.html">Blog Details Left Sidebar</a></li>
                                         <li><a href="blog-details-right-sidebar.html">Blog Details Right Sidebar</a>
                                         </li>
                                         <li><a href="blog-details-no-sidebar.html">Blog Details No Sidebar</a></li>
                                     </ul>
                                 </li>
                                 <li class="menu-item-has-children"><a href="javascript:void(0)">Others<i
                                             class="ri-add-line"></i></a>
                                     <ul class="menu-subs menu-column-1">
                                         <li><a href="posts-by-author.html">Posts By Author</a></li>
                                         <li><a href="posts-by-date.html">Posts By Date</a></li>
                                         <li><a href="posts-by-category.html">Posts By Category</a></li>
                                         <li><a href="posts-by-tag.html">Posts By Tag</a></li>
                                     </ul>
                                 </li>
                             </ul>
                         </li>
                         <li><a href="{{ route('creative.contact.show') }}">Contact Us</a></li>
                     </ul>
                 </nav>
             </div>
             <div class="other-options d-flex flex-wrap align-items-center justify-content-end">
                 <div class="option-item d-flex flex-wrap align-items-center">
                     <div class="mobile-options position-relative d-lg-none">
                         <button class="dropdown-toggle  text-center bg-transparent border-0 p-0 transition"
                             type="button" data-bs-toggle="dropdown" aria-expanded="true">
                             <i class="ri-more-fill"></i>
                         </button>
                         <div class="dropdown-menu dropdown-menu-centered mobile-option-list top-1 border-0"
                             data-bs-popper="static">
                             <div class="dropdown-item">
                                 <div
                                     class="contact-link d-flex flex-wrap align-items-center position-relative transition">
                                     <span
                                         class="contact-icon d-flex flex-column align-items-center justify-content-center rounded-circle transition"><img
                                             src="assets/img/icons/phone.svg" alt="Icon" class="transition"></span>
                                     <div>
                                         <span class="text-white d-block">Call Us:</span>
                                         <span class="text_primary fw-semibold">+6857 886 960</span>
                                     </div>
                                     <a href="tel:6857886960" class="position-absolute top-0 start-0 w-100 h-100"></a>
                                 </div>
                             </div>
                             <div class="dropdown-item">
                                 <a href="contact.html"
                                     class="btn style-two d-inline-flex flex-wrap align-items-center p-0"><span
                                         class="btn-text d-inline-block fw-semibold position-relative transition">Get
                                         In Touch</span><span
                                         class="btn-icon position-relative d-flex flex-column align-items-center justify-content-center rounded-circle transition"><img
                                             src="assets/img/icons/up-right-arrow-black.svg" alt="Image"></span></a>
                             </div>
                         </div>
                     </div>
                     <div
                         class="contact-link d-lg-flex flex-wrap align-items-center position-relative d-none transition">
                         <span
                             class="contact-icon d-flex flex-column align-items-center justify-content-center rounded-circle transition"><img
                                 src="assets/img/icons/phone.svg" alt="Icon" class="transition"></span>
                         <div class="d-xl-inline d-none">
                             <span class="text-white d-block fw-semibold">Call Us:</span>
                             <span class="text_primary fw-semibold">+6857 886 960</span>
                         </div>
                         <a href="tel:6857886960" class="position-absolute top-0 start-0 w-100 h-100"></a>
                     </div>
                 </div>
                 <div class="option-item d-lg-block d-none">
                     <a href="contact.html" class="btn style-two d-inline-flex flex-wrap align-items-center p-0"><span
                             class="btn-text d-inline-block fw-semibold position-relative transition">Get In
                             Touch</span><span
                             class="btn-icon position-relative d-flex flex-column align-items-center justify-content-center rounded-circle transition"><img
                                 src="assets/img/icons/up-right-arrow-black.svg" alt="Image"></span></a>
                 </div>
                 <div class="option-item d-lg-none">
                     <button type="button" class="menu-mobile-trigger">
                         <span></span>
                         <span></span>
                         <span></span>
                         <span></span>
                     </button>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Navbar End -->
