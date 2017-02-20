<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminAuth extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',32)->default('')->index();
            $table->string('password',100)->default('');
            $table->timestamps();
        });

        Schema::create('admin_auth_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',32)->default('')->index();
            $table->string('display_name',64)->default('');
            $table->string('url',128)->default('');
            $table->string('icon',32)->default('');
            $table->integer('pid')->default(0);
            $table->tinyInteger('type')->default(1);
            $table->tinyInteger('is_show')->default(1);
            $table->tinyInteger('is_blank')->default(0);
            $table->integer('rank')->default(1);
            $table->timestamps();
        });

        Schema::create('admin_auth_roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',32)->default('')->index();
            $table->string('display_name',64)->default('');
            $table->string('description')->default('');
            $table->timestamps();
        });


        Schema::create('admin_auth_assigned_role', function (Blueprint $table) {

            $table->integer('admin_id')->default(0);
            $table->integer('role_id')->default(0);

            $table->primary(['admin_id','role_id']);
        });

        Schema::create('admin_auth_permission_role', function (Blueprint $table) {

            $table->integer('role_id')->default(0);
            $table->integer('permission_id')->default(0);

            $table->primary(['role_id','permission_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admins');

        Schema::drop('admin_auth_permissions');

        Schema::drop('admin_auth_roles');

        Schema::drop('admin_auth_assigned_role');

        Schema::drop('admin_auth_permission_role');
    }
}
