<?php

require 'db.php';
require_once "models/Station.php";
require_once "models/Genre.php";
require_once "views/header.php";
require_once "views/navi.php";

$stationObj = new Station([]); // leers Objekt , zweck Data holen
$genreObj = new Genre(''); // leer

$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'home';
# $log = print_r($page,true); //API Requiest

switch ($page) {
    case "genre":
        require_once "views/genre_form.php";
        require_once "views/genre_table.php";

        if($action === "add"  && $_SERVER['REQUEST_METHOD'] === "POST"){ //neue Daten in POST body # GET ->page , POST->action.
            $genreObj->insert($_POST['name']);
            header ("Location: index.php?page=genre");
            exit;
        }

        else if($action === "edit"){ //genre per id holen in <input> und $action vorbereiten
            $id= $_GET['id'];
            $genre = $genreObj->get_by_id($id);
            $form_action = "index.php?page=genre&action=update&id=" . $id;
            $page_title = "Genre bearbeiten";
            require "views/genre_form.php";
        }

        else if($action === "update" & $_SERVER['REQUEST_METHOD'] === "POST"){
            $id= $_GET['id'];
            $name = $_POST['name'];
            $genreObj->update_genre($id,$name);
            header ("Location: index.php?page=genre");
            exit;
            // print_r($id);
            // print_r($_POST,$id);
        }

        else if($action === "delete"){
            $id= $_GET['id'];
            $genreObj->delete_genre($id);
            header ("Location: index.php?page=genre");
            exit;
        }   
        break;
        

        case "station":
        $genres = $genreObj->get_genres();
        
        if ($action === "edit"){
            $id=$_GET["id"];
            $station = $stationObj->get_by_id($id);
            $form_action = "index.php?page=station&action=update&id=" . $id;
            $page_title = "Edit Station";
            #require "views/station_form.php";
            print_r($station);
        }
        else if($action === "update" & $_SERVER['REQUEST_METHOD'] === "POST"){
            $id= $_GET['id'];
            #$name = $_POST['name'];
            #print_r($_POST);exit;
            $stationObj->update($id,$_POST);
            header ("Location: index.php");
            // print_r($id);
            //     print_r($_POST,$id);
        }

        else if($action === "delete"){
            $id= $_GET['id'];
            $stationObj->delete($id);
            header ("Location: index.php");
        }   
        if($action === "add"  & $_SERVER['REQUEST_METHOD'] === "POST"){
            print_r($_POST);
            $stationObj->insert($_POST);
            header ("Location: index.php");
        }

        require_once "views/station_form.php";
        break;

        default:
        $stations = $stationObj->all();
        require_once "views/stations_table.php";
}


require_once "views/footer.php";
