<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('所属用户ID');
            $table->integer('category_id')->unsigned()->comment('所属分类ID');
            $table->integer('last_user_id')->unsigned()->comment('最后修改的用户ID');
            $table->integer('view_count')->unsigned()->default(0)->comment('浏览次数');

            $table->text('content')->comment('内容');
            $table->string('title')->comment('标题');
            $table->string('subtitle')->comment('子标题');
            $table->string('poster')->nullable()->comment('封面');
            $table->string('slug')->unique()->comment('slug 链接');
            $table->string('description')->nullable()->comment('概述');

            $table->boolean('is_publish')->default(false)->comment('是否发布');
            $table->boolean('is_original')->default(false)->comment('是否原创');

            $table->timestamp('published_at')->comment('发布时间');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
