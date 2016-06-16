<?php

use Illuminate\Database\Seeder;

use App\Note;
use App\Category;

class NoteCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// seed category
        Category::create([
            'name' => 'Science',
        ]);

        Category::create([
            'name' => 'Warning',
        ]);

        // seed note
        Note::create([
            'content' => 'Laravel Tutorial',
        ]);

        Note::create([
            'content' => 'The system will crash',
        ]);

        Note::create([
            'content' => 'Hello All',
        ]);

        // seed relationship
        $category_science = Category::where('name', '=', 'Science')->get()[0]->id;
        $category_warning = Category::where('name', '=', 'Warning')->get()[0]->id;

        $note = Note::where('content', '=', 'Laravel Tutorial')->get()[0];
        $note->categories()->attach($category_science);

        $note = Note::where('content', '=', 'The system will crash')->get()[0];
        $note->categories()->attach($category_warning);

        $note = Note::where('content', '=', 'Hello All')->get()[0];
        $note->categories()->attach($category_science);
        $note->categories()->attach($category_warning);
    }
}
