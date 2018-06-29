<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Lexik\Bundle\JWTAuthenticationBundle\Services\JWSProvider\JWSProviderInterface' shared service.

return $this->services['Lexik\Bundle\JWTAuthenticationBundle\Services\JWSProvider\JWSProviderInterface'] = new \Lexik\Bundle\JWTAuthenticationBundle\Services\JWSProvider\DefaultJWSProvider(${($_ = isset($this->services['lexik_jwt_authentication.key_loader']) ? $this->services['lexik_jwt_authentication.key_loader'] : $this->services['lexik_jwt_authentication.key_loader'] = new \Lexik\Bundle\JWTAuthenticationBundle\Services\KeyLoader\OpenSSLKeyLoader(($this->targetDirs[3].'/app/../var/jwt/private.pem'), ($this->targetDirs[3].'/app/../var/jwt/public.pem'), 'happyapi')) && false ?: '_'}, 'openssl', 'RS256', 360);
