<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\TokenExtractorInterface' shared service.

return $this->services['Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\TokenExtractorInterface'] = new \Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\ChainTokenExtractor(array(0 => ${($_ = isset($this->services['lexik_jwt_authentication.extractor.authorization_header_extractor']) ? $this->services['lexik_jwt_authentication.extractor.authorization_header_extractor'] : $this->services['lexik_jwt_authentication.extractor.authorization_header_extractor'] = new \Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor('Bearer', 'Authorization')) && false ?: '_'}));
