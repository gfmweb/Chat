<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' Начальная настройка';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Начальная настройка проекта');
        $this->call('migrate');
        $this->call('DB:seed');
        $user = User::latest()->pluck('email');
        $this->info('Для авторизации воспользуйтесь следующими учетными данными:');
        $this->info('email: ' . $user[0]);
        $this->info('Пароль: password');
        return 1;
    }
}
