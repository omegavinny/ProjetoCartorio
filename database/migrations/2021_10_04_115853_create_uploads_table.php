<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploaded_user_id');
            $table->string('file_name');
            $table->string('file_path')->default('storage/files/xml');
            $table->integer('registers');
            $table->string('generated_at');
            $table->string('creator');
            $table->boolean('processed')->default(false);
            $table->timestamp('processed_at')->nullable();
            $table->unsignedBigInteger('processed_user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploads');
    }
}
