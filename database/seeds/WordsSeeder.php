<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class WordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csv = Reader::createFromPath(base_path(). '/csv/datakata.csv');
        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();

        $words = iterator_to_array($records);

       	$data = [];

       	$query = "INSERT INTO words (name, slug, meaning, hit) VALUES ";
       	$values = [];
	    foreach($words as $word){
	    	$values[] = "('". $word['katakunci'] ."', '". str_slug($word['katakunci']) ."', '". $word['artikata'] ."', ". rand(0, 100) .")";
	    }

	    $query .= implode(', ', $values);

        DB::insert($query);
    }
}
