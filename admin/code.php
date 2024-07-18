<?php

include('config/function.php');
// include('config/dbconn.php');

if (isset($_POST['saveUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;
    $role = validate($_POST['role']);

    if ($name != '' || $phone != '' || $email != '' || $password != '') {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users(name,phone,email,password,is_ban,role) 
        VALUES ('$name','$phone','$email','$hashPassword','$is_ban','$role')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('users.php', 'User/Admin Added Successfully');
        } else {
            redirect('users-create.php', 'Some went wrong!!!');
        }
    } else {
        redirect("users-create.php", "Please fill the all the input fields");
    }
}

//Edit user data

if (isset($_POST['updateUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;
    $role = validate($_POST['role']);
    $userId = validate($_POST['userId']);

    if ($name != '' || $phone != '' || $email != '' || $password != '') {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "UPDATE users SET
        name='$name',
        phone='$phone',
        email='$email',
        password='$hashPassword',
        is_ban='$is_ban',
        role='$role' WHERE id='$userId'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('users.php', 'User/Admin updated Successfully');
        } else {
            redirect('users.php', 'Some went wrong!!!');
        }
    } else {
        redirect("users-create.php", "Please fill the all the input fields");
    }
}

if (isset($_POST['saveSetting'])) {
    $title = validate($_POST['title']);
    $slag = validate($_POST['slag']);
    $small_description = validate($_POST['small_description']);

    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $email1 = validate($_POST['email1']);
    $email2 = validate($_POST['email2']);
    $phone1 = validate($_POST['phone1']);
    $phone2 = validate($_POST['phone2']);
    $address = validate($_POST['address']);

    $settingId = validate($_POST['settingId']);

    if ($settingId == 'insert') {
        $query = "INSERT INTO `settings`(`title`, `slag`, `small_description`, `meta_description`, `meta_keyword`, `email1`, `email2`, `phone1`, `phone2`, `address`)
                VALUES ('$title', '$slag', '$small_description', '$meta_description', '$meta_keyword', '$email1', 
                '$email2', '$phone1', '$phone2', '$address')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            redirect('settings.php', 'Settings save successfully');
        } else {
            redirect('settings.php', 'Something went wrong');
        }
    }

    if (is_numeric($settingId)) {
        $query = "UPDATE `settings` SET `title`='$title',
        `slag`='$slag', `small_description`='$small_description', `meta_description`='$meta_description',
        `meta_keyword`='$meta_keyword', `email1` = '$email1', `email2` = '$email2',
        `phone1`='$phone1', `phone2`='$phone2', `address`='$address' WHERE `id`= '$settingId'";

        $result = mysqli_query($conn, $query);
        if ($result) {
            redirect('settings.php', 'Settings save successfully');
        } else {
            redirect('settings.php', 'Something went wrong');
        }
    }
}

//-----------------add social media -------------------------------
if (isset($_POST['saveSocialMedia'])) {
    $name = validate($_POST['social_media_name']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']);

    if ($name != '' || $url != '' || $status != '') {
        $query = "INSERT INTO social_medias(name,url,status) 
        VALUES ('$name', '$url', '$status')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('social-media.php', 'Social Media Added Successfully');
        } else {
            redirect('social-media.php', 'Something went wrong!!!');
        }
    } else {
        redirect("social-media-create.php", "Please fill the all the input fields");
    }
}

if (isset($_POST['updateSocialMedia'])) {
    $name = validate($_POST['name']);
    $url = validate($_POST['url']);
    $status = validate($_POST['status']) == true ? 1 : 0;
    $id = validate($_POST['socialId']);

    if ($name != '' || $url != '') {
        $query = "UPDATE social_medias SET
        name='$name',
        url='$url',
        status='$status'
        WHERE id='$id'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('social-media.php', 'updated Successfully');
        } else {
            redirect('social-media.php', 'Some went wrong!!!');
        }
    } else {
        redirect("social-media-create.php", "Please fill the all the input fields");
    }
}

//-------------------------Create Services----------------------------------
//------------------------upload image---------------------------------------------

if (isset($_POST['saveService'])) {
    $id = validate($_POST['id']);
    $name = validate($_POST['serviceName']);
    $slag = str_replace(' ', '-', strtolower($name)); // it's slug not slag note for next time
    $small_description = validate($_POST['small_description']);
    $long_description = validate($_POST['long_description']);

    if ($_FILES['image']['size'] > 0) {
        $file_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $finalImage = 'assets/uploads/services/' . $file_name;  //folder, we do because when we fetch image we don't need to redeclare the path
        $folder = '../assets/uploads/services/' . $file_name;
    } else {
        $finalImage = NULL;
    }

    $meta_title = validate($_POST['meta_title']);
    $meta_keywords = validate($_POST['meta_keywords']);
    $meta_description = validate($_POST['meta_description']);

    $status = validate($_POST['status']) == true ? 1 : 0;

    $query = "INSERT INTO services(name, slag, small_description, long_description, image, meta_title, meta_keywords, meta_description, status) 
    VALUES ('$name','$slag','$small_description','$long_description','$finalImage','$meta_title','$meta_keywords','$meta_description','$status')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (move_uploaded_file($temp_name, $folder)) {
            redirect('services.php', 'Services Update Successfully');
        } else {
            redirect('services.php', 'Failed to update Services');
        }
    } else {
        redirect('services.php', 'Something went wrong!!!');
    }
}

if (isset($_POST['updateService'])) {
    $serviceId = validate($_POST['serviceId']);
    $name = validate($_POST['serviceName']);
    $slag = str_replace(' ', '-', strtolower($name)); // it's slug not slag note for next time
    $small_description = validate($_POST['small_description']);
    $long_description = validate($_POST['long_description']);

    $service = getById('services', $serviceId);

    if ($_FILES['image']['size'] > 0) {
        $file_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $finalImage = 'assets/uploads/services/' . $file_name;
        $folder = '../assets/uploads/services/' . $file_name;

        $path = '../assets/uploads/services/';
        $deleteImg = $path . $service['data']['image'];

        if (file_exists($deleteImg)) {
            unlink($deleteImg);         //unlink are use for delete a image 
        }
    } else {
        $finalImage = $service['data']['image'];
    }

    $meta_title = validate($_POST['meta_title']);
    $meta_keywords = validate($_POST['meta_keywords']);
    $meta_description = validate($_POST['meta_description']);

    $status = validate($_POST['status']) == true ? 1 : 0;

    $query = "UPDATE services SET
    name = '$name',
    slag = '$slag',
    small_description = '$small_description', 
    long_description = '$long_description',
    image = '$finalImage',
    meta_title = '$meta_title',
    meta_keywords = '$meta_keywords',
    meta_description = '$meta_description',
    status = '$status'
    WHERE id = '$serviceId'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (move_uploaded_file($temp_name, $folder)) {
            redirect('services.php', 'Services Update Successfully');
        } else {
            redirect('services.php', 'Failed to update Services');
        }
    } else {
        redirect('services.php', 'Something went wrong!!!');
    }
}

//---------------------------------CRUD FOR Enquiries-------------------------------

if (isset($_POST['enquiriesUpdateStatus'])) {
    $status = validate($_POST['status']);
    $enquiryId = validate($_POST['enquiryId']);
    $query = "UPDATE enquires SET status = '$status' WHERE id = '$enquiryId'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        redirect('enquiries.php', 'Enquiry Status Update Successfully');
    } else {
        redirect('enquiries.php', 'Failed to update enquiry');
    }
} else {
    redirect('enquiries.php', 'Something Went wrong!!!');
}
