<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("candidate_experience", function (Blueprint $table) {
            $table->bigInteger("id")->generatedAs()->always();
            $table->date("from_date");
            $table->date("to_date");
            $table->string("employer_name", 100);
            $table->string("employer_description", 300)->nullable();
            $table->string("position_title", 100);
            $table->string("position_duty", 500);
            $table->string("note", 500)->nullable();
            $table->timestampsTZ();

            $table
                ->foreignId("candidate_id")
                ->constrained(table: "candidate", indexName: "fk_candidate_experience__candidate");
        });

        DB::statement(
            "ALTER TABLE public.candidate_experience ADD CONSTRAINT pk_candidate_experience PRIMARY KEY (id)",
        );
    }

    public function down(): void
    {
        Schema::dropIfExists("candidate_experience");
    }
};
