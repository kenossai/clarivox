@include('components.partners')
<footer class="footer-area style-two bg-optional position-relative z-1 pt-120">
    <div class="container">
        <div class="row justify-content-center pb-90">
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget mb-30" data-cue="slideInUp" data-show="true"
                    style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                    <h4 class="footer-widget-title position-relative fs-20 font-primary fw-bold text-white">Quick Links
                    </h4>
                    <ul class="footer-menu style-one list-unstyled mb-0">
                        <li><a href="services.html">Service</a></li>
                        <li><a href="pricing-plan.html">Pricing</a></li>
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="team.html">Team</a></li>
                        <li><a href="about.html">About</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 ps-xxl-5">
                <div class="footer-widget mb-30" data-cue="slideInUp" data-show="true"
                    style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 180ms; animation-direction: normal; animation-fill-mode: both;">
                    <h4 class="footer-widget-title position-relative fs-20 font-primary fw-bold text-white">Explore</h4>
                    <ul class="footer-menu style-one list-unstyled mb-0">
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li><a href="terms-conditions.html">Terms of Service</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="careers.html">Careers</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 ps-xxl-5">
                <div class="footer-widget mb-30 ps-xxl-4" data-cue="slideInUp" data-show="true"
                    style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 360ms; animation-direction: normal; animation-fill-mode: both;">
                    <h4 class="footer-widget-title position-relative fs-20 font-primary fw-bold text-white">Company</h4>
                    <ul class="footer-menu style-one list-unstyled mb-0">
                        <li><a href="location.html">Location</a></li>
                        <li><a href="projects.html">Works</a></li>
                        <li><a href="projects.html">Studio</a></li>
                        <li><a href="blog-right-sidebar.html">News</a></li>
                        <li><a href="properties.html">Categories</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 ps-xxl-5">
                <div class="footer-widget mb-30 ps-xxl-5" data-cue="slideInUp" data-show="true"
                    style="animation-name: slideInUp; animation-duration: 600ms; animation-timing-function: ease; animation-delay: 540ms; animation-direction: normal; animation-fill-mode: both;">
                    <h4 class="footer-widget-title position-relative fs-20 font-primary fw-bold text-white">Address</h4>
                    <ul class="contact-info-list list-unstyled mb-0">
                        <li><span class="fw-bold text-white me-1">Address:</span> 952 Bad Hill St, Asheville, NC 28, USA
                        </li>
                        <li><span class="fw-bold text-white me-1">Email:</span><a
                                href="mailto:hello@renius.com">hello@renius.com</a></li>
                        <li><span class="fw-bold text-white me-1">Phone:</span><a href="tel:96768678869">+96 76867
                                8869</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="footer-large-text font-optional fw-black round-10">
                    <span>C</span>
                    <span>L</span>
                    <span>A</span>
                    <span>R</span>
                    <span>I</span>
                    <span>V</span>
                    <span>O</span>
                    <span>X</span>
                </div>
            </div>
            <div class="col-md-5">
                <div
                    class="social-share d-flex flex-wrap align-items-center justify-content-md-start justify-content-center mb-sm-10">
                    <span class="text-alto fw-semibold me-2">Follow Us: </span>
                    <ul class="social-profile style-two list-unstyled mb-0">
                        <li><a href="https://www.facebook.com/" target="_blank"
                                class="d-flex flex-column align-items-center justify-content-center rounded-circle"><i
                                    class="ri-facebook-fill"></i></a></li>
                        <li><a href="https://x.com/?lang=en" target="_blank"
                                class="d-flex flex-column align-items-center justify-content-center rounded-circle"><i
                                    class="ri-twitter-x-line"></i></a></li>
                        <li><a href="https://www.instagram.com/" target="_blank"
                                class="d-flex flex-column align-items-center justify-content-center rounded-circle"><i
                                    class="ri-instagram-line"></i></a></li>
                        <li><a href="https://www.linkedin.com/" target="_blank"
                                class="d-flex flex-column align-items-center justify-content-center rounded-circle"><i
                                    class="ri-linkedin-fill"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-7 text-md-end text-center">
                <p class="copyright-text mb-0 text-white"><i class="ri-copyright-line"></i><span
                        class="text_secondary fw-medium">{{ date('Y') }}
                        {{ $currentSite?->name ?? config('app.name') }}</span> All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
