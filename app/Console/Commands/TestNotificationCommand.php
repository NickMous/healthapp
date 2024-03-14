<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Isolatable;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use function Laravel\Prompts\info;
use function Laravel\Prompts\progress;

class TestNotificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:testnotif';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test notification';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::first();
        $user->notify(new \App\Notifications\Test('This is a test notification.'));
    }
}
