<?php

require 'vendor/autoload.php';

use Elasticsearch;

// Connect to localhost:9200:
$es = new Elasticsearch\Client();

// Round-robin between two nodes:
$es = new Elasticsearch\Client(
			       array(
				     'hosts' => array(
						      'localhost:9200',
					   )
				     )
			       );

//Connect to cluster at search1:9200, sniff all nodes and round-robin between them:
$es = new Elasticsearch\Client(
			       array(
				     'hosts' => array('localhost:9200'),
        'connectionPoolClass' => '\Elasticsearch\ConnectionPool\SniffingConnectionPool'
				     )
			       );


// Index a document:
$es->index(
	   array(
		 'index' => 'my_app',
		 'type'  => 'blog_post',
		 'id'    => 1,
		 'body'  => array(
				  'title'   => 'Elasticsearch clients',
				  'content' => 'Interesting content...',
            'date'    => '2013-09-24'
				  )
		 )
	   );

//Get the document:
$doc = $es->get(
		array(
		      'index' => 'my_app',
		      'type'  => 'blog_post',
        'id'    => 1
		      )
		);

// Search:
$params = array(
		'index' => 'my_app',
    'type'  => 'blog_post'
		);
$params['body']['query']['match']['title'] = 'elasticsearch';
$results = $es->search($params);
var_dump($results);
?>