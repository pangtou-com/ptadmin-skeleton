<?php

declare(strict_types=1);

namespace Tests\Feature;

use PTAdmin\Admin\Providers\PTAdminServiceProvider;
use Tests\TestCase;

class PTAdminPackageInstalledTest extends TestCase
{
    public function test_ptadmin_admin_package_is_available(): void
    {
        self::assertTrue(class_exists(PTAdminServiceProvider::class));
        self::assertSame(config('app.prefix', 'system'), config('ptadmin-auth.route_prefix'));
    }
}
