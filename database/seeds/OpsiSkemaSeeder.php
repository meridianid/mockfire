<?php

use Illuminate\Database\Seeder;

class OpsiSkemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skemaopsi')->insert([
            'option_grup' => 'SYSTEM',
            'name_opsi' => 'fileName',
            'value_opsi' => 'File Name',
        ]);

        DB::table('skemaopsi')->insert([
            'option_grup' => 'SYSTEM',
            'name_opsi' => 'commonFileName',
            'value_opsi' => 'Common File Name',
        ]);

        DB::table('skemaopsi')->insert([
            'option_grup' => 'SYSTEM',
            'name_opsi' => 'commonFileExt',
            'value_opsi' => 'Common File Extension',
        ]);

        DB::table('skemaopsi')->insert([
            'option_grup' => 'SYSTEM',
            'name_opsi' => 'fileType',
            'value_opsi' => 'fileType',
        ]);

        DB::table('skemaopsi')->insert([
            'option_grup' => 'SYSTEM',
            'name_opsi' => 'fileExt',
            'value_opsi' => 'File Extension',
        ]);

        DB::table('skemaopsi')->insert([
            'option_grup' => 'SYSTEM',
            'name_opsi' => 'semver',
            'value_opsi' => 'Semver',
        ]);

        DB::table('skemaopsi')->insert([
            'option_grup' => 'OBJECT',
            'name_opsi' => 'object',
            'value_opsi' => 'Object',
        ]);

        DB::table('skemaopsi')->insert([
            'option_grup' => 'ARRAY',
            'name_opsi' => 'array',
            'value_opsi' => 'Array',
        ]);

    }
}
