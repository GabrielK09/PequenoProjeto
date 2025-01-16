<?php

return [

    'paths' => ['api/*', 'login', 'logout', 'web/*'], // Rotas permitidas para CORS
    
    'allowed_methods' => ['*'], // Permitir todos os métodos (GET, POST, etc.)
    
    'allowed_origins' => ['*'], // Permitir todas as origens
    // Use ['http://example.com'] para permitir apenas origens específicas
    
    'allowed_origins_patterns' => [],
    
    'allowed_headers' => ['*'], // Permitir todos os cabeçalhos
    
    'exposed_headers' => [],
    
    'max_age' => 0,
    
    'supports_credentials' => false, // Defina como true se usar cookies/sessões
    ];
    