<?php
require('wp-load.php');

$current_user = wp_get_current_user();
if (0 == $current_user->ID) {
	// Not logged in.
} else {
	// Logged in.
	$response = wp_remote_get('https://jsonplaceholder.typicode.com/albums');
	$responseBody = wp_remote_retrieve_body($response);
	$result = json_decode($responseBody);
	if (is_array($result) && !is_wp_error($result)) {
		$header = $result["headers"];
		$body = $result["body"];
		foreach ($result as $result_remote) {
			$album_id = $result_remote->id;
			$album_user_id = $result_remote->userId;
			$album_title = $result_remote->title;
			$post_status = "publish";
			$post_type = "album";
			$args = array(
				'meta_key'   => 'album_id',
				'meta_value' => $album_id,
				'post_type' => $post_type
			);
			$album_wp = get_posts($args);
			if ($album_wp == null) {
				//if album not found
				$my_album = array(
					'post_title'  => $album_title,
					'post_type' => $post_type,
					'post_content'	=> "",
					'post_status'  => $post_status,
					'post_author'  => $current_user->ID,
					'meta_input' => array(
						'album_user_id' => $album_user_id,
						'album_id' => $album_id,
					)
				);
				$album_inserted = wp_insert_post($my_album);
			} else {
				continue;
				//echo 'Album'.$album_id.'já existe<pre>';
				//print_r($album_wp);
			}
		}
	}
}
