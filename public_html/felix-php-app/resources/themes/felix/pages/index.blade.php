<x-layouts.app>
    <!-- Üst Başlık Bölümü -->
    <div class="container mt-1">
        <div class="row align-items-center">
            <div class="col-lg-6 top-title-mobile">
                <h3 class="fw-bold text-center">{{ __('messages.emergency_service') }} {{ __('messages.location_service', ['location' => 'der Nähe']) }}</h3>
                <h4 class="fw-bold text-center">{{ __('messages.price_from', ['price' => '59']) }}</h4>
                <span class="ms-3 text-center">{{ __('messages.arrival_time') }}</span>
                <div class="badge bg-success text-white fs-5 py-2 px-3 w-100 border-felix">
                    <i class="fas fa-phone"></i> +49 176 23513191
                </div>
            </div>
            <div class="col-lg-6 top-title-section text-center">
                <h1>{{ __('messages.service_title') }}<br>
                    <div class="badge bg-success text-white fs-5 py-2 px-3">{{ __('messages.in_der_Nahe', ['location' => 'der Nähe']) }}</div>
                    <h1 class="fw-bold">Felix</h1>
                    <h2>{{ __('messages.years_experience', ['years' => '25']) }}</h2>
                    <div class="badge bg-success text-white fs-5 py-2 px-3"><a href="tel:+4917623513191" class="text-white text-decoration-none">
                        <i class="fas fa-phone"></i> +49 176 23513191 </a></div>
                    <p>{{ __('messages.always_available') }}</p>
                    <div class="mt-5 d-flex align-items-center info-card-logos">
                    <img src="themes/felix/images/phone-number.png" 
     alt="Locksmith Image" 
     class="img-fluid rounded px-3" 
     loading="lazy"
     style="width: 50%;"
     width="400"
     height="300">
                        <img src="themes/felix/images/59euro.webp" alt="Locksmith Image" class="img-fluid rounded px-3" loading="eager"
                             style="width: 20%;"  width="200" height="200">
                        <img src="themes/felix/images/carlogo.webp" alt="Locksmith Image" class="img-fluid rounded px-3" loading="eager"
                             style="width: 20%;"  width="200" height="200">
                    </div>
            </div>
            <div class="col-lg-6 text-center">
    
            <img src="/themes/felix/images/felix-schluesseldienst-tueroeffnung-schluesselnotdiest.webp.pagespeed.ce.GYPwnDAFlv.webp" 
     alt="felix schluesseldienst tueroeffnung schluesselnotdiest" 
     loading="eager" 
     class="img-fluid mt-3 optimized-img"
     width="800"
     height="600">

            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Sol Bilgilendirme Kartı -->
            <div class="col-lg-6 mb-4">
                <div class="card bg-primary text-white h-100">
                    <div class="card-body d-flex align-items-center">
                        <img
                            src="themes/felix/images/Felix_schluesseldienst_Schloß-Laden_Schloss-Geschaeft.webp"
                            alt="Felix schluesseldienst Schloß-Laden Schloss-Geschaeft"
                            class="me-3 rounded img-fluid"
                            style="max-width: 40%;"
                            width="400"
                            height="300"
                            loading="eager"
                        />
                        <div>
                            <h5>{{ __('messages.index.door_fallen') }}</h5>
                            <p>{{ __('messages.index.felix_nearby') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sağ Bilgilendirme Kartı -->
            <div class="col-lg-6">
                <div class="card h-100" style="background-color: transparent;">
                    <div class="card-body fair-card">
                        <h2 class="fw-bold text-center text-white"
                            style="background-color: #3921f5; border-radius: 10px;">
                            {{ __('messages.index.fair_affordable_fast') }}<br/>
                            {{ __('messages.index.years_experience', ['years' => 25]) }}
                        </h2>
                        <div class="row mt-4 fair-bullets">
                            <div class="col-sm-6">
                                <ul class="list">
                                    <li>{{ __('messages.index.fixed_price', ['price' => '59,- €']) }}</li>
                                    <li>{{ __('messages.index.service_24_7') }}</li>
                                    <li>{{ __('messages.index.locksmith_nearby') }}</li>
                                    <li>{{ __('messages.index.damage_free_opening') }}</li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list">
                                    <li>{{ __('messages.index.years_experience', ['years' => 25]) }}</li>
                                    <li>{{ __('messages.index.on_site_time', ['time' => '15-30']) }}</li>
                                    <li>{{ __('messages.index.payment_methods') }}</li>
                                    <li>{{ __('messages.index.student_senior_discount', ['discount' => '10']) }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="container">
        <div class="row ">
            <!-- Sol Bölüm -->
            <div class="col-lg-6 text-center text-lg-start mb-4 locksmith-image-container">
                <a href="tel:+4917623513191" class="text-decoration-none">
                    <img src="themes/felix/images/tuer-oeffnen-ausgesperrt-was-tun.webp" alt="Tür öffnen ausgesperrt was tun" loading="lazy" class="img-fluid rounded mb-3 locksmith-image">
                </a>
            </div>

            <!-- Sağ Bölüm -->
            <div class="col-lg-6">
                <span class="text-danger fw-bold service-title " style="font-size: 3rem;">{{ __('messages.index.service_24_7') }}</span>
                <span class="service-title title-felix"> {{ __('messages.index.locksmith_service') }}
                    <img src="themes/felix/images/24hours.webp" alt="{{ __('messages.index.locksmith_image_alt') }}" loading="lazy" style="width: 140px;">
                    </span>
                <h1 style="color: #535353;"> {{ __('messages.index.felix_locksmith_nearby') }}
                </h1>
                <p class="service-description">{{ __('messages.index.quick_service_district') }}
                </p>
                <ul class="service-list">
                    <li class="service-item"><i class="fas fa-car-side me-2"></i>- {{ __('messages.index.no_additional_costs', ['price' => '59,- €']) }}
                    </li>
                    <li class="service-item"><i class="fas fa-user-shield me-2"></i> - {{ __('messages.index.service_standards') }}
                    </li>
                    <li class="service-item"><i class="fas fa-truck me-2"></i> - {{ __('messages.index.always_available') }}
                    </li>
                    <li class="service-item"><i class="fas fa-tools me-2"></i> - {{ __('messages.index.modern_tools') }}
                    </li>
                </ul>
                <div class="discount-banner bg-success text-white p-3  mt-4">
                    <h5 class="fw-bold" style="color: black;">{{ __('messages.index.student_senior_discount', ['discount' => '10']) }}</h5>
                </div>
                <a href="tel:+4917623513191"
                   class="btn call-to-action-btn d-flex align-items-center justify-content-center no-radius">
                    <i class="fas fa-phone-alt me-2"></i> {{ __('messages.index.call_now') }}
                </a>
            </div>

        </div>
    </div>


        <!-- Section: Locksmith Solutions -->
        <div class="section-locksmith bg-primary text-white py-5">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Sol Bölüm -->
                    <div class="col-lg-5 mb-4">
                        <h2 class="section-title">{{ __('messages.index.door_fallen_question') }}</h2>
                        <p class="section-description">
                            {{ __('messages.index.no_worry_reliable') }}
                        </p>
                        <a href="https://wa.me/4917623513191"
                           class="btn whatsapp-button d-flex align-items-center justify-content-center">
                            <i class="fab fa-whatsapp me-2"></i> {{ __('messages.index.call_us_now') }}
                        </a>
                    </div>
    
                    <!-- Orta Resim -->
                    <div class="col-lg-2 d-flex justify-content-center align-items-center">
                        <img src="themes/felix/images/anahtar.png" alt="{{ __('messages.index.locksmith_image_alt') }}" class="center-image img-fluid rounded key-pic" loading="lazy">
                    </div>
    
                    <!-- Sağ Bölüm -->
                    <div class="col-lg-5">
                        <h3 class="section-subtitle text-success">{{ __('messages.index.professional_locksmith') }}
                        </h3>
                        <p class="section-description">
    
                            {{ __('messages.index.damage_free_question') }}
                            {{ __('messages.index.experience_years', ['years' => '25']) }} {{ __('messages.index.quick_service_on_site') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid my-5">
            <h2 class="text-center fw-bold">{{ __('messages.index.pricelist_title') }}</h2>
            <p class="text-center text-muted">{{ __('messages.index.contact_for_info') }}
            </p>
    
            <div class="d-flex justify-content-center align-items-center flex-wrap">
                <!-- Kartlar Başlangıcı -->
                <div class="service-card m-3">
                    <div class="card-header">
                        <p>{{ __('messages.index.door_opening') }}</p>
                    </div>
                    <div class="card-body">
                        <p>{{ __('messages.index.door_opening_hours') }}
                            <br>{{ __('messages.index.fixed_price', ['price' => '95,- €']) }}</p>
                    </div>
                </div>
                <div class="service-card m-3">
                    <div class="card-header">
                        <p>{{ __('messages.index.key_duplication') }}</p>
                    </div>
                    <div class="card-body">
                        <p>{{ __('messages.index.starting_price', ['price' => '7,50 €']) }}</p>
                    </div>
                </div>
                <div class="service-card m-3">
                    <div class="card-header">
                        <p>{{ __('messages.index.car_opening') }}</p>
                    </div>
                    <div class="card-body">
                        <p>{{ __('messages.index.starting_price', ['price' => '120,- €']) }}</p>
                    </div>
                </div>
                <div class="service-card m-3">
                    <div class="card-header">
                        <p>{{ __('messages.index.safe_opening') }}</p>
                    </div>
                    <div class="card-body">
                        <p>{{ __('messages.index.starting_price', ['price' => '89,- €']) }}</p>
                    </div>
                </div>
                <div class="service-card m-3">
                    <div class="card-header">
                        <p>{{ __('messages.index.car_key_duplication') }}</p>
                    </div>
                    <div class="card-body">
                        <p>{{ __('messages.index.starting_price', ['price' => '89,- €']) }}</p>
                    </div>
                </div>
            </div>
        </div>
    

        <div class="container my-5">
            <h2 class="text-center fw-bold">{{ __('messages.index.customer_reviews') }}</h2>
            <p class="text-center text-muted">{{ __('messages.index.customer_opinions') }}
            </p>
    
            <!-- Carousel Başlangıcı -->
            <div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Yorum Kartı 1 -->
                    <div class="carousel-item active">
                        <div class="review-card">
                            <h5>{{ __('messages.index.review_1_title') }}</h5>
                            <p>{{ __('messages.index.review_1_text') }}</p>
                            <div class="review-footer">
                                <span>{{ __('messages.index.review_1_author') }}</span>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Yorum Kartı 2 -->
                    <div class="carousel-item">
                        <div class="review-card">
                            <h5>{{ __('messages.index.review_2_title') }}</h5>
                            <p>{{ __('messages.index.review_2_text') }}</p>
                            <div class="review-footer">
                                <span>{{ __('messages.index.review_2_author') }}</span>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Yorum Kartı 3 -->
                    <div class="carousel-item">
                        <div class="review-card">
                            <h5>{{ __('messages.index.review_3_title') }}</h5>
                            <p>{{ __('messages.index.review_3_text') }}</p>
                            <div class="review-footer">
                                <span>{{ __('messages.index.review_3_author') }}</span>
                                <div class="stars">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sol Ok -->
                <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev" aria-label="{{ __('messages.index.previous_comment') }}">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <!-- Sağ Ok -->
                <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next" aria-label="{{ __('messages.index.next_comment') }}">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
            <!-- Sol Bilgilendirme Kartı2 -->
    <div class="container my-5">
        <h2 class="text-center fw-bold mb-4">{{ __('messages.suppliers_title') }}</h2>

        <!-- Logo Grid -->
        <div class="row g-4 text-center">
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/abus.png" alt="Logo 1" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/assaabloy.png" alt="Logo 2" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/burgwaechter.png" alt="Logo 3" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/ces.png" alt="Logo 4" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/dom.jpg" alt="Logo 5" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/econ.png" alt="Logo 6" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/evva.png" alt="Logo 7" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/glutz.png" alt="Logo 8" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/hoppe.png" alt="Logo 9" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/logo-herminghaus24.png" loading="lazy" alt="Logo 10" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/logo-kbv.png" alt="Logo 11" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/logo-messing-zawadski.png" loading="lazy" alt="Logo 12" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/logo-plusm.png" alt="Logo 13" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/logo-schweisthal.png" alt="Logo 14" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/logo-ventano.png" alt="Logo 15" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/siedle.png" alt="Logo 16" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="themes/felix/images/swiss_sector.jpg" alt="Logo 17" loading="lazy" class="img-fluid logo-img">
            </div>
        </div>
    </div>
</x-layouts.app>