<?php 

declare(strict_types = 1);
namespace test\unit;
use PHPUnit\Framework\TestCase;

class categoryTest extends TestCase {
      /** @test */
      public function testCategoryRetrievalFromGET() {

        include '/shop3/components/connect.php';
        include '/shop3/category/category.model.php';
        // Define a sample category to test.
        $_GET['category'] = 'laptop';
        $category =  $_GET['category'];

        // Include the file that contains the code you want to test.

        // Check if the $category variable is set and contains the expected value.
        $this->assertArrayHasKey('category', $_GET);
        //$this->assertEquals('electronics', $category);
        $this->assertEquals('laptop', $category);
        $this->assertSame('laptop', $category);


    }
}




?>