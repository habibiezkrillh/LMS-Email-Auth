<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Admin;
use App\Models\Librarian;
use App\Models\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LibraryManagementUnitTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function admin_can_be_created()
    {
        $admin = Admin::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
        ]);

        $this->assertDatabaseHas('admins', ['email' => 'admin@example.com']);
    }

    /** @test */
    public function librarian_can_be_assigned_to_admin()
    {
        $admin = Admin::factory()->create();
        $librarian = Librarian::factory()->create(['admin_id' => $admin->id]);

        $this->assertEquals($admin->id, $librarian->admin_id);
    }

    /** @test */
    public function collection_can_be_created_by_librarian()
    {
        $librarian = Librarian::factory()->create();
        $collection = Collection::factory()->create(['librarian_id' => $librarian->id]);

        $this->assertDatabaseHas('collections', ['id' => $collection->id]);
    }

    /** @test */
    public function collection_type_should_be_valid()
    {
        $librarian = Librarian::factory()->create();
        $collection = Collection::factory()->create(['librarian_id' => $librarian->id, 'type' => 'book']);

        $this->assertContains($collection->type, ['book', 'journal', 'newspaper', 'cd/dvd']);
    }
}
