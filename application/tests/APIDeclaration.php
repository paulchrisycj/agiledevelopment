<?php

use PHPUnit\Framework\TestCase;

class APIDeclaration extends TestCase
{
    public $APIurl = 'http://localhost/agiledevelopment/includes/server/index.php?action=';
    public $action = '';
    public function testAPIConnection(){
        $this->action = 'unitTestingConnection';
        $APIurl = $this->APIurl . $this->action;
        $response = file_get_contents($APIurl);
        $expectedConnectionResponse = 'Connection OK!';
        $this->assertIsString($response);
        $this->assertStringContainsString($expectedConnectionResponse, $response);
    }
}


?>