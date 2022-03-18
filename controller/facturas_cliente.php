<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }
    
    header('Access-Control-Allow-Origin: *');  
    header('Content-Type: application/json');

    require_once("../config/conexion.php"); 
    require_once("../models/Facturas_cliente.php"); 

    $facturas_cliente = new Facturas_cliente(); 

    $body = json_decode(file_get_contents("php://input"), true); 


    switch($_GET["opc"]) {
        case "GetFacturas": 
            $datos = $facturas_cliente->GetFacturas(); 
            echo json_encode($datos); 
        break;
        
        case "GetFacturaId": 
            $datos = $facturas_cliente->GetFacturaId($body["ID"]); 
            echo json_encode($datos); 
        break; 

        case "InsertarFactura": 
            $datos = $facturas_cliente->InsertarFactura($body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"]); 
            echo json_encode("Factura agregada correctamente"); 
        break;
        
        case "ActualizarFactura": 
            $datos = $facturas_cliente->ActualizarFactura($body["ID"], $body["NUMERO_FACTURA"],$body["ID_SOCIO"],$body["FECHA_FACTURA"],$body["DETALLE"],$body["SUB_TOTAL"],$body["TOTAL_ISV"],$body["TOTAL"],$body["FECHA_VENCIMIENTO"],$body["ESTADO"]); 
            echo json_encode("Factura actualizada correctamente"); 
        break; 

        case "EliminarFactura": 
            $datos = $facturas_cliente->EliminarFactura($body["ID"]); 
            echo json_encode("Factura eliminada correctamente"); 
        break;
    }

?>
