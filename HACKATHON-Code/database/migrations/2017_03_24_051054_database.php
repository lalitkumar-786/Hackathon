<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Database extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
 	if (!Schema::hasTable('login')){
            Schema::create('login', function (Blueprint $table) {
                $table->string('username');
                $table->string('password');
                $table->string('name');
                $table->rememberToken();
                $table->timestamps();
                $table->primary('username');
            });
        }
         if (!Schema::hasTable('discussion_thread')){
            Schema::create('discussion_thread', function (Blueprint $table) {
                $table->increments('id');
                $table->string('username');
                $table->string('topic');
                $table->string('name_topic');
                $table->string('topic_description');
                $table->string('tags');
                $table->timestamps();
                $table->foreign('username')->references('username')->on('login');
            });
        }
         if (!Schema::hasTable('discussion_replies')){
            Schema::create('discussion_replies', function (Blueprint $table) {
                $table->integer('id')->unsigned();
                $table->string('username');
                $table->string('message');
                $table->timestamp('timestamp');
                $table->timestamps();
                $table->primary(['id','username','timestamp']);
	        $table->foreign('id')->references('id')->on('discussion_thread');
                $table->foreign('username')->references('username')->on('login');
            });
        }
       if (!Schema::hasTable('shared_documents')){
            Schema::create('shared_documents', function (Blueprint $table) {
                $table->increments('id');
                $table->string('username');
                $table->string('file_url');
                $table->string('description');
                $table->string('course_code');
                $table->string('type');
                $table->timestamps();
                $table->foreign('username')->references('username')->on('login');
            });
        }
        if (!Schema::hasTable('projects')){
            Schema::create('projects', function (Blueprint $table) {
                $table->increments('id');
                $table->string('owner');
                $table->string('title');
                $table->string('description');
                $table->string('requirements');
                $table->timestamps();
                $table->foreign('owner')->references('username')->on('login');
            });
        }
	if (!Schema::hasTable('projects_accept')){
            Schema::create('projects_accept', function (Blueprint $table) {
                $table->integer('id')->unsigned();
                $table->string('username');
                $table->timestamps();
                $table->primary(['id','username']);
                $table->foreign('id')->references('id')->on('projects');
                $table->foreign('username')->references('username')->on('login');
            });
        }
        if (!Schema::hasTable('code_bytes')){
            Schema::create('code_bytes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('username');
                $table->string('title');
                $table->string('file_url');
                $table->boolean('sharing_status');
                $table->timestamps();
                $table->foreign('username')->references('username')->on('login');
            });
        }
        if (!Schema::hasTable('upload_public')){
            Schema::create('upload_public', function (Blueprint $table) {
                $table->string('username');
                $table->string('filename');
                $table->primary(['username','filename']);
                $table->foreign('username')->references('username')->on('login');
            });
        }
	 if (!Schema::hasTable('upload_private')){
            Schema::create('upload_private', function (Blueprint $table) {
                $table->string('username');
                $table->string('filename');
                $table->primary(['username','filename']);
                $table->foreign('username')->references('username')->on('login');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
