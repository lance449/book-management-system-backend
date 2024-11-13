<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'title' => $this->faker->catchPhrase, 
            'author' => $this->faker->name,  
            'published_year' => $this->faker->year,  
            'genre' => $this->faker->randomElement(['Fiction', 'Science Fiction', 'Biography', 'Romance', 'Thriller']),  
            'description' => $this->faker->paragraph(3), 
        ];
    }
}
