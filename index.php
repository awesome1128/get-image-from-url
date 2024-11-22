<?php
$file_path = 'image/'.time();
$mainImage = 'https://media.licdn.com/dms/image/D5635AQENNnzY-amA7Q/profile-framedphoto-shrink_200_200/0/1677609774742?e=1684944000&v=beta&t=FtQucu9jIpA3mqakDN97YTBbsWUALI91fRTAuvZDs4A';
$context = stream_context_create(
    array(
        "http" => array(
            "header" => "User-Agent: " . $_SERVER['HTTP_USER_AGENT']
        )
    )
);
file_put_contents($file_path, file_get_contents($mainImage, false, $context));
$image_type = mime_content_type( $file_path );
echo $image_type.'<br>';
switch ( $image_type ) {
    case 'image/jpeg': 
        $new_file_path = $file_path.'.jpeg';
        rename( $file_path, $new_file_path );
        $file_path = $new_file_path;
        break;
    case 'image/jpg':  
        // $new_file_name = get_stylesheet_directory() . '/' . $folder_name.'/'.$uniq_name.'.jpg';
        $new_file_path = $file_path.'.jpg';
        rename( $file_path, $new_file_path ); 
        $file_path = $new_file_path;
        break;
    case 'image/png':  
        // $new_file_name = get_stylesheet_directory() . '/' . $folder_name.'/'.$uniq_name.'.png';
        $new_file_path = $file_path.'.png';
        rename( $file_path, $new_file_path ); 
        $file_path = $new_file_path;
        break;
}
echo $file_path.'<br>';