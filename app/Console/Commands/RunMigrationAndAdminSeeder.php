<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class RunMigrationAndAdminSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run-migration-and-admin-seeder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $this->call('migrate', ['--path' => 'database/migrations/2024_05_04_182120_create_admins_table.php']);
            $this->call('migrate', ['--path' => 'database/migrations/2024_05_04_182048_create_companies_table.php']);
            $this->call('migrate', ['--path' => 'database/migrations/2024_05_04_182102_create_employs_table.php']);

            $this->call('migrate', ['--path' => 'database/migrations/2019_12_14_000001_create_personal_access_tokens_table.php']);
            $this->call('migrate', ['--path' => 'database/migrations/2019_08_19_000000_create_failed_jobs_table.php']);
            $this->call('migrate', ['--path' => 'database/migrations/2014_10_12_100000_create_password_reset_tokens_table.php']);

            $this->info('Seeding admin data...');
            $this->call('db:seed', ['--class' => 'AdminSeeder']);
        } catch (\Throwable $th) {
            $this->error('An error occurred: ' . $th->getMessage());
        }
    }
}
