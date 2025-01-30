@extends('layout.home_layout')

@section('content')
<div class="shipping-rates-section py-5">
    <div class="container">
        <!-- Header -->
        <div class="text-center mb-5">
            <h1 class="fw-bold mb-3">Shipping Rates Calculator</h1>
            <p class="text-muted">Calculate shipping costs for your packages quickly and easily</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded-4 p-4 p-md-5">
                    <!-- Calculator Form -->
                    <form id="shipping-calculator">
                        <!-- Origin and Destination -->
                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <h5 class="fw-bold mb-3">Origin</h5>
                                <div class="mb-3">
                                    <label class="form-label">Country</label>
                                    <select class="form-select">
                                        <option selected>Select country</option>
                                        <option value="US">United States</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="AU">Australia</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" placeholder="Enter postal code">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h5 class="fw-bold mb-3">Destination</h5>
                                <div class="mb-3">
                                    <label class="form-label">Country</label>
                                    <select class="form-select">
                                        <option selected>Select country</option>
                                        <option value="US">United States</option>
                                        <option value="UK">United Kingdom</option>
                                        <option value="AU">Australia</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" class="form-control" placeholder="Enter postal code">
                                </div>
                            </div>
                        </div>

                        <!-- Package Details -->
                        <h5 class="fw-bold mb-3">Package Details</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label">Weight (kg)</label>
                                <input type="number" class="form-control" placeholder="Enter weight">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Package Type</label>
                                <select class="form-select">
                                    <option selected>Select package type</option>
                                    <option value="box">Box</option>
                                    <option value="envelope">Envelope</option>
                                    <option value="pallet">Pallet</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Length (cm)</label>
                                <input type="number" class="form-control" placeholder="Length">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Width (cm)</label>
                                <input type="number" class="form-control" placeholder="Width">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Height (cm)</label>
                                <input type="number" class="form-control" placeholder="Height">
                            </div>
                        </div>

                        <!-- Shipping Options -->
                        <h5 class="fw-bold mb-3">Shipping Options</h5>
                        <div class="mb-4">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="shipping_speed" id="express" checked>
                                <label class="form-check-label" for="express">
                                    Express Delivery (1-2 business days)
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="shipping_speed" id="standard">
                                <label class="form-check-label" for="standard">
                                    Standard Delivery (3-5 business days)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shipping_speed" id="economy">
                                <label class="form-check-label" for="economy">
                                    Economy (5-7 business days)
                                </label>
                            </div>
                        </div>

                        <!-- Additional Services -->
                        <h5 class="fw-bold mb-3">Additional Services</h5>
                        <div class="mb-4">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="insurance">
                                <label class="form-check-label" for="insurance">
                                    Shipping Insurance
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="signature">
                                <label class="form-check-label" for="signature">
                                    Signature Required
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tracking">
                                <label class="form-check-label" for="tracking">
                                    Priority Tracking
                                </label>
                            </div>
                        </div>

                        <!-- Calculate Button -->
                        <button type="submit" class="btn btn-danger btn-lg w-100">
                            <i class="fas fa-calculator me-2"></i>Calculate Shipping Rate
                        </button>
                    </form>

                    <!-- Results Section (Initially Hidden) -->
                    <div id="shipping-results" class="mt-4 pt-4 border-top d-none">
                        <h5 class="fw-bold mb-3">Shipping Quote</h5>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Base Rate</td>
                                        <td class="text-end">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td>Additional Services</td>
                                        <td class="text-end">$0.00</td>
                                    </tr>
                                    <tr>
                                        <td>Fuel Surcharge</td>
                                        <td class="text-end">$0.00</td>
                                    </tr>
                                    <tr class="table-active fw-bold">
                                        <td>Total Cost</td>
                                        <td class="text-end">$0.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --bs-danger: #E31837;
    }

    .shipping-rates-section {
        background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #E31837;
        box-shadow: 0 0 0 0.25rem rgba(227, 24, 55, 0.25);
    }

    .form-check-input:checked {
        background-color: #E31837;
        border-color: #E31837;
    }

    .card {
        overflow: hidden;
    }

    @media (max-width: 768px) {
        .shipping-rates-section {
            padding-top: 2rem;
            padding-bottom: 2rem;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calculatorForm = document.getElementById('shipping-calculator');
    const resultsSection = document.getElementById('shipping-results');

    calculatorForm.addEventListener('submit', function(e) {
        e.preventDefault();

        // Get form values
        const weight = parseFloat(document.querySelector('input[type="number"]').value) || 0;
        const shippingSpeed = document.querySelector('input[name="shipping_speed"]:checked').id;
        const insurance = document.getElementById('insurance').checked;
        const signature = document.getElementById('signature').checked;
        const tracking = document.getElementById('tracking').checked;

        // Base rate calculation
        let baseRate = weight * 10; // $10 per kg

        // Shipping speed multipliers
        const speedMultipliers = {
            'express': 2,
            'standard': 1,
            'economy': 0.8
        };
        baseRate *= speedMultipliers[shippingSpeed];

        // Additional services
        let additionalServices = 0;
        if (insurance) additionalServices += 15;    // $15 for insurance
        if (signature) additionalServices += 5;     // $5 for signature
        if (tracking) additionalServices += 3;      // $3 for priority tracking

        // Fuel surcharge (10% of base rate)
        const fuelSurcharge = baseRate * 0.1;

        // Total calculation
        const totalCost = baseRate + additionalServices + fuelSurcharge;

        // Update results in the table
        document.querySelector('tr:nth-child(1) td:nth-child(2)').textContent =
            `$${baseRate.toFixed(2)}`;
        document.querySelector('tr:nth-child(2) td:nth-child(2)').textContent =
            `$${additionalServices.toFixed(2)}`;
        document.querySelector('tr:nth-child(3) td:nth-child(2)').textContent =
            `$${fuelSurcharge.toFixed(2)}`;
        document.querySelector('tr:nth-child(4) td:nth-child(2)').textContent =
            `$${totalCost.toFixed(2)}`;

        // Show results section
        resultsSection.classList.remove('d-none');

        // Smooth scroll to results
        resultsSection.scrollIntoView({ behavior: 'smooth' });
    });
});
</script>
@endsection
