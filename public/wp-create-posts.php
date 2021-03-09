<?php
require('wp-load.php');

$current_user = wp_get_current_user();
if (0 == $current_user->ID) {
	// Not logged in.
} else {
	// Logged in.
	$response = wp_remote_get('https://jsonplaceholder.typicode.com/posts');
	$responseBody = wp_remote_retrieve_body($response);
	$result = json_decode($responseBody);
	if (is_array($result) && !is_wp_error($result)) {
		$header = $result["headers"];
		$body = $result["body"];
		foreach ($result as $result_remote) {
			$remote_post_id = $result_remote->id;
			$remote_post_user_id = $result_remote->userId;
			$remote_post_title = $result_remote->title;
			$remote_post_body = $result_remote->body;
			$post_status = "publish";
			$post_type = "post";
			$args = array(
				'meta_key'   => 'remote_post_id',
				'meta_value' => $remote_post_id,
			);
			$album_wp = get_posts($args);
			if ($album_wp == null) {
				//if album not found
				//Buscar fotos aqui
				$my_post = array(
					'post_title'  => $remote_post_title,
					'post_type' => $post_type,
					'post_content' => $remote_post_body,
					'post_status'  => $post_status,
					'post_author'  => $current_user->ID,
					'meta_input' => array(
						'remote_post_id' => $remote_post_id,
						'remote_post_user_id' => $remote_post_user_id,
					)
				);
				$post_inserted = wp_insert_post($my_post);
				if ($post_inserted == null) {
					continue;
				}
			} else {
				continue;
			}
		}
	}
}