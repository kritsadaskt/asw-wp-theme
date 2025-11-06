<?php 
$f = get_fields();
$zip_filepath = '/2023/02/abcde.zip';
$zip_filepath_hash = md5($zip_filepath);
$zif_file_source = __DIR__.'/../../uploads'.$zip_filepath;
?>
<pre><?=pre($f);?></pre>
<pre><?=pre($zip_filepath_hash);?></pre>

<?php 
$dir = __DIR__."/../../assetwise-360/".$zip_filepath_hash."/index.html";
$is_done = file_exists($dir);
$url_360 = "/wp-content/assetwise-360/".$zip_filepath_hash."/index.html";
pre($dir);
if (!$is_done) {
	echo 'Not found.<br>New Extraction.';
	$file = $zif_file_source;

	$path = __DIR__."/../../assetwise-360/".$zip_filepath_hash;
	pre($path);

	$zip = new ZipArchive;
	$res = $zip->open($file);
	if ($res === TRUE) {
		$zip->extractTo($path);
		$zip->close();
		echo "WOOT! $file extracted to $path";
	} else {
		echo "Doh! I couldn't open $file";
	}
}
?>
<h2>Done</h2>
<style type="text/css">
	.frame_360{
		width: 80vw;
		height: 40vw;
	}
</style>
<iframe class="frame_360" src="<?=$url_360?>"></iframe>