<?php
    require 'config/function.php';

    $parResult = checkParamId('id');
    if(is_numeric($parResult)){
        $id =  validate($parResult);

        $social_media = getById('social_medias',$id);
        if ($social_media['status'] == 200) {
            $social_media_delete = deleteQuery('social_medias',$id);

            if ($social_media_delete) {
                redirect('social-media.php', 'deleted successfully');
            }
            else{
                redirect('social-media.php', 'Something went wrong!');
            }
        }
        else{
            redirect('social-media.php', $social_media('message'));
        }
    }
    else{
        redirect('social-media.php',$parResult);
    }

?>