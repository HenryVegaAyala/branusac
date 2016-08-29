-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.17


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema branusac
--

CREATE DATABASE IF NOT EXISTS branusac;
USE branusac;

--
-- Definition of table `bas_param`
--

DROP TABLE IF EXISTS `bas_param`;
CREATE TABLE `bas_param` (
  `COD_PARA` varchar(2) NOT NULL,
  `VAL_PARA` varchar(100) DEFAULT NULL,
  `DES_PARA` varchar(100) DEFAULT NULL,
  `USU_DIGI` varchar(20) DEFAULT NULL,
  `FEC_DIGI` datetime DEFAULT NULL,
  `USU_MODI` varchar(20) DEFAULT NULL,
  `FEC_MODI` datetime DEFAULT NULL,
  PRIMARY KEY (`COD_PARA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bas_param`
--

/*!40000 ALTER TABLE `bas_param` DISABLE KEYS */;
INSERT INTO `bas_param` (`COD_PARA`,`VAL_PARA`,`DES_PARA`,`USU_DIGI`,`FEC_DIGI`,`USU_MODI`,`FEC_MODI`) VALUES 
 ('01','18','IGV','ADMIN','2016-06-21 00:00:00',NULL,NULL);
/*!40000 ALTER TABLE `bas_param` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `COD_CLIE` int(99) NOT NULL,
  `NOMBRE` varchar(150) NOT NULL,
  `RUC` varchar(20) DEFAULT NULL,
  `DNI` int(8) DEFAULT NULL,
  `DIRECCION` varchar(250) DEFAULT NULL,
  `TELEFONO2` int(10) DEFAULT NULL,
  `CORREO_E` varchar(150) DEFAULT NULL,
  `TELEFONO` varchar(60) DEFAULT NULL,
  `FAX` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`COD_CLIE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`COD_CLIE`,`NOMBRE`,`RUC`,`DNI`,`DIRECCION`,`TELEFONO2`,`CORREO_E`,`TELEFONO`,`FAX`) VALUES 
 (1,'adidas chile ltda suc  del perú','20347100316',48429679,'av. santa cruz 970 - lima 18',955201758,'','2802886','');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `detalle_guia`
--

DROP TABLE IF EXISTS `detalle_guia`;
CREATE TABLE `detalle_guia` (
  `COD_GUIA_DET` int(99) NOT NULL,
  `CODIGO_GUIA` int(99) NOT NULL,
  `LINEA` int(11) NOT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `TOTAL` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`COD_GUIA_DET`),
  KEY `fk_t_guia_det_t_guia1_idx` (`CODIGO_GUIA`),
  CONSTRAINT `fk_t_guia_det_t_guia1` FOREIGN KEY (`CODIGO_GUIA`) REFERENCES `guia` (`COD_GUIA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_guia`
--

/*!40000 ALTER TABLE `detalle_guia` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_guia` ENABLE KEYS */;


--
-- Definition of table `detalle_presupuesto`
--

DROP TABLE IF EXISTS `detalle_presupuesto`;
CREATE TABLE `detalle_presupuesto` (
  `COD_PRESU` int(99) NOT NULL,
  `COD_PRESU_DET` int(99) NOT NULL,
  `COD_PRODUC` int(11) NOT NULL,
  `LINEA` int(11) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL,
  `TOTAL` decimal(9,2) DEFAULT NULL,
  `COD_CLIE` int(11) NOT NULL,
  `PRECIO` decimal(10,2) NOT NULL,
  KEY `fk_t_presupuesto_det_Presupuesto1_idx` (`COD_PRESU`),
  KEY `fk_detalle_presupuesto_t_stock1_idx` (`COD_PRODUC`),
  CONSTRAINT `fk_detalle_presupuesto_t_stock1` FOREIGN KEY (`COD_PRODUC`) REFERENCES `producto` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_t_presupuesto_det_Presupuesto1` FOREIGN KEY (`COD_PRESU`) REFERENCES `presupuesto` (`COD_PRESU`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detalle_presupuesto`
--

/*!40000 ALTER TABLE `detalle_presupuesto` DISABLE KEYS */;
INSERT INTO `detalle_presupuesto` (`COD_PRESU`,`COD_PRESU_DET`,`COD_PRODUC`,`LINEA`,`CANTIDAD`,`DESCRIPCION`,`TOTAL`,`COD_CLIE`,`PRECIO`) VALUES 
 (1,1,1,NULL,1000,'papel folder 4a','0.92',1,'920.00'),
 (2,2,1,NULL,34,'pan','43.00',1,'1462.00'),
 (3,3,1,NULL,34,'papel','4.00',1,'136.00'),
 (4,4,1,NULL,34,'pae','4.00',1,'136.00');
/*!40000 ALTER TABLE `detalle_presupuesto` ENABLE KEYS */;


--
-- Definition of table `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `COD_FACT` int(99) NOT NULL,
  `NUM_FACT` varchar(7) NOT NULL,
  `MONEDA` char(1) NOT NULL,
  `FECHA` date DEFAULT NULL,
  `CLIENTE` varchar(150) NOT NULL,
  `RUC` varchar(20) NOT NULL,
  `OC` varchar(20) DEFAULT NULL,
  `COND_PAGO` char(1) DEFAULT NULL,
  `NRO_DIAS` int(11) DEFAULT NULL,
  `COND_PERSONALIZADO` varchar(100) DEFAULT NULL,
  `SUBTOTAL` decimal(10,2) DEFAULT NULL,
  `IGV` decimal(10,2) DEFAULT NULL,
  `TOTAL` decimal(10,2) DEFAULT NULL,
  `FECHA_CANC` date DEFAULT NULL,
  `ESTADO` char(1) DEFAULT NULL,
  `COD_GUIA` int(99) NOT NULL,
  `facturacol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`COD_FACT`),
  UNIQUE KEY `SYS_CT_12` (`NUM_FACT`),
  KEY `fk_t_factura_Guia1_idx` (`COD_GUIA`),
  CONSTRAINT `fk_t_factura_Guia1` FOREIGN KEY (`COD_GUIA`) REFERENCES `guia` (`COD_GUIA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factura`
--

/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;


--
-- Definition of table `guia`
--

DROP TABLE IF EXISTS `guia`;
CREATE TABLE `guia` (
  `COD_GUIA` int(99) NOT NULL,
  `NUM_GUIA` varchar(3) DEFAULT NULL,
  `COD_PRESU` int(99) NOT NULL,
  `DOMICILIO` varchar(120) DEFAULT NULL,
  `RUC` varchar(20) DEFAULT NULL,
  `OC` varchar(20) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `TRANS_CODIGO` int(99) NOT NULL,
  PRIMARY KEY (`COD_GUIA`),
  UNIQUE KEY `SYS_CT_38` (`NUM_GUIA`),
  KEY `SYS_FK_40` (`TRANS_CODIGO`),
  KEY `fk_t_guia_Presupuesto1_idx` (`COD_PRESU`),
  CONSTRAINT `fk_t_guia_Presupuesto1` FOREIGN KEY (`COD_PRESU`) REFERENCES `presupuesto` (`COD_PRESU`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `SYS_FK_40` FOREIGN KEY (`TRANS_CODIGO`) REFERENCES `transportista` (`COD_TRANSP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guia`
--

/*!40000 ALTER TABLE `guia` DISABLE KEYS */;
/*!40000 ALTER TABLE `guia` ENABLE KEYS */;


--
-- Definition of table `imp_folio_factu`
--

DROP TABLE IF EXISTS `imp_folio_factu`;
CREATE TABLE `imp_folio_factu` (
  `VAL_INI` int(99) NOT NULL,
  `VAL_FIN` int(99) NOT NULL,
  `VAL_ACTU` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imp_folio_factu`
--

/*!40000 ALTER TABLE `imp_folio_factu` DISABLE KEYS */;
/*!40000 ALTER TABLE `imp_folio_factu` ENABLE KEYS */;


--
-- Definition of table `imp_folio_guia`
--

DROP TABLE IF EXISTS `imp_folio_guia`;
CREATE TABLE `imp_folio_guia` (
  `VAL_INI` int(99) NOT NULL,
  `VAL_FIN` int(99) NOT NULL,
  `VAL_ACTU` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imp_folio_guia`
--

/*!40000 ALTER TABLE `imp_folio_guia` DISABLE KEYS */;
/*!40000 ALTER TABLE `imp_folio_guia` ENABLE KEYS */;


--
-- Definition of table `imp_folio_presu`
--

DROP TABLE IF EXISTS `imp_folio_presu`;
CREATE TABLE `imp_folio_presu` (
  `VAL_INI` int(99) NOT NULL,
  `VAL_FIN` int(99) NOT NULL,
  `VAL_ACTU` int(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imp_folio_presu`
--

/*!40000 ALTER TABLE `imp_folio_presu` DISABLE KEYS */;
INSERT INTO `imp_folio_presu` (`VAL_INI`,`VAL_FIN`,`VAL_ACTU`) VALUES 
 (1,9999999,8);
/*!40000 ALTER TABLE `imp_folio_presu` ENABLE KEYS */;


--
-- Definition of table `presupuesto`
--

DROP TABLE IF EXISTS `presupuesto`;
CREATE TABLE `presupuesto` (
  `COD_PRESU` int(99) NOT NULL,
  `NUM_PRESU` varchar(12) DEFAULT NULL,
  `COD_CLIE` int(99) NOT NULL,
  `MONEDA` char(1) NOT NULL DEFAULT '0',
  `FECHA` date NOT NULL,
  `INICIO` date DEFAULT NULL,
  `DIRECCION` varchar(250) DEFAULT NULL,
  `VIGENCIA` varchar(50) DEFAULT NULL,
  `COND_PAGO` char(1) DEFAULT NULL,
  `NRO_DIAS` int(11) DEFAULT NULL,
  `COND_PERSONALIZADO` char(1) DEFAULT NULL,
  `ESTADO` char(1) DEFAULT '0',
  `TOT_MONT_ORDE` decimal(10,2) NOT NULL,
  `TOT_MONT_IGV` decimal(10,2) NOT NULL,
  `TOT_FACT` decimal(10,2) NOT NULL,
  `COMENTARIO` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`COD_PRESU`),
  UNIQUE KEY `SYS_CT_13` (`NUM_PRESU`),
  KEY `SYS_FK_21` (`COD_CLIE`),
  CONSTRAINT `SYS_FK_21` FOREIGN KEY (`COD_CLIE`) REFERENCES `cliente` (`COD_CLIE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presupuesto`
--

/*!40000 ALTER TABLE `presupuesto` DISABLE KEYS */;
INSERT INTO `presupuesto` (`COD_PRESU`,`NUM_PRESU`,`COD_CLIE`,`MONEDA`,`FECHA`,`INICIO`,`DIRECCION`,`VIGENCIA`,`COND_PAGO`,`NRO_DIAS`,`COND_PERSONALIZADO`,`ESTADO`,`TOT_MONT_ORDE`,`TOT_MONT_IGV`,`TOT_FACT`,`COMENTARIO`) VALUES 
 (1,'05154',1,'0','2016-08-27','0000-00-00','av. santa cruz 970 - lima 18','0000-00-00','2',30,'','0','920.00','0.00','0.00',NULL),
 (2,'6',1,'0','2016-08-28','0000-00-00','av. santa cruz 970 - lima 18','0000-00-00','2',30,'','0','1462.00','0.00','0.00',NULL),
 (3,'7',1,'0','2016-08-01','0000-00-00','av. santa cruz 970 - lima 18','0000-00-00','2',30,'','0','136.00','0.00','0.00',NULL),
 (4,'8',1,'0','2016-08-02','0000-00-00','av. santa cruz 970 - lima 18','0000-00-00','2',95,'','0','136.00','0.00','0.00',NULL);
/*!40000 ALTER TABLE `presupuesto` ENABLE KEYS */;


--
-- Definition of table `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE `producto` (
  `CODIGO` int(99) NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `CANTIDAD` int(11) NOT NULL DEFAULT '0',
  `PRECIO_U` decimal(9,2) NOT NULL,
  PRIMARY KEY (`CODIGO`),
  UNIQUE KEY `SYS_CT_14` (`DESCRIPCION`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producto`
--

/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`CODIGO`,`DESCRIPCION`,`CANTIDAD`,`PRECIO_U`) VALUES 
 (1,'aa',12,'212.00');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;


--
-- Definition of table `transportista`
--

DROP TABLE IF EXISTS `transportista`;
CREATE TABLE `transportista` (
  `COD_TRANSP` int(99) NOT NULL,
  `COD_VEHI` int(11) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `APELLIDO` varchar(45) DEFAULT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `RUC` varchar(12) DEFAULT NULL,
  `DNI` varchar(12) DEFAULT NULL,
  `NRO_LICENCIA` varchar(12) DEFAULT NULL,
  `TELEFONO` varchar(10) DEFAULT NULL,
  `PLACA` varchar(45) DEFAULT NULL,
  `MARCA` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`COD_TRANSP`),
  UNIQUE KEY `SYS_CT_28` (`NOMBRE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transportista`
--

/*!40000 ALTER TABLE `transportista` DISABLE KEYS */;
INSERT INTO `transportista` (`COD_TRANSP`,`COD_VEHI`,`NOMBRE`,`APELLIDO`,`DIRECCION`,`RUC`,`DNI`,`NRO_LICENCIA`,`TELEFONO`,`PLACA`,`MARCA`) VALUES 
 (9,0,'Henry Pablo','Vega Ayala','Sector 8 mz m lote 13','10484296796','48429679','84228-668','955201758','XLS-956','Huinday');
/*!40000 ALTER TABLE `transportista` ENABLE KEYS */;


--
-- Definition of table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `COD_USUA` int(99) unsigned NOT NULL AUTO_INCREMENT,
  `NOM_USUA` varchar(60) DEFAULT NULL,
  `APE_USUA` varchar(60) DEFAULT NULL,
  `USE_USUA` varchar(20) DEFAULT NULL,
  `PAS_USUA` varchar(250) DEFAULT NULL,
  `EMA_USUA` varchar(50) DEFAULT NULL,
  `EST_USUA` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`COD_USUA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`COD_USUA`,`NOM_USUA`,`APE_USUA`,`USE_USUA`,`PAS_USUA`,`EMA_USUA`,`EST_USUA`) VALUES 
 (1,NULL,NULL,'admin','21232f297a57a5a743894a0e4a801fc3',NULL,NULL),
 (2,NULL,NULL,'','d41d8cd98f00b204e9800998ecf8427e',NULL,NULL),
 (3,NULL,NULL,'root','63a9f0ea7bb98050796b649e85481845',NULL,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


--
-- Definition of procedure `CREAR_DETAL_PRESU`
--

DROP PROCEDURE IF EXISTS `CREAR_DETAL_PRESU`;

DELIMITER $$

/*!50003 SET @TEMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `CREAR_DETAL_PRESU`(

    IN fila            INT,
    IN x_cod_presu     int(99),
    IN x_cod_presu_det int(99),
    IN x_cod_clien     int(99),
    IN x_NRO_UNID      INT(11),
    IN x_DES_LARG      VARCHAR(250),
    IN x_VAL_PREC      DECIMAL(10, 2),
    IN x_VAL_MONT_UNID DECIMAL(10, 2),
    IN x_NUM_PRESU     INT(99)
)
BEGIN

  IF fila = 0  THEN

    delete from detalle_presupuesto where COD_PRESU = x_cod_presu and COD_CLIE= x_cod_clien;

  END IF;

  INSERT INTO  detalle_presupuesto (
    COD_PRESU,
    COD_PRESU_DET, 
    COD_PRODUC,
    CANTIDAD,
    DESCRIPCION, 
    TOTAL, 
    COD_CLIE,
    PRECIO
  )

  VALUES (
    x_cod_presu,
    x_cod_presu_det,
    1,
    x_NRO_UNID,
    x_DES_LARG,
    x_VAL_PREC,
    x_cod_clien,
    x_VAL_MONT_UNID  
  );

  UPDATE imp_folio_presu
  SET VAL_ACTU = x_NUM_PRESU;
  
  END $$
/*!50003 SET SESSION SQL_MODE=@TEMP_SQL_MODE */  $$

DELIMITER ;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
