@extends('layout.home_layout')
@section('content')
    <!-- Breadcrumb Start Here -->
    <section class="breadcrumb py-140 tw-pt-206-px mb-0 bg-img"
        data-background-image="assets/images/thumbs/breadcrumb-bg.png">
        <div class="container">
            <div class="text-center">
                <span
                    class="splitTextStyleTwo text-main-600 border-bottom border-main-600 fst-italic fw-bold tw-text-lg cursor-small">
                    Fuel Surcharge Delivery Solutions
                </span>
                <h1 class="splitTextStyleOne text-white tw-mt-1 cursor-big"> Fuel Surcharge Services</h1>
            </div>
        </div>
    </section>

    <!-- Service Details Start -->
    <section class="service-details py-140">
        <div class="container">
            <div class="row gy-4">
                @include('components.reue')
                <div class="col-xl-8">
                    <div class="">
                        <img src="assets/images/thumbs/service-details-img.png" alt="  Fuel Surcharge Services">
                        <div class="tw-mt-8 d-flex flex-column tw-gap-12">
                            <div class="">
                                <h4 class="tw-mb-3 cursor-big splitTextStyleOne"> Fuel Surcharge Delivery Solutions</h4>
                                <p class="text-neutral-1000 cursor-small">Our Fuel Surcharge delivery services provide fast,
                                    reliable, and time-definite delivery solutions for urgent shipments. We offer
                                    door-to-door
                                    service with guaranteed delivery times, perfect for time-sensitive documents and
                                    packages.
                                    Our Fuel Surcharge network ensures quick and secure delivery across domestic and
                                    international
                                    routes.</p>
                            </div>
                            <div class="">
                                <h5 class="tw-mb-3 cursor-big splitTextStyleOne">Time-Critical Solutions</h5>
                                <p class="text-neutral-1000 cursor-small">We specialize in time-critical deliveries with
                                    options for same-day, next-day, and scheduled delivery services. Our Fuel Surcharge
                                    solutions
                                    include priority handling, real-time tracking, and signature confirmation. Whether it's
                                    important documents or urgent packages, we ensure rapid and secure delivery.</p>
                            </div>
                            <div class="d-flex tw-gap-9">
                                <div class="position-relative max-w-390-px w-100">
                                    <img src="assets/images/thumbs/service-details-video-img.jpg"
                                        alt="  Fuel Surcharge Services">
                                    <a href="https://www.youtube.com/watch?v=MFLVmAE4cqg"
                                        class="play-button bg-light-animation cursor-big tw-w-75-px tw-h-75-px d-inline-flex justify-content-center align-items-center bg-white text-main-600 hover-text-main-two-700 rounded-circle tw-text-xl position-absolute tw-start-50 tw--translate-middle top-50">
                                        <i class="ph-fill ph-play"></i>
                                    </a>
                                </div>
                                <div class="">
                                    <h4 class="tw-mb-3 cursor-big splitTextStyleOne">Why Choose Our Fuel Surcharge Services?
                                    </h4>
                                    <p class="text-neutral-1000 cursor-small">Experience unmatched speed and reliability
                                        with our Fuel Surcharge delivery solutions.</p>
                                    <ul class="cursor-small d-flex flex-column tw-gap-4 tw-mt-6">
                                        <li class="d-flex align-items-center tw-gap-4" data-aos="fade-up"
                                            data-aos-duration="1000" data-aos-delay="200">
                                            <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                            <span class="text-neutral-1000 fw-medium">Guaranteed delivery times</span>
                                        </li>
                                        <li class="d-flex align-items-center tw-gap-4" data-aos="fade-up"
                                            data-aos-duration="1000" data-aos-delay="400">
                                            <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                            <span class="text-neutral-1000 fw-medium">Priority handling and routing</span>
                                        </li>
                                        <li class="d-flex align-items-center tw-gap-4" data-aos="fade-up"
                                            data-aos-duration="1000" data-aos-delay="400">
                                            <span class="text-main-600 d-flex"><i class="ph-bold ph-check"></i></span>
                                            <span class="text-neutral-1000 fw-medium">Real-time tracking and
                                                notifications</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <p class="text-neutral-1000 cursor-small">Our Fuel Surcharge delivery network is designed for
                                speed and efficiency. We offer flexible pickup options, late cutoff times, and early
                                delivery services. Our dedicated Fuel Surcharge team ensures your time-sensitive shipments
                                receive priority treatment throughout the delivery process.</p>

                            <p
                                class="bg-white border-start border-4 border-main-600 common-shadow-five tw-text-lg fw-medium text-main-two-600 tw-py-405 tw-px-6 cursor-small">
                                When time is critical, trust our Fuel Surcharge services to deliver your packages quickly
                                and
                                securely,
                                maintaining the highest standards of reliability and care.
                            </p>

                            <div class="">
                                <h5 class="tw-mb-8 cursor-big">Our Fuel Surcharge Services Include:</h5>
                                <!-- Rest of the image section remains the same -->
                            </div>




                            <div class="accordion common-accordion" id="freightAccordion">
                                <!-- Shipping Times & Rates -->
                                <div class="accordion-item tw-p-205 tw-rounded-lg bg-white border border-neutral-200"
                                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button cursor-big tw-py-4 tw-px-24-px tw-rounded-lg fw-bold tw-text-base"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                            aria-expanded="true" aria-controls="collapseOne">
                                            What are your typical shipping times and rates for international
                                            freight?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#freightAccordion">
                                        <div class="accordion-body max-w-400-px">
                                            <p class="text-neutral-1000 cursor-small">Shipping times and rates vary
                                                by destination and service level. Air freight typically takes 1-3
                                                days, ocean freight 15-60 days, and ground shipping 3-14 days. Rates
                                                are calculated based on weight, dimensions, destination, and service
                                                type. Contact us for a detailed quote.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Documentation -->
                                <div class="accordion-item tw-p-205 tw-rounded-lg bg-white border border-neutral-200"
                                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button cursor-big tw-py-4 tw-px-24-px tw-rounded-lg fw-bold tw-text-base collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            What documentation is required for international freight shipments?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#freightAccordion">
                                        <div class="accordion-body max-w-400-px">
                                            <p class="text-neutral-1000 cursor-small">Required documents typically
                                                include commercial invoice, packing list, bill of lading or airway
                                                bill, certificate of origin, and customs declaration forms.
                                                Additional documentation may be required depending on the type of
                                                goods and destination country.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Cargo Types -->
                                <div class="accordion-item tw-p-205 tw-rounded-lg bg-white border border-neutral-200"
                                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button cursor-big tw-py-4 tw-px-24-px tw-rounded-lg fw-bold tw-text-base collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                                            aria-expanded="false" aria-controls="collapseThree">
                                            What types of cargo do you handle?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse"
                                        data-bs-parent="#freightAccordion">
                                        <div class="accordion-body max-w-400-px">
                                            <p class="text-neutral-1000 cursor-small">We handle a wide range of
                                                cargo including general merchandise, perishable goods, hazardous
                                                materials, oversized equipment, and specialized cargo. Our services
                                                include temperature-controlled shipping, special handling
                                                requirements, and custom packaging solutions.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tracking -->
                                <div class="accordion-item tw-p-205 tw-rounded-lg bg-white border border-neutral-200"
                                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button cursor-big tw-py-4 tw-px-24-px tw-rounded-lg fw-bold tw-text-base collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour"
                                            aria-expanded="false" aria-controls="collapseFour">
                                            How can I track my freight shipment?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse"
                                        data-bs-parent="#freightAccordion">
                                        <div class="accordion-body max-w-400-px">
                                            <p class="text-neutral-1000 cursor-small">You can track your shipment
                                                through our online tracking system using your tracking number. We
                                                provide real-time updates on shipment status, location, and
                                                estimated delivery time. Our customer service team is also available
                                                24/7 for detailed tracking information.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Insurance -->
                                <div class="accordion-item tw-p-205 tw-rounded-lg bg-white border border-neutral-200"
                                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button cursor-big tw-py-4 tw-px-24-px tw-rounded-lg fw-bold tw-text-base collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive"
                                            aria-expanded="false" aria-controls="collapseFive">
                                            Is cargo insurance available for freight shipments?
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse"
                                        data-bs-parent="#freightAccordion">
                                        <div class="accordion-body max-w-400-px">
                                            <p class="text-neutral-1000 cursor-small">Yes, we offer comprehensive
                                                cargo insurance options to protect your shipments. Coverage includes
                                                protection against loss, damage, and other risks during transit. We
                                                can help you select the appropriate coverage based on your cargo
                                                value and requirements.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Customs -->
                                <div class="accordion-item tw-p-205 tw-rounded-lg bg-white border border-neutral-200"
                                    data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                    <h2 class="accordion-header">
                                        <button
                                            class="accordion-button cursor-big tw-py-4 tw-px-24-px tw-rounded-lg fw-bold tw-text-base collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix"
                                            aria-expanded="false" aria-controls="collapseSix">
                                            How do you handle customs clearance?
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse"
                                        data-bs-parent="#freightAccordion">
                                        <div class="accordion-body max-w-400-px">
                                            <p class="text-neutral-1000 cursor-small">Our customs clearance service
                                                includes documentation preparation, duty and tax calculation,
                                                customs broker coordination, and compliance management. We ensure
                                                smooth customs clearance by staying updated with international trade
                                                regulations and requirements.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================== Services Details end ========================== -->
@endsection
