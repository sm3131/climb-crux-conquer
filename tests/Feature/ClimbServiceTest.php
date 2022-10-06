<?php

namespace Tests\Feature;

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
}
