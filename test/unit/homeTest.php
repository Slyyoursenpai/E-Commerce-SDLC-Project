<?php 

declare(strict_types = 1);
namespace test\unit;
use PHPUnit\Framework\TestCase;

class homeTest extends TestCase {
      /** @test */
    


      public function testSessionUserExists() {
        // Start a session

           // Include the code that you want to test (replace with the correct path)
           include '/shop3/components/connect.php';

           // Now, include the code you want to test (replace with the correct path)
           include '/shop3/home/home_model.php';

        session_start();

        // Set 'user_id' in the session
        $_SESSION['user_id'] = 42;

        $user_id = $_SESSION['user_id'];

     

        // Check if $user_id is correctly assigned
        $this->assertEquals(42, $user_id);

        // Clean up by destroying the session
        session_destroy();
    }

    public function testSessionUserDoesNotExists() {
        // Start a session
        session_start();

        // Unset 'user_id' in the session (making it empty)
        unset($_SESSION['user_id']);

        // Include the code that you want to test (replace with the correct path)
        include '/shop3/components/connect.php';

        // Now, include the code you want to test (replace with the correct path)
        include '/shop3/home/home_model.php';

        // Check if $user_id is an empty string
        $this->assertEquals('', $user_id);

        // Clean up by destroying the session
        session_destroy();
    }


   ///// database test
   public function testSelectProducts() {
    include '/shop3/components/connect.php';
    include '/shop3/home/home_controller.php';

    // Create a mock PDO instance
    $dbMock = $this->createMock(PDO::class);

    // Create a mock statement object
    $statementMock = $this->createMock(PDOStatement::class);

    // Expect the prepare and execute methods to be called
    $dbMock->expects($this->once())
        ->method('prepare')
        ->with('SELECT * FROM `products` LIMIT 6')
        ->willReturn($statementMock);

    $statementMock->expects($this->once())->method('execute');

}


public function testProductCount()
{
    include '/shop3/components/connect.php';
    include '/shop3/home/home_controller.php';
    // Create a mock Database class
    $database = $this->createMock(Database::class);

    // Create a mock PDOStatement object
    $pdoStatement = $this->createMock(PDOStatement::class);

    // Set up the mock PDOStatement to return a predefined result for rowCount
    $pdoStatement->expects($this->once())
        ->method('rowCount')
        ->willReturn(5); // Set the expected product count

    // Set up the mock Database to return the mock PDOStatement
    $database->expects($this->once())
        ->method('selectProducts')
        ->willReturn($pdoStatement);

    // Replace the global $database with the mock
    global $database;
    $database = $database;

    // Include your script here and test as before
    ob_start();
    require 'path/to/your/php/script.php';
    ob_end_clean();

    $this->assertGreaterThan(0, $database->selectProducts()->rowCount(), 'There should be more than 0 products in the database.');
}
public function testProductOutput()
{
    $select = 0;
    // Capture the output using ob_start() and ob_get_clean().
    ob_start();

           // Include the code that you want to test 
           include '/shop3/components/connect.php';

           // Now, include the code you want to test 
           include '/shop3/home/home_controller.php';   
           
        $output = ob_get_clean();

    // Check if the output contains a product name when products are available.
    if ($select > 0) {
        $this->assertStringContainsString('<div class="name">', $output, 'Product name displayed');
    } else {
        // Check if the output contains a message when there are no products.
        $this->assertStringContainsString('No Products Added Yet', $output, 'No product to show.');
    }
}



}

?>