<x-layouts.app>
    <!-- Üst Başlık Bölümü -->
    <div class="container mt-1">
        <div class="row align-items-center">
            <div class="col-lg-6 top-title-mobile">
                <h3 class="fw-bold text-center">{{ __('messages.emergency_service') }} {{ trim($location_name) }}</h3>
                <h4 class="fw-bold text-center">{{ __('messages.price_from', ['price' => '59']) }}</h4>
                <span class="ms-3 text-center">{{ __('messages.arrival_time') }}</span>
                <div class="badge bg-success text-white fs-5 py-2 px-3 w-100 border-felix">
                    <i class="fas fa-phone"></i> +49 176 23513191 
                </div>
            </div>
            <div class="col-lg-6 top-title-section text-center">
                <h1>{{ __('messages.service_title') }}<br>
                    <div class="badge bg-success text-white fs-5 py-2 px-3">{{ trim($location_name) }}</div>
                    <h1 class="fw-bold">Felix</h1>
                    <h2>{{ __('messages.years_experience', ['years' => '25']) }}</h2>
                    <div class="badge bg-success text-white fs-5 py-2 px-3">
                    <a href="tel:+4917623513191" class="text-white text-decoration-none">
                    <i class="fas fa-phone"></i> +49 176 23513191 </a>
                    </div>
                    <p>{{ __('messages.location.always_available') }}</p>
                    <div class="mt-5 d-flex align-items-center info-card-logos">
                    <img src="/themes/felix/images/phone-number.png" 
                          alt="Locksmith Image" 
                          class="img-fluid rounded px-3" 
                          loading="lazy"
                          style="width: 50%;"
                          width="400"
                          height="300">
                        <img src="/themes/felix/images/59euro.webp" alt="Locksmith Image" class="img-fluid rounded px-3" loading="eager"
                             style="width: 20%;"  width="200" height="200">
                        <img src="/themes/felix/images/carlogo.webp" alt="Locksmith Image" class="img-fluid rounded px-3" loading="eager"
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
                            src="/themes/felix/images/Felix_schluesseldienst_Schloß-Laden_Schloss-Geschaeft.webp"
                            alt="Felix schluesseldienst Schloß-Laden Schloss-Geschaeft"
                            class="me-3 rounded img-fluid"
                            style="max-width: 40%;"
                            width="400"
                            height="300"
                            loading="eager"
                        />
                        <div>
                            <h5>{{ __('messages.location.door_fallen') }}</h5> 
                            <p>{{ __('messages.location.door_fallen_text') }} {{ trim($location_name) }}.</p>
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
                            {{ __('messages.fair_cheap_fast') }}<br/>
                            {{ __('messages.years_experience', ['years' => '25']) }}
                        </h2>
                        <div class="row mt-4 fair-bullets">
                            <div class="col-sm-6">
                                <ul class="list">
                                    <li>{{ __('messages.location.fixed_price', ['price' => '59']) }}</li>
                                    <li>{{ __('messages.location.service_24_7') }}</li>
                                    <li><p>{{ __('messages.location.door_fallen_text2') }} {{ trim($location_name) }}.</p></li>
                                    <li>{{ __('messages.location.damage_free_opening') }}</li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list">
                                    <li>{{ __('messages.location.years_experience', ['years' => '25']) }}</li>
                                    <li>{{ __('messages.location.on_site_time', ['time' => '15-30']) }}</li>
                                    <li>{{ __('messages.location.payment_methods') }}</li>
                                    <li>{{ __('messages.location.student_senior_discount', ['discount' => '10']) }}</li>
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
                    <img src="/themes/felix/images/tuer-oeffnen-ausgesperrt-was-tun.webp" loading="lazy" alt="Tür öffnen ausgesperrt was tun" class="img-fluid rounded mb-3 locksmith-image">
                </a>
            </div>

          <!-- Sağ Bölüm --> 
          <div class="col-lg-6">
            <span class="text-danger fw-bold service-title " style="font-size: 3rem;">{{ __('messages.location.service_24_72') }}</span>
            <span class="service-title title-felix"> {{ __('messages.location.locksmith_service') }}
                <img src="/themes/felix/images/24hours.webp" alt="Locksmith Image" loading="lazy" style="width: 140px;">
                </span>
            <h1 style="color: #535353;"> {{ __('messages.location.felix_locksmith_in') }} {{ trim($location_name) }}
            </h1>
            <p class="service-description">{{ __('messages.location.quick_service') }}
            </p>
            <ul class="service-list">
                <li class="service-item"><i class="fas fa-car-side me-2"></i>- {{ __('messages.location.no_extra_cost', ['price' => '59']) }}
                </li>
                <li class="service-item"><i class="fas fa-user-shield me-2"></i> - {{ __('messages.location.service_standards') }}
                </li>
                <li class="service-item"><i class="fas fa-truck me-2"></i> - {{ __('messages.location.always_available2', ['location' => trim($location_name)]) }}
                </li>
                <li class="service-item"><i class="fas fa-tools me-2"></i> - {{ __('messages.location.modern_tools') }}
                </li>
            </ul>
            <div class="discount-banner bg-success text-white p-3 mt-4">
                <h5 class="fw-bold" style="color: black;">{{ __('messages.location.student_senior_discount2', ['discount' => '10']) }}</h5>
            </div>
            <a href="tel:+4917623513191"
               class="btn call-to-action-btn d-flex align-items-center justify-content-center no-radius">
                <i class="fas fa-phone-alt me-2"></i> {{ __('messages.location.call_now') }}
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
                <h2 class="section-title">{{ __('messages.location.door_fallen_question') }} {{ __('messages.location.felix_locksmith_in') }} {{ trim($location_name) }}!</h2>
                <p class="section-description">
                    {{ __('messages.location.no_worry') }} {{ __('messages.location.felix_locksmith_reaches') }} {{ trim($location_name) }} {{ __('messages.location.quick_reliable') }}
                </p>
                <a href="https://wa.me/4917623513191"
                   class="btn whatsapp-button d-flex align-items-center justify-content-center">
                    <i class="fab fa-whatsapp me-2"></i> {{ __('messages.location.call_us') }}
                </a>
            </div>

            <!-- Orta Resim -->
            <div class="col-lg-2 d-flex justify-content-center align-items-center">
                <img src="/themes/felix/images/anahtar.png" alt="Locksmith Image" loading="lazy" class="center-image img-fluid rounded key-pic">
            </div>

            <!-- Sağ Bölüm -->
            <div class="col-lg-5">
                <h3 class="section-subtitle text-success">{{ __('messages.location.professional_locksmith') }}
                </h3>
                <p class="section-description">

                    {{ __('messages.location.damage_free_question') }}
                    {{ __('messages.location.experience_years', ['years' => '25']) }} {{ __('messages.location.quick_on_site') }}
                </p>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid my-5">
    <h2 class="text-center fw-bold">{{ __('messages.location.price_list_in') }} {{ trim($location_name) }}
    </h2>
    <p class="text-center text-muted">{{ __('messages.location.contact_for_more_info') }}
    </p>

    <div class="d-flex justify-content-center align-items-center flex-wrap">
        <!-- Kartlar Başlangıcı -->
        <div class="service-card m-3">
            <div class="card-header">
                <p>{{ __('messages.location.door_opening') }}</p>
            </div>
            <div class="card-body">
                <p>{{ __('messages.location.door_opening_hours') }}
                    <br>{{ __('messages.location.fixed_price', ['price' => '95']) }}</p>
            </div>
        </div>
        <div class="service-card m-3">
            <div class="card-header">
                <p>{{ __('messages.location.key_duplication') }}</p>
            </div>
            <div class="card-body">
                <p>{{ __('messages.location.starting_price', ['price' => '7,50']) }}</p>
            </div>
        </div>
        <div class="service-card m-3">
            <div class="card-header">
                <p>{{ __('messages.location.car_opening') }}</p>
            </div>
            <div class="card-body">
                <p>{{ __('messages.location.starting_price', ['price' => '120']) }}</p>
            </div>
        </div>
        <div class="service-card m-3">
            <div class="card-header">
                <p>{{ __('messages.location.safe_opening') }}</p>
            </div>
            <div class="card-body">
                <p>{{ __('messages.location.starting_price', ['price' => '89']) }}</p>
            </div>
        </div>
        <div class="service-card m-3">
            <div class="card-header">
                <p>{{ __('messages.location.car_key_duplication') }}</p>
            </div>
            <div class="card-body">
                <p>{{ __('messages.location.starting_price', ['price' => '89']) }}</p>
            </div>
        </div>
    </div>
</div>


<div class="container" style="margin-top: 6rem !important;">
    <div class="row align-items-center">
        <!-- Sol Kısım: Yazı -->
        <div class="col-md-6">
            <h2 class="fw-bold">
                {{ __('messages.location.lock_change_in', ['location' => trim($location_name)]) }} <br>
                {{ __('messages.location.locksmith_felix') }}
            </h2>
            <p class="text-muted mt-2">
                {{ __('messages.location.security_risk_key_lost') }}
            </p>
            <p class="text-muted">
                {{ __('messages.location.felix_locksmith_changes_lock', ['location' => trim($location_name)]) }}
                {{ __('messages.location.new_lock_situations') }}
                {{ __('messages.location.after_break_in') }}
                {{ __('messages.location.defective_locks_help', ['location' => trim($location_name)]) }}
            </p>
        </div>
        <!-- Sağ Kısım: Resim -->
        <div class="col-md-6 text-center">
            <img src="/themes/felix/images/acil-cilingir-1.webp" alt="{{ __('messages.location.lock_change_image_alt') }}" loading="lazy" class="img-fluid rounded">
        </div>
    </div>
</div>
    

    <div class="container my-5" style="margin-top: 4rem !important;">
        <h2 class="text-center fw-bold">Kunden Bewertungen</h2>
        <p class="text-center text-muted">Die Meinung unserer Kunden über Felix Schlüsseldienst vor Ort
        </p>

        <!-- Carousel Başlangıcı -->
        <div id="reviewCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Yorum Kartı 1 -->
                <div class="carousel-item active">
                    <div class="review-card">
                        <h5>Absolute Empfehlung!</h5>
                        <p>„Die Felix Schlüsseldienst in Schlüsseldienst {{ trim($location_name) }} war schnell vor Ort und hat meine
                            Haustür ohne Schäden geöffnet. Der Preis war auch absolut fair. Kann ich wärmstens
                            weiterempfehlen, wenn jemand seinen Schlüssel verlieren sollte!“</p>
                        <div class="review-footer">
                            <span>Claudia Müller</span>
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
                        <h5>Danke!</h5>
                        <p>„Sehr nette Monteure und schnelle Ankunft. Die Tür war nach 20 Minuten wieder offen und das
                            ohne einen Kratzer. Danke! Mein Nr. 1 Schlüsseldienst in Schlüsseldienst {{ trim($location_name) }} &
                            Umkreis.“</p>
                        <div class="review-footer">
                            <span>Uwe Lohe</span>
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
                        <h5>Faire Preise!</h5>
                        <p>„Die Preise der Felix-Schlüsseldienst aus Schlüsseldienst {{ trim($location_name) }} sind fair, anders als bei
                            anderen Abzock-Schlüsseldiensten. Danke für die schnelle Türöffnung & frohe
                            Weihnachten!“</p>
                        <div class="review-footer">
                            <span>Markus Nieder</span>
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
            <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev" aria-label="Next Comment ">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <!-- Sağ Ok -->
            <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next" aria-label="Previous Comment">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>


    <div class="container" style="margin-top: 6rem !important;">
        <div class="row align-items-center">
            <!-- sol Kısım: Resim -->
            <div class="col-md-6 text-center">
                <img src="/themes/felix/images/guvenli-acma-7.jpg" loading="lazy" alt="{{ __('messages.location.safe_opening_image_alt') }}" class="img-fluid rounded">
            </div>
            <!-- Sağ Kısım: Yazı -->
            <div class="col-md-6">
                <h2 class="fw-bold">{{ __('messages.location.secure_safe_opening') }} - {{ trim($location_name) }}</h2>
                <p class="text-muted mt-2">
                    {{ __('messages.location.safe_importance') }}
                    {{ __('messages.location.safe_professional_help') }}
                </p>
                <p class="text-muted">
                    {{ __('messages.location.safe_services', ['location' => trim($location_name)]) }}
                    {{ __('messages.location.safe_professionalism') }}
                    {{ __('messages.location.safe_fair_price') }}
                </p>
            </div>

        </div>
    </div>

    <div class="container" style="margin-top: 6rem !important;">
        <div class="row align-items-center">
            <!-- Sol Kısım: Yazı -->
            <div class="col-md-6">
                <h2 class="fw-bold">
                    {{ __('messages.location.helper_vehicle_opening', ['location' => trim($location_name)]) }}
                </h2>
                <p class="text-muted mt-2">
                    {{ __('messages.location.lost_car_key') }}
                    {{ __('messages.location.looking_for_service', ['location' => trim($location_name)]) }}
                </p>
                <p class="text-muted">
                    {{ __('messages.location.contact_us') }}
                    {{ __('messages.location.vehicle_experts') }}
                    {{ __('messages.location.safe_damage_free') }}
                    {{ __('messages.location.call_now_professional_service') }}
                </p>
            </div>
            <!-- Sağ Kısım: Resim -->
            <div class="col-md-6 text-center">
                <img src="/themes/felix/images/uygulama-alanlari-26.jpg" loading="lazy" alt="{{ __('messages.location.vehicle_opening_image_alt') }}" class="img-fluid rounded">
            </div>
        </div>
    </div>

    

    <div class="container" style="margin-top: 6rem !important;">
        <div class="row align-items-center">
            <!-- sol Kısım: Resim -->
            <div class="col-md-6 text-center">
                <img src="/themes/felix/images/uygulama-alanlari-19.jpg" loading="lazy" alt="{{ __('messages.location.damage_free_vehicle_opening_image_alt') }}" class="img-fluid rounded">
            </div>
            <!-- Sağ Kısım: Yazı -->
            <div class="col-md-6">
                <h2 class="fw-bold">{{ __('messages.location.damage_free_vehicle_opening') }} {{ trim($location_name) }}</h2>
                <p class="text-muted mt-2">
                    {{ __('messages.location.vehicle_opening_without_damage') }} {{ trim($location_name) }}.
                    {{ __('messages.location.trust_professional_staff') }}
                </p>
                <p class="text-muted">
                    {{ __('messages.location.latest_technology_experts') }}
                    {{ __('messages.location.rescue_difficult_situations') }}
                    {{ __('messages.location.avoid_vehicle_damage') }}
                </p>
            </div>
        </div>
    </div>



    <div class="container" style="margin-top: 6rem !important;">
        <div class="row align-items-center">
            <!-- Sol Kısım: Yazı -->
            <div class="col-md-6">
                <h2 class="fw-bold">{{ __('messages.location.security_technologies_in', ['location' => trim($location_name)]) }}</h2>
                <p class="text-muted mt-2">
                    {{ __('messages.location.protection_from_burglary', ['location' => trim($location_name)]) }}
                    {{ __('messages.location.no_worries_experts', ['location' => trim($location_name)]) }}
                </p>
                <p class="text-muted">
                    {{ __('messages.location.professional_equipment_analysis') }}
                    {{ __('messages.location.improve_security_plan') }}
                    {{ __('messages.location.customer_satisfaction_priority', ['location' => trim($location_name)]) }}
                    {{ __('messages.location.contact_us_now', ['location' => trim($location_name)]) }}
                </p>
            </div>
            <!-- Sağ Kısım: Resim -->
            <div class="col-md-6 text-center">
                <img src="/themes/felix/images/acil-cilingir-3.webp" alt="{{ __('messages.location.security_technologies_image_alt') }}" loading="lazy" class="img-fluid rounded">
            </div>
        </div>
    </div>
    




    <div class="container" style="margin-top: 6rem !important;">
        <div class="row align-items-center">
            <!-- sol Kısım: Resim -->
            <div class="col-md-6 text-center">
                <img src="/themes/felix/images/cilingir-hizmeti-3.jpg" alt="{{ __('messages.location.locksmith_service_image_alt') }}" loading="lazy" class="img-fluid rounded">
            </div>
            <!-- Sağ Kısım: Yazı -->
            <div class="col-md-6">
                <h2 class="fw-bold">{{ __( 'messages.location.locksmith_at_your_side') }} {{ trim($location_name) }}</h2>
                <p class="text-muted mt-2">
                    {{ __('messages.location.no_worries_locked_out') }}
                    {{ __('messages.location.contact_us_open_door') }}
                </p>
                <p class="text-muted">
                    {{ __('messages.location.schedule_appointment') }}
                    {{ __('messages.location.available_24_7', ['location' => trim($location_name)]) }}
                    {{ __('messages.location.call_anytime') }}
                    {{ __('messages.location.open_door_without_damage') }}
                </p>
            </div>
        </div>
    </div>



    <div class="container" style="margin-top: 6rem !important;">
        <div class="row align-items-center">
            <!-- Sol Kısım: Yazı -->
            <div class="col-md-6">
                <h2 class="fw-bold">{{ __('messages.location.why_choose_felix', ['location' => trim($location_name)]) }}</h2>
                <p class="text-muted mt-2">
                    {{ __('messages.location.highest_quality_services', ['location' => trim($location_name)]) }}
                </p>
                <p class="text-muted">
                    {{ __('messages.location.transparent_and_fair') }}
                    {{ __('messages.location.schedule_and_benefit', ['location' => trim($location_name)]) }}
                </p>
            </div>
            <!-- Sağ Kısım: Resim -->
            <div class="col-md-6 text-center">
                <img src="/themes/felix/images/cilingir-hizmeti-4.jpg" alt="{{ __('messages.location.why_choose_felix_image_alt') }}" loading="lazy" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 6rem !important;">
        <div class="row align-items-center">
            <!-- sol Kısım: Resim -->
            <div class="col-md-6 text-center">
                <img src="/themes/felix/images/cilingir-hizmeti-5.jpg" alt="{{ __('messages.location.nearest_locksmith_image_alt') }}" loading="lazy" class="img-fluid rounded">
            </div>
            <!-- Sağ Kısım: Yazı -->
            <div class="col-md-6">
                <h2 class="fw-bold">{{ __('messages.location.your_nearest_locksmith') }} <br> {{ __('messages.location.felix_locksmith') }}</h2>
                <p class="text-muted mt-2">
                    {{ __('messages.location.need_help') }}
                    {{ __('messages.location.quick_service_nearby') }}
                </p>
                <p class="text-muted">
                    {{ __('messages.location.explain_process') }}
                    {{ __('messages.location.safety_priority') }}
                    {{ __('messages.location.available_in', ['location' => trim($location_name)]) }}
                    {{ __('messages.location.felix_locksmith_always') }}
                </p>
            </div>
        </div>
    </div>


    <div class="container my-5">
        <h2 class="text-center fw-bold mb-4">{{ __('messages.suppliers_title') }}</h2>
        
        <!-- Logo Grid -->
        <div class="row g-4 text-center">
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/abus.png" alt="Logo 1" loading="lazy"  class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/assaabloy.png" alt="Logo 2" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/burgwaechter.png" alt="Logo 3" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/ces.png" alt="Logo 4" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/dom.jpg" alt="Logo 5" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/econ.png" alt="Logo 6" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/evva.png" alt="Logo 7" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/glutz.png" alt="Logo 8" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/hoppe.png" alt="Logo 8" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/logo-herminghaus24.png" loading="lazy" alt="Logo 8" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/logo-kbv.png" alt="Logo 8" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/logo-messing-zawadski.png" loading="lazy" alt="Logo 8" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/logo-plusm.png" alt="Logo 8" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/logo-schweisthal.png" alt="Logo 8" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/logo-ventano.png" alt="Logo 8" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/siedle.png" alt="Logo 8" loading="lazy" class="img-fluid logo-img">
            </div>
            <div class="col-6 col-sm-4 col-md-3">
                <img src="/themes/felix/images/swiss_sector.jpg" alt="Logo 8" loading="lazy" class="img-fluid logo-img">
            </div>
        </div>
    </div>
</x-layouts.app>
