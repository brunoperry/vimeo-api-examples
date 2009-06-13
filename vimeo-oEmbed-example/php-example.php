<?

/*
You may want to use oEmbed discovery instead of hard-coding the oEmbed endpoint.
*/
$oembed_endpoint = 'http://www.vimeo.com/api/oembed';

// Grab the video url from the url, or use default
$video_url = ($_GET['url']) ? $_GET['url'] : 'http://www.vimeo.com/757219';

// Create the URLs
$json_url = $oembed_endpoint.'.json?url='.rawurlencode($video_url);
$xml_url = $oembed_endpoint.'.xml?url='.rawurlencode($video_url);

// Load in the oEmbed XML
$oembed = simplexml_load_file($xml_url);

/*
	An alternate approach would be to use CURL to load JSON,
	then use json_decode() to turn it into an array.
	
	$curl = curl_init($json_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$json = curl_exec($curl);
	curl_close($curl);
	$oembed = json_decode($json);
*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Vimeo PHP oEmbed Example</title>
</head>
<body>

	<h1><?=$oembed->title?></h1>
	<h2>by <a href="<?=$oembed->author_url?>"><?=$oembed->author_name?></a></h2>

	<?=html_entity_decode($oembed->html)?>

</body>
</html>