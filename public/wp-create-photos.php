<?php
require('wp-load.php');

$current_user = wp_get_current_user();
if (0 == $current_user->ID) {
    // Not logged in.
} else {
    // Logged in
    $response = wp_remote_get('https://jsonplaceholder.typicode.com/photos');
    $responseBody = wp_remote_retrieve_body($response);
    $result = json_decode($responseBody);
    if (is_array($result) && !is_wp_error($result)) {
        $header = $result["headers"];
        $body = $result["body"];
            $counter =0;
        foreach ($result as $result_remote) {
            $counter ++;
            $album_id = $result_remote->albumId;
            $photo_id = $result_remote->id;
            $photo_title = $result_remote->title;
            $photo_url = $result_remote->url;
            $photo_thumb = $result_remote->thumbnailUrl;

            // $album_id = 9;
            //resgatarid do post album
            $album_args = array(
                'meta_key'   => 'album_id',
                'meta_value' => $album_id,
                'post_type' => 'album'
            );
            $album_wp = get_posts($album_args);
            foreach ($album_wp as $album) {
                $album_wp_id = $album->ID;

            }
            $post_status = "publish";
            $post_type = "attachment";
            //check if has photo
            $photo_args = array(
                'meta_key'   => 'photo_id',
                'meta_value' => $photo_id,
                'post_type' => $post_type
            );
            $photo_wp = get_posts($photo_args);
            if ($photo_wp == null) {

                /* IMG */
                if ($photo_url == !NULL) :
                    include_once(ABSPATH . 'wp-admin/includes/image.php');
                    $imageurl = $photo_url;
                    $imagetype = end(explode('/', getimagesize($imageurl)['mime']));
                    $uniq_name = date('dmY') . '' . (int) microtime(true);
                    $filename = $uniq_name . '.' . $imagetype;

                    $uploaddir = wp_upload_dir();
                    $uploadfile = $uploaddir['path'] . '/' . $filename;
                    $contents = file_get_contents($imageurl);
                    $savefile = fopen($uploadfile, 'w');
                    fwrite($savefile, $contents);
                    fclose($savefile);

                    $wp_filetype = wp_check_filetype(basename($filename), null);
                    $attachment = array(
                        'post_mime_type' => $wp_filetype['type'],
                        'post_title' => $photo_title,
                        'post_content' => '',
                        'post_status' => 'inherit',
                        'post_parent' => $album_wp_id,
                        '$post_type' => $post_type,
                        'post_author'  => $current_user->ID,
                        'meta_input' => array(
                            'url' => $photo_url,
                            'thumburl' => $photo_thumb,
                            'photo_id' => $photo_id,
                            'album_id' => $album_id
                        )
                    );
                    echo '<pre>';
                    print_r($attachment);
                    $attach_id = wp_insert_attachment($attachment, $uploadfile, $album_wp_id);
                    $imagenew = get_post($attach_id);
                    $fullsizepath = get_attached_file($imagenew->ID);
                    $attach_data = wp_generate_attachment_metadata($attach_id, $fullsizepath);
                    wp_update_attachment_metadata($attach_id, $attach_data);
                    set_post_thumbnail($album_wp_id, $attach_id);
                endif;
                /* THUMB */
                if ($photo_thumb == !NULL) :
                    include_once(ABSPATH . 'wp-admin/includes/image.php');
                    $imageurl = $photo_thumb;
                    $imagetype = end(explode('/', getimagesize($imageurl)['mime']));
                    $uniq_name = date('dmY') . '' . (int) microtime(true);
                    $filename = $uniq_name . '.' . $imagetype;

                    $uploaddir = wp_upload_dir();
                    $uploadfile = $uploaddir['path'] . '/' . $filename;
                    $contents = file_get_contents($imageurl);
                    $savefile = fopen($uploadfile, 'w');
                    fwrite($savefile, $contents);
                    fclose($savefile);

                    $wp_filetype = wp_check_filetype(basename($filename), null);
                    $attachment = array(
                        'post_mime_type' => $wp_filetype['type'],
                        'post_title' => $photo_title,
                        'post_content' => '',
                        'post_status' => 'inherit',
                        'post_parent' => $album_wp_id,
                        '$post_type' => $post_type,
                        'post_author'  => $current_user->ID,
                        'meta_input' => array(
                            'url' => $photo_url,
                            'thumburl' => $photo_thumb,
                            'photo_id' => $photo_id,
                            'album_id' => $album_id
                        )
                    );
                    echo '<pre>';
                    print_r($attachment);
                    $attach_id = wp_insert_attachment($attachment, $uploadfile, $album_wp_id);
                    $imagenew = get_post($attach_id);
                    $fullsizepath = get_attached_file($imagenew->ID);
                    $attach_data = wp_generate_attachment_metadata($attach_id, $fullsizepath);
                    wp_update_attachment_metadata($attach_id, $attach_data);
                    set_post_thumbnail($album_wp_id, $attach_id);
                endif;
                /* THUMB */
            } // end if
            echo $counter;
        }
    } 
}
wp_reset_postdata();
