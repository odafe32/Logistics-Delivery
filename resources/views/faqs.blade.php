@extends('layout.home_layout')
@section('content')
    <!-- FAQ Header Section -->
    <div class="mt " style="margin-top: 100px">
        <div class="tw-pt-32 tw-pb-20 bg-white position-relative z-1 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h1 class="tw-mb-4 heading-1 text-main-two-600">Frequently Asked Questions</h1>
                        <p class="lead text-neutral-600">Find answers to commonly asked questions about our shipping and
                            logistics services</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQ Content Section -->
        <div class="tw-py-20">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <!-- Shipping & Delivery -->
                        <div class="mb-5">
                            <h3 class="tw-mb-4 text-main-two-600">Shipping & Delivery</h3>
                            <div class="accordion" id="shippingAccordion">
                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-neutral-50" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#shipping1">
                                            How can I track my shipment?
                                        </button>
                                    </h2>
                                    <div id="shipping1" class="accordion-collapse collapse show"
                                        data-bs-parent="#shippingAccordion">
                                        <div class="accordion-body">
                                            You can track your shipment by entering your tracking number on our website's
                                            tracking page. Alternatively, you can use our mobile app or contact our customer
                                            service team for assistance.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-neutral-50" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#shipping2">
                                            What are your delivery timeframes?
                                        </button>
                                    </h2>
                                    <div id="shipping2" class="accordion-collapse collapse"
                                        data-bs-parent="#shippingAccordion">
                                        <div class="accordion-body">
                                            Our delivery timeframes vary depending on the service selected and destination.
                                            Express delivery typically takes 1-3 business days, while standard shipping may
                                            take
                                            3-7 business days for domestic deliveries.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing & Payments -->
                        <div class="mb-5">
                            <h3 class="tw-mb-4 text-main-two-600">Pricing & Payments</h3>
                            <div class="accordion" id="pricingAccordion">
                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-neutral-50" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#pricing1">
                                            How are shipping rates calculated?
                                        </button>
                                    </h2>
                                    <div id="pricing1" class="accordion-collapse collapse"
                                        data-bs-parent="#pricingAccordion">
                                        <div class="accordion-body">
                                            Shipping rates are calculated based on package weight, dimensions, destination,
                                            and
                                            service level selected. Additional factors may include fuel surcharges and
                                            special
                                            handling requirements.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-neutral-50" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#pricing2">
                                            What payment methods do you accept?
                                        </button>
                                    </h2>
                                    <div id="pricing2" class="accordion-collapse collapse"
                                        data-bs-parent="#pricingAccordion">
                                        <div class="accordion-body">
                                            We accept major credit cards, bank transfers, and corporate accounts. For
                                            business
                                            customers, we also offer flexible billing solutions and credit terms subject to
                                            approval.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- International Shipping -->
                        <div class="mb-5">
                            <h3 class="tw-mb-4 text-main-two-600">International Shipping</h3>
                            <div class="accordion" id="internationalAccordion">
                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-neutral-50" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#international1">
                                            What documents are required for international shipping?
                                        </button>
                                    </h2>
                                    <div id="international1" class="accordion-collapse collapse"
                                        data-bs-parent="#internationalAccordion">
                                        <div class="accordion-body">
                                            Required documents typically include commercial invoices, packing lists, and
                                            customs
                                            declarations. Some destinations may require additional documentation such as
                                            certificates of origin or specific permits.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-neutral-50" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#international2">
                                            How are customs duties and taxes handled?
                                        </button>
                                    </h2>
                                    <div id="international2" class="accordion-collapse collapse"
                                        data-bs-parent="#internationalAccordion">
                                        <div class="accordion-body">
                                            Customs duties and taxes are typically paid by the recipient unless otherwise
                                            arranged. We can provide estimated costs and offer duty-paid shipping services
                                            for
                                            select destinations.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Account & Services -->
                        <div class="mb-5">
                            <h3 class="tw-mb-4 text-main-two-600">Account & Services</h3>
                            <div class="accordion" id="accountAccordion">
                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-neutral-50" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#account1">
                                            How do I open a Personal account?
                                        </button>
                                    </h2>
                                    <div id="account1" class="accordion-collapse collapse"
                                        data-bs-parent="#accountAccordion">
                                        <div class="accordion-body">
                                            You can apply for a Personal account through our website or by contacting our
                                            sales
                                            team. We'll need basic company information and shipping volume estimates to
                                            process
                                            your application.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-neutral-50" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#account2">
                                            What special services do you offer?
                                        </button>
                                    </h2>
                                    <div id="account2" class="accordion-collapse collapse"
                                        data-bs-parent="#accountAccordion">
                                        <div class="accordion-body">
                                            We offer services including express delivery, freight forwarding, warehouse
                                            solutions, dangerous goods handling, and specialized industry solutions for
                                            healthcare, retail, and e-commerce sectors.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Section -->
        <div class="tw-py-16 bg-neutral-50">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <h3 class="tw-mb-4">Still have questions?</h3>
                        <p class="mb-4">Our customer service team is here to help</p>
                        <a href="{{ url('/contact') }}" class="btn btn-main hover-style-two">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
