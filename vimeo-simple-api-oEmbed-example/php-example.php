<?

// Change this to your username to load in your clips
$vimeo_user_name = ($_GET['user']) ? $_GET['user'] : 'brad';

// Endpoints
$api_endpoint = 'http://www.vimeo.com/api/'.$vimeo_user_name;
$oembed_endpoint = 'http://www.vimeo.com/api/oembed.xml';

// Get the url for the latest video
$videos = simplexml_load_file($api_endpoint.'/clips.xml');
$video_url = $videos->clip[0]->url;

// Create the URL
$oembed_url = $oembed_endpoint.'?url='.rawurlencode($video_url);

// Load in the oEmbed XML
$oembed = simplexml_load_file($oembed_url);
$embed_code = html_entity_decode($oembed->html);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Vimeo Simple API and oEmbed Example</title>
</head>
<body>
	
	<h1>Vimeo Simple API and oEmbed Example</h1>
	<?=$embed_code?>

</body>
</html>