<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    DB::table('admins')->delete();
	    $adminRecords = [
		    [
			    'id' => 1,
			    'name' => 'admin',
			    'type' => 'admin',
			    'mobile' => '1234567890',
			    'email' => 'admin@admin.com',
			    'password' => '$2y$10$v1byTu4hhj2KfCUmp8/41uEEon8f9.7gPHXTkchDwc.yrUkVXsehC',
			    'image' => '',
			    'status' => 1,
		    ],
	    ];

	    DB::table('admins')->insert($adminRecords);

	    #foreach ($adminRecords as $key => $record) {
	    #	\App\Admin::create($record);
	    #}
    }
}
