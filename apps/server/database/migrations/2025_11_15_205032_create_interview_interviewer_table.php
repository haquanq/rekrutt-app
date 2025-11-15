<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create("interview_interviewer", function (Blueprint $table) {
            $table->bigInteger("id")->generatedAs()->always();
            $table->string("note", 300)->nullable();
            $table->timestampsTZ();

            $table
                ->foreignId("interview_id")
                ->constrained(table: "interview", indexName: "fk_interview_interviewer__interview");

            $table->foreignId("user_id")->constrained(table: "user", indexName: "fk_interview_interviewer__user");

            $table->unique(columns: ["interview_id", "user_id"], name: "uq_interview_interviewer");
        });

        DB::statement(
            "ALTER TABLE public.interview_interviewer ADD CONSTRAINT pk_interview_interviewer PRIMARY KEY (id)",
        );
    }

    public function down(): void
    {
        Schema::dropIfExists("interview_interviewer");
    }
};
