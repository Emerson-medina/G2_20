<?php
    class Facturas_cliente extends Conectar {

        public function GetFacturas() {
            $conectar = parent::Conexion(); 
            parent::set_names(); 
            $sql = "SELECT * FROM ma_facturas_cliente"; 
            $sql = $conectar->prepare($sql); 
            $sql->execute(); 
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function GetFacturaId($id) {
            $conectar = parent::Conexion(); 
            parent::set_names(); 
            $sql = "SELECT * FROM ma_facturas_cliente where ID = ?"; 
            $sql = $conectar->prepare($sql); 
            $sql->bindValue(1, $id);
            $sql->execute(); 
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function InsertarFactura($numeroFactura, $idSocio, $fechaFactura, $detalle, $subTotal, $totalISV, $total, $fechaVencimiento, $estado) {
            $conectar = parent::Conexion(); 
            parent::set_names(); 
            $sql = "INSERT INTO ma_facturas_cliente (ID,NUMERO_FACTURA,ID_SOCIO, FECHA_FACTURA, DETALLE,SUB_TOTAL, TOTAL_ISV, TOTAL, FECHA_VENCIMIENTO,ESTADO)
                    VALUES (NULL,?,?,?,?,?,?,?,?,?);"; 
            $sql = $conectar->prepare($sql); 
            $sql->bindValue(1, $numeroFactura);
            $sql->bindValue(2, $idSocio);
            $sql->bindValue(3, $fechaFactura);
            $sql->bindValue(4, $detalle);
            $sql->bindValue(5, $subTotal);
            $sql->bindValue(6, $totalISV);
            $sql->bindValue(7, $total);
            $sql->bindValue(8, $fechaVencimiento);
            $sql->bindValue(9, $estado);
            $sql->execute(); 
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function ActualizarFactura($id, $numeroFactura, $idSocio, $fechaFactura, $detalle, $subTotal, $totalISV, $total, $fechaVencimiento, $estado) {
            $conectar = parent::Conexion(); 
            parent::set_names(); 
            $sql = "UPDATE ma_facturas_cliente SET NUMERO_FACTURA = ?,ID_SOCIO = ?, FECHA_FACTURA = ?, DETALLE = ?, SUB_TOTAL = ?, TOTAL_ISV = ?, TOTAL = ?, FECHA_VENCIMIENTO = ?, ESTADO = ?
                    WHERE ID = ?;"; 
            $sql = $conectar->prepare($sql); 
            $sql->bindValue(1, $numeroFactura);
            $sql->bindValue(2, $idSocio);
            $sql->bindValue(3, $fechaFactura);
            $sql->bindValue(4, $detalle);
            $sql->bindValue(5, $subTotal);
            $sql->bindValue(6, $totalISV);
            $sql->bindValue(7, $total);
            $sql->bindValue(8, $fechaVencimiento);
            $sql->bindValue(9, $estado);
            $sql->bindValue(10, $id);

            $sql->execute(); 
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        Public function EliminarFactura($id) {
            $conectar = parent::Conexion(); 
            parent::set_names(); 
            $sql = "DELETE FROM ma_facturas_cliente where ID = ?"; 
            $sql = $conectar->prepare($sql); 
            $sql->bindValue(1, $id);
            $sql->execute(); 
            return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>