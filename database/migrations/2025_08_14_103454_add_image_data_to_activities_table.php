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
        Schema::table('activities', function (Blueprint $table) {
            // Add columns for storing image data directly in the database
            $table->longText('image_data')->nullable()->after('bio'); // Store base64 encoded image
            $table->string('image_mime_type')->nullable()->after('image_data'); // Store MIME type (image/jpeg, image/png, etc.)
            $table->string('image_original_name')->nullable()->after('image_mime_type'); // Store original filename
            
            // Make image_path nullable since we're now storing images in database
            $table->string('image_path')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropColumn(['image_data', 'image_mime_type', 'image_original_name']);
            // Revert image_path back to NOT NULL if rolling back
            $table->string('image_path')->nullable(false)->change();
        });
    }
};
