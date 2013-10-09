<?php
header('Content-Type: text/plain');
// connect
$m = new MongoClient();

// select a db
$db = $m->comedy;

// select a collection / table (if none exists a new one is created upon insert)
$collection = $db->cartoons;

// add a record
// $document = array( "title" => "Calvins and Hobbes", "author" => "Another" );
// $collection->insert($document, array("safe" => true));

// add another record, with a different "shape"
// $document = array( "title" => "XKCD", "online" => true );
// $collection->insert($document);

// delete entire collection
// $collection->drop();

// update entire collection
// $collection->update(
	// array('title'=>'Shreef'),
	// array('$set' => array('title'=>'Steve')),
	// array('multiple'=>true));

// find everything in the collection
$cursor = $collection->find();

// iterate through the results
foreach ($cursor as $document) {
	print_r($document);
}
