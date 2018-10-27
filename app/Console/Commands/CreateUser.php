<?php

namespace App\Console\Commands;

use App\Notifications\UserCreated;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create 
                            {name : The name of the user}
                            {email : The email address of the user}
                            {--r|role= : The role to assign to the user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a user with the provided name and email address e.g. php artisan user:create john john@example.com';

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
        $name = $this->argument('name');
        $email = $this->argument('email');
        $role = $this->option('role') ?? 'user';

        if ($this->userExists($email)) {
            $this->error("A user with email '{$email}' already exists.");
            return;
        }

        if (!$this->roleExists($role)) {
            $this->error("A role with name '{$role}' could not be found.");
            return;
        }

        $password = str_random();

        $user = $this->addUser($name, $email, $password, $role);
        $user->markEmailAsVerified();
        $user->notify(new UserCreated);

        $this->info("{$role} {$email} can log in using password {$password}");
    }

    /**
     * Check if a user exists with the given name or email address.
     *
     * @param $email
     * @return bool
     */
    private function userExists($email)
    {
        return User::where('email', $email)->exists();
    }

    /**
     * Check if a role exists with the given name.
     *
     * @param $role
     * @return bool
     */
    private function roleExists($role)
    {
        return Role::where('name', $role)->exists();
    }

    /**
     * Create a user with the given parameters.
     *
     * @param $name
     * @param $email
     * @param $password
     * @return User
     */
    private function addUser($name, $email, $password, $role)
    {
        /** @var User $user */
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        $user->assignRole($role);

        return $user;
    }
}
