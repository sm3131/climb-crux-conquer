<?php

namespace Tests\Feature;

use App\Models\Climb;
use App\Services\ClimbService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ClimbServiceTest extends TestCase
{
    use DatabaseTransactions;

    public function setUp(): void
    {
        parent::setUp();

        Storage::fake('public');
    }

    public function test_method_storeClimbImage_withValidImage_returnsTrue()
    {
        // Arrange
        $mockClimbImage = UploadedFile::fake()->image('climbPic.png');

        $sut = new ClimbService();

        // Act
        $actual = $sut->storeClimbImage($mockClimbImage);
        $expected = true;

        // Assert
        $this->assertEquals($expected, $actual);
    }

        public function test_method_storeClimbImage_withValidImage_persistsInStorage()
    {
        // Arrange
        $mockClimbImage = UploadedFile::fake()->image('climbPic.png');
        $mockClimbImageFileName = $mockClimbImage->hashName();

        $sut = new ClimbService();

        // Act
        $sut->storeClimbImage($mockClimbImage);

        // Assert
        Storage::disk('public')->assertExists($mockClimbImageFileName);
    }

    public function test_method_writeClimbToDatabase_check_alreadyFormattedAttributes() 
    {
        // Arrange

        $mockValidClimb = [
            'climb_name' => 'Firedance',
            'climb_style' => 'Sport',
            'climb_grade' => '5.12a',
            'climb_description' => 'Technical climb with a lot of small pockets and balance moves, pumpy to the chains.',
            'crag_name' => "Jack's Canyon",
            'crag_location' => 'Winslow, AZ',
            'climb_image' => null,
        ];

        $expectedFormattedAttributes = [
            'climb_name' => 'Firedance',
            'climb_style' => 'Sport',
            'climb_grade' => '5.12a',
            'climb_description' => 'Technical climb with a lot of small pockets and balance moves, pumpy to the chains.',
        ];
        
        $sut = new ClimbService();

        // Act

        $sut->writeClimbToDatabase($mockValidClimb);

        // Assert

        //$this->assertEquals($expectedFormattedAttributes, $alreadyFormattedAttributes);

    }

    // public function test_method_writeClimbToDatabase_climb_instance_with_attributes() 
    // {
    //     // Arrange

    //     $mockClimbInstance = new Climb();
    //     $climbAttributes = [
    //         'climb_name' => 'Firedance',
    //         'climb_style' => 'Sport',
    //         'climb_grade' => '5.12a',
    //         'climb_description' => 'Technical climb with a lot of small pockets and balance moves, pumpy to the chains.',
    //         'climb_location' => "Jack's Canyon/ Winslow, AZ",
    //         'climb_image' => null,
    //     ];

    //     // Act
        

    //     // Assert
    // }

    // public function test_method_writeClimbToDatabase_climb_stored_in_database()
    // {
    //     //
    // }
}
