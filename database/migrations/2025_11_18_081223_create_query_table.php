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
        Schema::create('queries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('sql_statement');
            $table->text('keyword');
            $table->integer('query_category_id');
            $table->string('parameters1')->nullable();
            $table->string('parameters_type1')->nullable();
            $table->string('parameters2')->nullable();
            $table->string('parameters_type2')->nullable();
            $table->string('parameters3')->nullable();
            $table->string('parameters_type3')->nullable();
            $table->string('parameters4')->nullable();
            $table->string('parameters_type4')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->timestamp('last_executed_at')->nullable();
            $table->integer('execution_count')->default(0);
            $table->boolean('has_external_query_dependences')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queries');
    }
};
