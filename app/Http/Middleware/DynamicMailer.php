<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class DynamicMailer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $conf = [
            'driver'        => setting('mailer_driver', config('mail.driver')),
            'host'          => setting('mailer_host', config('mail.host')),
            'port'          => setting('mailer_port', config('mail.port')),
            'from'          => [
                'address'   => setting('mailer_from_address', config('mail.from.address')),
                'name'      => setting('mailer_from_name', config('mail.from.name'))
            ],
            'encryption'    => setting('mailer_encryption', config('mail.encryption')),
            'username'      => setting('mailer_username', config('mail.username')),
            'password'      => setting('mailer_password', config('mail.password')),
            'sendmail'      => setting('mailer_sendmail', config('mail.sendmail'))
        ];

        Config::set('mail', $conf);
        $app = App::getInstance();
        $app->register('Illuminate\Mail\MailServiceProvider');

        return $next($request);
    }
}
