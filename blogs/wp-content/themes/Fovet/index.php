    <?php
        get_header();
    ?>


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">About Us</h5>
                        <h1 class="mb-0">About Fovet</h1>
                    </div>
                    <p class="mb-4">
                        FoVET Research & Consultancy Ltd is a Kenyan based research, capacity building and consultancy firm (FoVET is the for-profit arm of Vision & Empowerment Trust (VET), which is a non-profit) with its head office in Nairobi, Kenya. FoVET offers research, monitoring and evaluation consultancy services as well as capacity building services tailored for individuals and groups affiliated to mainly Non-Profit Organizations and private sectors who wish to understand research, monitoring and evaluation from a practical perspective. FoVET has identified itself with a market niche comprising on education research with teams able to conduct both quantitative and qualitative researches. We have also built a working network with professional institutions, international research organizations and local non governmental and community based organizations. Our capacity building and consultancy services are in the areas of data collection (both remote and in-person), qualitative research, education (learning) assessments, education programmes monitoring and evaluation, programme design and proposal writing among others. Our training services are aimed helping individuals improve their professional knowledge, competence, skills, and effectiveness and enable the institutions to get the best out of their research, monitoring and evaluation teams. This is achieved through conducting short-time impact professional short courses, conferences, workshops and seminars
                    </p>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="<?php echo get_template_directory_uri() ?>/img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Team Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">Our Drive</h5>
                <h1 class="mb-0">Objectives, Mission and Vision Statement</h1>
            </div>
            <div class="row">
                <div class="col-lg-12 wow slideInUp" data-wow-delay="0.3s">
                    <h3 class="mb-0 text-center">Mission</h3>
                    <div class="row">
                        <div class="col-sm-8">
                            <p>
                                To develop a globally competent, adaptable, and dedicated workforce that meets and addresses changing developmental needs and challenges through the provision of optimally tailored solutions for individual aspirations and organizational excellence needs and being a strategic partner to our clients. 
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/mission.jpg" width="100%" height="auto" alt="Mission Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 wow slideInUp" data-wow-delay="0.6s">
                    <h3 class="mb-0 text-center">Vision</h3>
                    <div class="row">
                        <div class="col-sm-4">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/vission.jpg" width="100%" height="auto" alt="Vission image">
                        </div>
                        <div class="col-sm-8">
                            <p>
                                To become one of the most trusted research, consultancy and training organization for non-profits, private and public sectors in Africa and beyond
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 wow slideInUp" data-wow-delay="0.9s">
                    <h3 class="mb-0 text-center">Objectives</h3>
                    <div class="row">
                        <div class="col-sm-8">
                            <p>
                                To provide world-class research and consultancy services that improve productivity of individuals and institutions working in civil society, private and public sector.
                            </p>
                        </div>
                        <div class="col-sm-4">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/objectives.jpg" width="100%" height="auto" alt="Objectives">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <?php
        get_footer();
    ?>