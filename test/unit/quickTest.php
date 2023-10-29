<?php 

declare(strict_types = 1);
namespace test\unit;
use PHPUnit\Framework\TestCase;

class quickTest extends TestCase {
    // Define your database connection or mock here.
          /** @test */

    private $dbConnection;

    

    protected function setUp(): void {
       // Include the code that you want to test (replace with the correct path)
       include '/shop3/components/connect.php';

       // Now, include the code you want to test (replace with the correct path)
       include '/shop3/quick_view/quick_view_model.php';

        // Set up your database connection or mock here.
        // For example, you can create a mock PDO instance.
        $this->dbConnection = $this->createMock(PDO::class);
    }

    public function testFetchProductsByCategory() {
        // Define the category you want to test.
        $category = 'example_category';

        // Create a mock statement object.
        $statementMock = $this->createMock(PDOStatement::class);

        // Expect the prepare method to be called with the correct SQL query.
        $this->dbConnection->expects($this->once())
            ->method('prepare')
            ->with("SELECT * FROM `products` WHERE name LIKE '%$category%'")
            ->willReturn($statementMock);

        // Define a sample result for the statement.
        $sampleResult = [
            [
                'id' => 1,
                'name' => 'Product A',
                'category' => 'Category X',
                'price' => 10.99,
            ],
            [
                'id' => 2,
                'name' => 'Product B',
                'category' => 'Category Y',
                'price' => 15.99,
            ],
            // Add more sample product data as needed.
        ];
        

        // Expect the execute method to be called and return the sample result.
        $statementMock->expects($this->once())
            ->method('execute')
            ->willReturn(true);

        $statementMock->expects($this->once());
    }
}



?>
