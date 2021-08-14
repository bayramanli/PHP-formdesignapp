<?php
session_start();
require_once "classes/database.php";

$db = new Database();

if (isset($_POST)) {
    //form ekleme işlemleri
    if ($_POST["button_name"] == "saveForm") {
        //echo "form kaydet tıklandı ve post işlemi oldu";
        //$themplate = json_encode($_POST["form_themplate"]);
        //print_r(json_decode($themplate));

        //$themplate = $_POST["form_themplate"];
        //$form_name = $_POST["form_name"];

        if (empty($_POST["form_themplate"]) || empty($_POST["form_name"])) {
            echo "Lütfen bütün alanları doldurunuz.";
        } else {
            $values = [
                "form_themplate" => json_encode($_POST["form_themplate"]),
                "form_name" => $_POST["form_name"]
            ];
            $sql = $db->insert("forms", $values);

            if ($sql["status"]) {
                $_SESSION["messageManagement"] = ["status" => true, "type" => "success", "message" => "Form başarılı bir şekilde kaydedildi."];
                //echo $_SESSION["messageManagement"]["status"];
            } else {
                $_SESSION["messageManagement"] = ["status" => false, "type" => "danger", "message" => "Form kaydedilirken bir hata oluştu. Lütfen daha sonra tekrar deneyiniz."];
                //print_r($_SESSION);
            }

            //print_r($sql);
            echo $sql["status"];
        }
    }

    //form güncelleme işlemleri
    if ($_POST["button_name"] == "updateForm") {

        if (empty($_POST["form_themplate"]) || empty($_POST["form_name"])) {
            echo "Lütfen bütün alanları doldurunuz.";
        } else {
            $values = [
                "form_themplate" => json_encode($_POST["form_themplate"]),
                "form_name" => $_POST["form_name"],
                "id" => $_POST["id"]
            ];
            $sql = $db->update("forms", $values, ["columns" => "id"]);

            if ($sql["status"]) {
                $_SESSION["messageManagement"] = ["status" => true, "type" => "success", "message" => "Form başarılı bir şekilde güncellendi."];
                //echo $_SESSION["messageManagement"]["status"];
            } else {
                $_SESSION["messageManagement"] = ["status" => false, "type" => "danger", "message" => "Form güncellenirken bir hata oluştu. Lütfen daha sonra tekrar deneyiniz."];
                //print_r($_SESSION);
            }

            //print_r($sql);
            echo $sql["status"];
        }
    }
}

//form silme işlemi
if (isset($_GET)) {
    if ($_GET["action"] == "delete") {
        $id = $_GET["id"];
        $sql = $db->delete("forms", "id", $id);

        if ($sql["status"]) {
            $_SESSION["messageManagement"] = ["status" => true, "type" => "success", "message" => "Form başarılı bir şekilde silindi."];
            header("Location:form-list.php");
        } else {
            $_SESSION["messageManagement"] = ["status" => false, "type" => "danger", "message" => "Form silinirken bir hata oluştu. Lütfen daha sonra tekrar deneyiniz."];
            header("Location:form-list.php");
        }
    }
}
