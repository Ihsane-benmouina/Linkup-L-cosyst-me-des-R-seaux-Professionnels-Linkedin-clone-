<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('original_post_id')->nullable()->constrained('posts')->onDelete('cascade');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
public function down()
{
    Schema::disableForeignKeyConstraints();

    Schema::table('posts', function (Blueprint $table) {
        $table->dropColumn('original_post_id');
    });

    Schema::enableForeignKeyConstraints();
}
};
