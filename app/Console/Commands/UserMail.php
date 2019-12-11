<?php

namespace App\Console\Commands;

use App\User;
use App\Mail\UserWelcome;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class UserMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:mail {id : Representa al id del usuario}
    { --flag= : Condicional }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio email a un usuario';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $user = User::find($this->argument('id'));
        if ($user) {
            $option = $this->option('flag');
            echo $option. '\n';
            Mail::to($user->email)->send(new UserWelcome($user));
            echo 'Email enviado';
        } else {
            echo 'El usuario non existe';
        }
    }
}
