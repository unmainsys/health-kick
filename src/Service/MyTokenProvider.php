<?php

namespace Unmainsys\HealthKick\Service;

use Firebase\JWT\JWT;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mercure\Authorization;
use Symfony\Component\Mercure\Jwt\TokenProviderInterface;

final readonly class MyTokenProvider implements TokenProviderInterface
{
    public function __construct(
        #[Autowire('%env(MERCURE_JWT_SECRET)%')]
        private string $mercureJwtSecret
    ) {
    }

    public function getJwt(): string
    {
        $payload = [
            'mercure' => [
                'publish' => ['*'],
            ],
        ];

        return JWT::encode($payload, $this->mercureJwtSecret, 'HS256');
    }

    public function generateJwt(Request $request, Authorization $authorization): string
    {
        return $authorization->createCookie($request, ['*'])->getValue();
    }
}