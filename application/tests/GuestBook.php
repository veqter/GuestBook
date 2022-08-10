<?php

class welcome_test extends TestCase
{

 public function test_index()
 {
  $output = $this->request(http_method: 'GET', argv: 'auth/login');

  $this->assertContains(
   needle: '<title>Welcome to codeigniter</title>',
   $output
  );
 }
}
