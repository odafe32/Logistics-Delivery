<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_number')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            // Sender Info
            $table->string('sender_name');
            $table->string('sender_phone');
            $table->string('sender_email');
            $table->text('sender_address');
            // Recipient Info
            $table->string('recipient_name');
            $table->string('recipient_phone');
            $table->string('recipient_email');
            $table->text('recipient_address');
            // Shipping Service
            $table->enum('service_type', ['express', 'standard', 'economy']);
            $table->decimal('total_price', 10, 2);
            // Status
            $table->enum('current_status', [
                'pending',
                'picked_up',
                'processing',
                'in_transit',
                'out_for_delivery',
                'delivered'
            ])->default('pending');
            $table->boolean('is_draft')->default(false);
            $table->timestamps();
        });

        Schema::create('shipment_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id')->constrained()->onDelete('cascade');
            $table->decimal('weight', 8, 2); // in kg
            $table->decimal('length', 8, 2); // in cm
            $table->decimal('width', 8, 2);  // in cm
            $table->decimal('height', 8, 2); // in cm
            $table->text('contents');
            $table->timestamps();
        });

        Schema::create('shipment_statuses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipment_id')->constrained()->onDelete('cascade');
            $table->enum('status', [
                'pending',
                'picked_up',
                'processing',
                'in_transit',
                'out_for_delivery',
                'delivered'
            ]);
            $table->text('notes')->nullable();
            $table->string('location')->nullable();
            $table->timestamp('status_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_statuses');
        Schema::dropIfExists('shipment_packages');
        Schema::dropIfExists('shipments');
    }
};
