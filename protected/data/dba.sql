-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB


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

CREATE DATABASE /*!32312 IF NOT EXISTS*/ branusac;
USE branusac;

--
-- Table structure for table `branusac`.`bas_param`
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
  `VALOR` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`COD_PARA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branusac`.`bas_param`
--

/*!40000 ALTER TABLE `bas_param` DISABLE KEYS */;
INSERT INTO `bas_param` (`COD_PARA`,`VAL_PARA`,`DES_PARA`,`USU_DIGI`,`FEC_DIGI`,`USU_MODI`,`FEC_MODI`,`VALOR`) VALUES 
 ('01','18','IGV','ADMIN','2016-06-21 00:00:00','admin','2016-09-01 16:58:35','1');
/*!40000 ALTER TABLE `bas_param` ENABLE KEYS */;


--
-- Table structure for table `branusac`.`cliente`
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
-- Dumping data for table `branusac`.`cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`COD_CLIE`,`NOMBRE`,`RUC`,`DNI`,`DIRECCION`,`TELEFONO2`,`CORREO_E`,`TELEFONO`,`FAX`) VALUES 
 (1,'adidas chile ltda suc  del perú','20347100316',48429679,'av. santa cruz 970 - lima 18',955201758,'','2802886',''),
 (2,'Empresa Consorcio Volvo','893847264',NULL,'Sector 8 mz m lote 13 Villa el Salvadoor',955201758,'ingenierovega@hotmail.com','955201758','');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Table structure for table `branusac`.`detalle_factura`
--

DROP TABLE IF EXISTS `detalle_factura`;
CREATE TABLE `detalle_factura` (
  `COD_FACT` int(99) NOT NULL,
  `COD_FACT_DET` int(99) NOT NULL,
  `COD_PRODUC` int(11) NOT NULL,
  `LINEA` int(11) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL,
  `TOTAL` decimal(9,2) DEFAULT NULL,
  `COD_CLIE` int(11) NOT NULL,
  `PRECIO` decimal(10,2) NOT NULL,
  KEY `fk_detalle_factura_factura1_idx` (`COD_FACT`),
  KEY `fk_detalle_factura_t_stock1_idx` (`COD_PRODUC`),
  CONSTRAINT `fk_detalle_factura_factura1` FOREIGN KEY (`COD_FACT`) REFERENCES `factura` (`COD_FACT`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branusac`.`detalle_factura`
--

/*!40000 ALTER TABLE `detalle_factura` DISABLE KEYS */;
INSERT INTO `detalle_factura` (`COD_FACT`,`COD_FACT_DET`,`COD_PRODUC`,`LINEA`,`CANTIDAD`,`DESCRIPCION`,`TOTAL`,`COD_CLIE`,`PRECIO`) VALUES 
 (6,6,1,NULL,34,'pan3','1156.00',1,'34.00'),
 (6,6,1,NULL,34,'pan','102.00',1,'3.00'),
 (7,7,1,NULL,34,'panwdw','11662.00',1,'343.00'),
 (7,7,1,NULL,34,'pan','1156.00',1,'34.00'),
 (7,7,1,NULL,34,'pans','102.00',1,'3.00'),
 (7,7,1,NULL,334,'pas','1002.00',1,'3.00'),
 (3,3,1,NULL,34,'papel A4','1156.00',1,'34.00'),
 (4,4,1,NULL,34,'ososo','1156.00',1,'34.00'),
 (5,3,1,NULL,34,'x2','1156.00',1,'34.00'),
 (5,3,1,NULL,34,'x1','136.00',1,'4.00'),
 (5,3,1,NULL,4,'x3','12.00',1,'3.00'),
 (8,6,1,NULL,43,'papel A4','1462.00',1,'34.00'),
 (9,7,1,NULL,2,'as','4.00',1,'2.00'),
 (10,8,1,NULL,23,'qw','529.00',1,'23.00'),
 (11,9,1,NULL,23,'23','736.00',1,'32.00'),
 (12,10,1,NULL,23,'23','529.00',1,'23.00'),
 (13,11,1,NULL,45,'45','2025.00',1,'45.00'),
 (13,11,1,NULL,45,'45','2025.00',1,'45.00'),
 (14,12,1,NULL,34,'pn','1156.00',2,'34.00');
/*!40000 ALTER TABLE `detalle_factura` ENABLE KEYS */;


--
-- Table structure for table `branusac`.`detalle_guia`
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
-- Dumping data for table `branusac`.`detalle_guia`
--

/*!40000 ALTER TABLE `detalle_guia` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_guia` ENABLE KEYS */;


--
-- Table structure for table `branusac`.`detalle_presupuesto`
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
-- Dumping data for table `branusac`.`detalle_presupuesto`
--

/*!40000 ALTER TABLE `detalle_presupuesto` DISABLE KEYS */;
INSERT INTO `detalle_presupuesto` (`COD_PRESU`,`COD_PRESU_DET`,`COD_PRODUC`,`LINEA`,`CANTIDAD`,`DESCRIPCION`,`TOTAL`,`COD_CLIE`,`PRECIO`) VALUES 
 (1,1,1,NULL,3,'3','9.00',1,'3.00'),
 (4,4,1,NULL,9,'9','81.00',1,'9.00'),
 (3,4,1,NULL,9,'9','81.00',1,'9.00'),
 (3,4,1,NULL,9,'9','81.00',1,'9.00'),
 (3,4,1,NULL,9,'9','891.00',1,'99.00'),
 (3,4,1,NULL,9,'9','81.00',1,'9.00'),
 (2,0,1,NULL,5,'5','25.00',1,'5.00'),
 (5,1,1,NULL,31233,'3','93699.00',1,'3.00'),
 (5,1,1,NULL,3123,'3','103059.00',1,'33.00'),
 (5,1,1,NULL,33,'3','99.00',1,'3.00'),
 (6,1,1,NULL,34,'pan','1156.00',1,'34.00'),
 (6,1,1,NULL,34,'pan','1156.00',1,'34.00'),
 (6,1,1,NULL,34,'paneri','1156.00',1,'34.00'),
 (7,1,1,NULL,23,'Hoja','46.00',1,'2.00');
/*!40000 ALTER TABLE `detalle_presupuesto` ENABLE KEYS */;


--
-- Table structure for table `branusac`.`factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `COD_FACT` int(99) NOT NULL DEFAULT '0',
  `COD_PRESU` int(99) DEFAULT NULL,
  `NUM_FACT` varchar(7) NOT NULL,
  `MONEDA` char(1) DEFAULT '0',
  `FECHA` date DEFAULT NULL,
  `CLIENTE` varchar(150) NOT NULL,
  `RUC` varchar(20) NOT NULL,
  `OC` varchar(20) DEFAULT NULL,
  `COND_PAGO` char(1) DEFAULT NULL,
  `NRO_DIAS` int(11) DEFAULT NULL,
  `COND_PERSONALIZADO` varchar(100) DEFAULT NULL,
  `TOT_MONT_ORDE` decimal(10,2) DEFAULT NULL,
  `TOT_MONT_IGV` decimal(10,2) DEFAULT NULL,
  `TOT_FACT` decimal(10,2) DEFAULT NULL,
  `FECHA_CANC` date DEFAULT NULL,
  `ESTADO` char(1) DEFAULT '0',
  `COD_GUIA` int(99) DEFAULT NULL,
  PRIMARY KEY (`COD_FACT`),
  UNIQUE KEY `SYS_CT_12` (`NUM_FACT`),
  KEY `fk_factura_presupuesto1` (`COD_PRESU`),
  CONSTRAINT `fk_factura_presupuesto1` FOREIGN KEY (`COD_PRESU`) REFERENCES `presupuesto` (`COD_PRESU`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branusac`.`factura`
--

/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` (`COD_FACT`,`COD_PRESU`,`NUM_FACT`,`MONEDA`,`FECHA`,`CLIENTE`,`RUC`,`OC`,`COND_PAGO`,`NRO_DIAS`,`COND_PERSONALIZADO`,`TOT_MONT_ORDE`,`TOT_MONT_IGV`,`TOT_FACT`,`FECHA_CANC`,`ESTADO`,`COD_GUIA`) VALUES 
 (3,NULL,'7655','0','2016-09-05','1','20347100316','','2',30,'','1156.00','208.08','1364.08','0000-00-00','0',NULL),
 (4,NULL,'7656','0','2016-09-06','1','20347100316','','2',30,'','1156.00','208.08','1364.08','2016-09-30','0',NULL),
 (5,NULL,'7657','0','0009-06-06','1','20347100316','','2',30,'','1304.00','234.72','1538.72','2016-09-16','0',NULL),
 (6,NULL,'7653','0','2016-09-04','1','20347100316','34','2',30,'34','1258.00','226.44','1484.44','0000-00-00',NULL,9897663),
 (7,NULL,'7654','0','2016-09-03','1','20347100316','','3',45,'','13922.00','2505.96','16427.96','0000-00-00',NULL,NULL),
 (8,NULL,'7658','1','2016-09-16','1','20347100316','','2',30,'','1462.00','263.16','1725.16','0000-00-00','0',NULL),
 (9,NULL,'7659','0','2016-09-16','1','20347100316','','3',45,'','4.00','0.72','4.72','0000-00-00','0',NULL),
 (10,NULL,'7660','0','2016-09-16','1','20347100316','','1',NULL,'','529.00','95.22','624.22','0000-00-00','0',NULL);
INSERT INTO `factura` (`COD_FACT`,`COD_PRESU`,`NUM_FACT`,`MONEDA`,`FECHA`,`CLIENTE`,`RUC`,`OC`,`COND_PAGO`,`NRO_DIAS`,`COND_PERSONALIZADO`,`TOT_MONT_ORDE`,`TOT_MONT_IGV`,`TOT_FACT`,`FECHA_CANC`,`ESTADO`,`COD_GUIA`) VALUES 
 (11,NULL,'7661','0','2016-09-16','1','20347100316','','4',60,'','736.00','132.48','868.48','0000-00-00','0',NULL),
 (12,NULL,'7662','0','2016-09-16','1','20347100316','','3',45,'','529.00','95.22','624.22','0000-00-00','0',NULL),
 (13,NULL,'7663','0','2016-09-16','1','20347100316','','2',30,'','4050.00','729.00','4779.00','0000-00-00','0',NULL),
 (14,NULL,'7664','0','2016-09-16','2','893847264','','2',30,'','1156.00','208.08','1364.08','0000-00-00','0',NULL);
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;


--
-- Table structure for table `branusac`.`folio`
--

DROP TABLE IF EXISTS `folio`;
CREATE TABLE `folio` (
  `VAL_INI` int(99) NOT NULL DEFAULT '0',
  `VAL_FIN` int(99) NOT NULL,
  `VAL_ACTU` int(99) NOT NULL,
  `VAL_LLAVE` int(255) unsigned NOT NULL DEFAULT '0',
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL,
  `VALOR` varchar(1) DEFAULT NULL,
  `USUARIO` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`VAL_LLAVE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branusac`.`folio`
--

/*!40000 ALTER TABLE `folio` DISABLE KEYS */;
INSERT INTO `folio` (`VAL_INI`,`VAL_FIN`,`VAL_ACTU`,`VAL_LLAVE`,`DESCRIPCION`,`FECHA`,`VALOR`,`USUARIO`) VALUES 
 (1,9999999,5183,0,'N° de Presupuesto','2016-09-19 14:50:46','2','admin'),
 (1,9999999,983,1,'N° de Guia','2016-08-31 17:57:25','3','admin'),
 (1,9999999,7665,2,'N° de Factura           ','2016-09-05 18:16:40','4','admin');
/*!40000 ALTER TABLE `folio` ENABLE KEYS */;


--
-- Table structure for table `branusac`.`guia`
--

DROP TABLE IF EXISTS `guia`;
CREATE TABLE `guia` (
  `COD_GUIA` int(99) NOT NULL,
  `COD_FACT` int(99) NOT NULL,
  `NUM_GUIA` varchar(3) DEFAULT NULL,
  `DOMICILIO` varchar(120) DEFAULT NULL,
  `RUC` varchar(20) DEFAULT NULL,
  `OC` varchar(20) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `TRANS_CODIGO` int(99) NOT NULL,
  PRIMARY KEY (`COD_GUIA`),
  UNIQUE KEY `SYS_CT_38` (`NUM_GUIA`),
  KEY `SYS_FK_40` (`TRANS_CODIGO`),
  KEY `fk_guia_factura1` (`COD_FACT`),
  CONSTRAINT `SYS_FK_40` FOREIGN KEY (`TRANS_CODIGO`) REFERENCES `transportista` (`COD_TRANSP`),
  CONSTRAINT `fk_guia_factura1` FOREIGN KEY (`COD_FACT`) REFERENCES `factura` (`COD_FACT`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branusac`.`guia`
--

/*!40000 ALTER TABLE `guia` DISABLE KEYS */;
/*!40000 ALTER TABLE `guia` ENABLE KEYS */;


--
-- Table structure for table `branusac`.`presupuesto`
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
-- Dumping data for table `branusac`.`presupuesto`
--

/*!40000 ALTER TABLE `presupuesto` DISABLE KEYS */;
INSERT INTO `presupuesto` (`COD_PRESU`,`NUM_PRESU`,`COD_CLIE`,`MONEDA`,`FECHA`,`INICIO`,`DIRECCION`,`VIGENCIA`,`COND_PAGO`,`NRO_DIAS`,`COND_PERSONALIZADO`,`ESTADO`,`TOT_MONT_ORDE`,`TOT_MONT_IGV`,`TOT_FACT`,`COMENTARIO`) VALUES 
 (1,'5176',1,'0','2016-08-18','0000-00-00','av. santa cruz 970 - lima 18','3','2',30,'','0','9.00','0.00','0.00',''),
 (2,'5177',1,'0','2016-08-20','0000-00-00','av. santa cruz 970 - lima 18','5','2',30,'','0','25.00','0.00','0.00','5'),
 (3,'5178',1,'0','2016-08-31','0000-00-00','av. santa cruz 970 - lima 18','23','2',30,'','0','1134.00','0.00','0.00',''),
 (4,'5179',1,'0','2016-08-31','0000-00-00','av. santa cruz 970 - lima 18','23','3',45,'','0','81.00','0.00','0.00','23'),
 (5,'5180',1,'0','2016-09-01','0000-00-00','av. santa cruz 970 - lima 18','3','3',45,'3','0','196857.00','0.00','0.00','3'),
 (6,'5181',1,'0','2009-03-16','0000-00-00','av. santa cruz 970 - lima 18','23','2',30,'','0','3468.00','0.00','0.00',''),
 (7,'5182',1,'0','2016-09-06','0000-00-00','av. santa cruz 970 - lima 18','10','2',30,'','0','46.00','0.00','0.00','');
/*!40000 ALTER TABLE `presupuesto` ENABLE KEYS */;


--
-- Table structure for table `branusac`.`producto`
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
-- Dumping data for table `branusac`.`producto`
--

/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` (`CODIGO`,`DESCRIPCION`,`CANTIDAD`,`PRECIO_U`) VALUES 
 (1,'aa',12,'212.00');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;


--
-- Table structure for table `branusac`.`transportista`
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
-- Dumping data for table `branusac`.`transportista`
--

/*!40000 ALTER TABLE `transportista` DISABLE KEYS */;
INSERT INTO `transportista` (`COD_TRANSP`,`COD_VEHI`,`NOMBRE`,`APELLIDO`,`DIRECCION`,`RUC`,`DNI`,`NRO_LICENCIA`,`TELEFONO`,`PLACA`,`MARCA`) VALUES 
 (9,0,'Henry Pablo','Vega Ayala','Sector 8 mz m lote 13','10484296796','48429679','84228-668','955201758','XLS-956','Huinday');
/*!40000 ALTER TABLE `transportista` ENABLE KEYS */;


--
-- Table structure for table `branusac`.`usuario`
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
-- Dumping data for table `branusac`.`usuario`
--

/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`COD_USUA`,`NOM_USUA`,`APE_USUA`,`USE_USUA`,`PAS_USUA`,`EMA_USUA`,`EST_USUA`) VALUES 
 (1,NULL,NULL,'admin','21232f297a57a5a743894a0e4a801fc3',NULL,NULL),
 (2,NULL,NULL,'','d41d8cd98f00b204e9800998ecf8427e',NULL,NULL),
 (3,NULL,NULL,'root','63a9f0ea7bb98050796b649e85481845',NULL,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


--
-- Procedure `branusac`.`ACTUA_DETAL_FACTU`
--

DROP PROCEDURE IF EXISTS `ACTUA_DETAL_FACTU`;
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUA_DETAL_FACTU`(

  IN fila            INT,
  IN x_cod_factu     int(99),
  IN x_cod_factu_det int(99),
  IN x_cod_clien     int(99),
  IN x_NRO_UNID      INT(11),
  IN x_DES_LARG      VARCHAR(250),
  IN x_VAL_PREC      DECIMAL(10, 2),
  IN x_VAL_MONT_UNID DECIMAL(10, 2)
)
BEGIN

  IF fila = 0  THEN

    delete FROM detalle_factura
    WHERE COD_FACT = x_cod_factu;

  END IF;

  INSERT INTO  detalle_factura (
    COD_FACT,
    COD_FACT_DET,
    COD_PRODUC,
    CANTIDAD,
    DESCRIPCION,
    TOTAL,
    COD_CLIE,
    PRECIO
  )

  VALUES (
    x_cod_factu,
    x_cod_factu_det,
    1,
    x_NRO_UNID,
    x_DES_LARG,
    x_VAL_MONT_UNID, 
    x_cod_clien,
    x_VAL_PREC
  );

END $$

DELIMITER ;

--
-- Procedure `branusac`.`ACTUA_DETAL_PRESU`
--

DROP PROCEDURE IF EXISTS `ACTUA_DETAL_PRESU`;
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUA_DETAL_PRESU`(

  IN fila            INT,
  IN x_cod_presu     int(99),
  IN x_cod_presu_det int(99),
  IN x_cod_clien     int(99),
  IN x_NRO_UNID      INT(11),
  IN x_DES_LARG      VARCHAR(250),
  IN x_VAL_PREC      DECIMAL(10, 2),
  IN x_VAL_MONT_UNID DECIMAL(10, 2)
)
BEGIN

  IF fila = 0  THEN

    delete FROM detalle_presupuesto
    WHERE COD_PRESU = x_cod_presu;

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
    x_VAL_MONT_UNID, 
    x_cod_clien,
    x_VAL_PREC
  );

END $$

DELIMITER ;

--
-- Procedure `branusac`.`AUDITORIA`
--

DROP PROCEDURE IF EXISTS `AUDITORIA`;
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AUDITORIA`(

  IN X_USUARIO VARCHAR(100),
  IN X_VALOR   INT
)
BEGIN

    CASE X_VALOR

      WHEN 1
      THEN
        UPDATE bas_param
        SET USU_MODI = X_USUARIO,
          FEC_MODI   = NOW();

      WHEN 2
      THEN
        UPDATE folio
        SET USUARIO = X_USUARIO,
          FECHA   = NOW()
      where VAL_LLAVE = 0;

      WHEN 3
      THEN
        UPDATE folio
        SET USUARIO = X_USUARIO,
          FECHA   = NOW()
        where VAL_LLAVE = 1;

      WHEN 4
      THEN
        UPDATE folio
        SET USUARIO = X_USUARIO,
          FECHA   = NOW()
        where VAL_LLAVE = 2;

      END CASE;
    END $$

DELIMITER ;

--
-- Procedure `branusac`.`CREAR_DETAL_FACTU`
--

DROP PROCEDURE IF EXISTS `CREAR_DETAL_FACTU`;
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CREAR_DETAL_FACTU`(

  IN fila            INT,
  IN x_cod_factu     int(99),
  IN x_cod_factu_det int(99),
  IN x_cod_clien     int(99),
  IN x_NRO_UNID      INT(11),
  IN x_DES_LARG      VARCHAR(250),
  IN x_VAL_PREC      DECIMAL(10, 2),
  IN x_VAL_MONT_UNID DECIMAL(10, 2)
)
BEGIN

    IF fila = 0  THEN

      delete from detalle_factura where COD_FACT = x_cod_factu and COD_CLIE = x_cod_clien;

      UPDATE folio
      SET VAL_ACTU = (VAL_ACTU+1)
      where VAL_LLAVE = 2;
      
      UPDATE factura
      SET FECHA = now()
      WHERE CLIENTE = x_cod_clien and COD_FACT = x_cod_factu;

    END IF;

    INSERT INTO  detalle_factura (
      COD_FACT,
      COD_FACT_DET,
      COD_PRODUC,
      CANTIDAD,
      DESCRIPCION,
      TOTAL,
      COD_CLIE,
      PRECIO
    )

    VALUES (
      x_cod_factu,
      x_cod_factu_det,
      1,
      x_NRO_UNID,
      x_DES_LARG,
      x_VAL_MONT_UNID,
      x_cod_clien,
      x_VAL_PREC
    );

  END $$

DELIMITER ;

--
-- Procedure `branusac`.`CREAR_DETAL_PRESU`
--

DROP PROCEDURE IF EXISTS `CREAR_DETAL_PRESU`;
DELIMITER $$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CREAR_DETAL_PRESU`(

  IN fila            INT,
  IN x_cod_presu     int(99),
  IN x_cod_presu_det int(99),
  IN x_cod_clien     int(99),
  IN x_NRO_UNID      INT(11),
  IN x_DES_LARG      VARCHAR(250),
  IN x_VAL_PREC      DECIMAL(10, 2),
  IN x_VAL_MONT_UNID DECIMAL(10, 2)
)
BEGIN

    IF fila = 0  THEN

      delete from detalle_presupuesto where COD_PRESU = x_cod_presu and COD_CLIE= x_cod_clien;

      UPDATE folio
      SET VAL_ACTU = (VAL_ACTU+1)
      where VAL_LLAVE = 0;

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
    x_VAL_MONT_UNID,
    x_cod_clien,
    x_VAL_PREC
  );

  END $$

DELIMITER ;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
