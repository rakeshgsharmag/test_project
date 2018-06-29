<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'security.authentication.provider.guard.main' shared service.

return $this->services['security.authentication.provider.guard.main'] = new \Symfony\Component\Security\Guard\Provider\GuardAuthenticationProvider(new RewindableGenerator(function () {
    yield 0 => ${($_ = isset($this->services['jwt_token_authenticator']) ? $this->services['jwt_token_authenticator'] : $this->load('getJwtTokenAuthenticatorService.php')) && false ?: '_'};
}, 1), ${($_ = isset($this->services['security.user.provider.concrete.in_memory']) ? $this->services['security.user.provider.concrete.in_memory'] : $this->services['security.user.provider.concrete.in_memory'] = new \Symfony\Component\Security\Core\User\InMemoryUserProvider(array())) && false ?: '_'}, 'main', new \Symfony\Component\Security\Core\User\UserChecker());
