<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Student;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admim

        $admin = factory(User::class)->create([
            'name'  => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ]);

        $admin->assignRole('admin');

        $this->command->info('Details akun admin ');
        $this->command->warn($admin->email);
        $this->command->info('Password is "123456"' );  

         // bendahara

         $bendahara = factory(User::class)->create([
            'name'  => 'Bendahara',
            'email' => 'bendahara@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ]);

        $bendahara->assignRole('bendahara');

        $this->command->info('Details akun Bendahara ');
        $this->command->warn($bendahara->email);
        $this->command->info('Password is "123456"' );  

         // Siswa

         $siswa = factory(User::class)->create([
            'name'  => 'Siswa',
            'email' => 'siswa@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'),
        ]);
        
        if ($siswa->save()) {
            $anggota = Student::create([
                'user_id' => $siswa->id,
            ]);
        }

        $siswa->assignRole('student');

        $this->command->info('Details akun Siswa ');
        $this->command->warn($siswa->email);
        $this->command->info('Password is "123456"' );  

        //bersihkan cache
        $this->command->call('cache:clear');
    }
}
