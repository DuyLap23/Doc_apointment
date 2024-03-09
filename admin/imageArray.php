<?php
// Controller: xử lý logic

function uploadImages()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['images'])) {
        $uploadDirectory = '../image/'; // Thư mục lưu trữ ảnh

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['images']['name'][$key];
            $file_tmp = $_FILES['images']['tmp_name'][$key];

            $uploadPath = $uploadDirectory . $file_name;

            if (move_uploaded_file($file_tmp, $uploadPath)) {

            } else {
                echo "Error uploading $file_name.<br>";
            }

        }


        return implode(',', $_FILES['images']['name']);

    }
}
?>