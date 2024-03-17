<?php

namespace Controllers;

use MVC\Router;
use Model\Servicio;

class ServicioController
{
    public static function index(Router $router)
    {
        session_start();
        isAdmin();
        $nombre = $_SESSION['nombre'];

        $servicios = Servicio::all();

        $router->render("servicios/index", [
            "nombre" => $nombre,
            "servicios" => $servicios
        ]);
    }
    public static function crear(Router $router)
    {
        session_start();
        isAdmin();
        $nombre = $_SESSION['nombre'];
        $servicio = new Servicio;
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);
            $alertas = $servicio->validar();

            if (empty($alertas)) {
                $servicio->guardar();
                header("Location: /servicios");
            }
        }

        $router->render("servicios/crear", [
            "nombre" => $nombre,
            "servicio" => $servicio,
            "alertas" => $alertas,
        ]);
    }
    public static function actualizar(Router $router)
    {
        session_start();
        isAdmin();
        if (!is_numeric($_GET['id'])) return;
        $nombre = $_SESSION['nombre'];
        $servicio = Servicio::find($_GET['id']);
        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);

            $alertas = $servicio->validar();

            if (empty($alertas)) {
                $servicio->guardar();
                header('Location: /servicios');
            }
        }

        $router->render("servicios/actualizar", [
            "nombre" => $nombre,
            "servicio" => $servicio,
            "alertas" => $alertas,
        ]);
    }
    public static function eliminar()
    {
        session_start();
        isAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST["id"];
            $servicio = Servicio::find($id);
            $servicio->eliminar();
            header("Location: /servicios");
        }
    }
}
