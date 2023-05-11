<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Spatie\Permission\Models\Role as Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $role1 = Role::create(['name'=>"admin"]);
        $role2 = Role::create(['name'=>"writer"]);
        $role3 = Role::create(['name'=>"student"]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
