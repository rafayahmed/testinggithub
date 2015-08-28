<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBlogCommentIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blog_comment', function (Blueprint $table) {
            //
            $table->foreign('user_id')
                 ->references('id')
                 ->on('user')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');
            $table->foreign('blog_id')
                 ->references('id')
                 ->on('blog')
                 ->onDelete('cascade')
                 ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blog_comment', function (Blueprint $table) {
            //
            $table->dropForeign('blog_comment_user_id_foreign');
            $table->dropForeign('blog_comment_blog_id_foreign');
        });
    }
}
