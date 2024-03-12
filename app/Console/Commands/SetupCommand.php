<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function Laravel\Prompts\info;
use function Laravel\Prompts\progress;

class SetupCommand extends Command implements Isolatable
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize the application if needed.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        info('Setting up the application...');
        $artisanProgress = progress('Performing artisan commands...', 5);
        $artisanProgress->start();
        $this->callSilent('migrate');
        $artisanProgress->advance();
        $this->callSilent('config:clear');
        $artisanProgress->advance();
        $this->callSilent('route:clear');
        $artisanProgress->advance();
        $this->callSilent('view:clear');
        $artisanProgress->advance();
        $this->callSilent('cache:clear');
        $artisanProgress->advance();
        $artisanProgress->finish();
        $addRolesProgress = progress('Adding roles...', 2);
        $addRolesProgress->start();
        $superAdmin = Role::create(['name' => 'super admin']);
        $addRolesProgress->advance();
        $admin = Role::create(['name' => 'admin']);
        $addRolesProgress->advance();
        $addRolesProgress->finish();
    }
}
