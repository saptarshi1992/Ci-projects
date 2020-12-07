<?php 

require_once 'utilities.php';
function extract_from_youtube_videoID(string $id, $document = null) {
	if (! $document) {
		$document = new document ();
	}

	$url = "https://www.googleapis.com/youtube/v3/videos?" . http_build_query ( array (
		"id" => $id,
		"part" => "contentDetails,snippet",
				//"key" => configuration::get_api_key_youtube (),
		"key" => "AIzaSyA3ewXJYQ5IMsx5kyTpbX4dhB2yv3ceIGA",
		"fields" =>"items(contentDetails(duration,licensedContent),snippet(title,publishedAt,description,tags,channelTitle,channelId))"

	) );

	if (($details = http::get_remote_data ( $url )) && ($details = json_decode ( $details )) && (! json_last_error ()) && (count ( $details->items ))) {
		$document->set_thumbnail_link ( "https://img.youtube.com/vi/" . $id . "/mqdefault.jpg" );
			// $document->add_metadata ( "video", "dc.type" );
			// $document->add_metadata ( "Youtube Plugin", "dc.relation.requires" );
		$document->add_metadata ( "http://www.youtube.com/v/$id", "youtube:id");
		foreach ($details->items[0] as $key=>$data)
		{
			if($key=="snippet")
			{
				foreach ($data as $key=>$data_snippept)
				{
					$document->add_metadata($data_snippept, $key);
				}
			}
			if($key=="contentDetails")
			{
				foreach ($data as $key=>$data_content_details)
				{
					$document->add_metadata($data_content_details, $key);
				}
			}
                 //$document->add_metadata($key, $data);

		}

	} else {
		$document->add_error ( "ERROR: Youtube API failed to respond" );
	}
	print_r($document);


}

function extract_from_youtube_channelID(string $id, $document = null, $nextPageToken = null) {
	if (! $document) {
		$document = new document ();
	}

	$url = "https://youtube.googleapis.com/youtube/v3/search?" . http_build_query ( array (

		"part" => "snippet",
		"channelId" => $id,
		"maxResults" => 50,
		"nextPageToken" =>$nextPageToken,
		"key" => "AIzaSyA3ewXJYQ5IMsx5kyTpbX4dhB2yv3ceIGA"
		        //"fields" =>"items(contentDetails(duration,licensedContent),snippet(title,publishedAt,description,tags,channelTitle,channelId))"

	) );
	if (($details = http::get_remote_data ( $url )) && ($details = json_decode ( $details )) && (! json_last_error ()) && (count ( $details->items ))) {

		foreach($details->items as $key=>$value)
		{
			foreach($value->id as $key=>$values)
			{
				if($key == 'videoId'){
					$videoId = $values;
					extract_from_youtube_videoID($videoId);
				}
			}
		}
		while($details->nextPageToken != null)
		{
			$nextPageToken = $details->nextPageToken;
			extract_from_youtube_channelID($id,$nextPageToken );
		}

	} else {
		$document->add_error ( "ERROR: Youtube API failed to respond" );
	}
		//print_r($document);


}
     
  ///**** API Key is linked with My Google developers console ***///

        extract_from_youtube_channelID("UC4a-Gbdw7vOaccHmFo40b9g");
        
     ///** for single youtube video information ***///

     	//extract_from_youtube_videoID("-6XBnjFrWBg");

