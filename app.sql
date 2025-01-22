CREATE TABLE `tvendanfe` (
	`CONTROLE` INT(11) NOT NULL AUTO_INCREMENT,
	`DATACADASTRO` DATE NOT NULL,
	`HORACADASTRO` TIME NOT NULL,
	`NOTA` INT(11) NULL DEFAULT NULL,
	`SERIE` CHAR(3) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`DATAEMISSAO` DATE NULL DEFAULT NULL,
	`DATASAIDAEMTRADA` DATE NULL DEFAULT NULL,
	`HORAENTRADASAIDA` TIME NULL DEFAULT NULL,
	`CANCELADA` CHAR(3) NOT NULL COLLATE 'utf8mb4_general_ci',
	`INUTILIZADA` CHAR(3) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`DENEGADA` CHAR(3) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CHAVEACESSO` VARCHAR(44) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`PROTOCOLO` VARCHAR(15) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`STATUSDEENVIO` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`IDENTIFICACAOAMBIENTE` VARCHAR(25) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CODOPERACAO` INT(11) NULL DEFAULT NULL,
	`NATUREZAOPERACAO` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`FINALIDADEOPERACAO` VARCHAR(25) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`TIPOOPERACAO` CHAR(1) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`TIPOEMISSAO` VARCHAR(25) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`FINALIDADEEMISSAO` VARCHAR(25) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CODFUNCIONARIO` INT(11) NULL DEFAULT NULL,
	`FUNCIONARIO` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CODVENDEDOR` INT(11) NULL DEFAULT NULL,
	`VENDEDOR` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`TIPODEVENDA` VARCHAR(40) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CODCLIENTE` INT(11) NULL DEFAULT NULL,
	`CODFORNECEDOR` INT(11) NULL DEFAULT NULL,
	`CNPJDESTINATARIO` VARCHAR(14) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CPFDESTINATARIO` VARCHAR(11) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`RAZAOSOCIALDESTINATARIO` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`ENDERECODESTINATARIO` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`NUMERODESTINATARIO` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`BAIRRODESTINATARIO` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CODCIDADEDESTINATARIO` INT(11) NULL DEFAULT NULL,
	`CIDADEDESTINATARIO` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CODIGOMUNICIPIO` VARCHAR(7) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`UFDESTINATARIO` VARCHAR(2) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`IEDESTINATARIO` VARCHAR(14) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CEPDESTINATARIO` VARCHAR(8) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`PAISDESTINATARIO` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`TELEFONEDESTINATARIO` VARCHAR(14) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`EMAILDESTINATARIO` VARCHAR(200) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CODTRANSPORTADORA` INT(11) NULL DEFAULT NULL,
	`CPFTRANSPORTADORA` VARCHAR(11) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CNPJTRANSPORTADORA` VARCHAR(14) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`IETRANSPORTADORA` VARCHAR(14) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`ENDERECOTRANSPORTADORA` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`UFTRANSPORTADORA` VARCHAR(2) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CIDADETRANSPORTADORA` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`ANTTTRANSPORTADORA` VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`PLACATRANSPORTADORA` VARCHAR(10) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`UFPLACA` VARCHAR(2) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`QUANTIDADE` DECIMAL(15,2) NULL DEFAULT NULL,
	`ESPECIE` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`MARCA` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`NUMERACAO` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`PESOBRUTO` DECIMAL(18,3) NULL DEFAULT NULL,
	`PESOLIQUIDO` DECIMAL(18,3) NULL DEFAULT NULL,
	`BASECALCULOICMS` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALICMS` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALBCSERVICO` DECIMAL(15,2) NULL DEFAULT NULL,
	`TOTALISS` DECIMAL(15,2) NULL DEFAULT NULL,
	`BASECALCULOICMSST` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALICMSST` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALFRETE` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALSEGURO` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALDESCONTO` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORDESCONTOITEM` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALII` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALIPI` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALPIS` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALPISRET` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALCOFINS` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALCOFINSRET` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALCSLLRET` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALBCIRRF` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALIRRF` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALBCPREVRET` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALPREVRET` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORICMSUFDEST` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORICMSUFREMET` DECIMAL(15,2) NULL DEFAULT NULL,
	`OUTRASDESPESAS` DECIMAL(15,2) NULL DEFAULT NULL,
	`TOTALCUSTOPRODUTO` DECIMAL(15,2) NULL DEFAULT NULL,
	`TOTALPRODUTOS` DECIMAL(15,2) NULL DEFAULT NULL,
	`TOTALSERVICO` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORTOTALNFE` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORENTRADA` DECIMAL(15,2) NULL DEFAULT NULL,
	`PERCIMPOSTOMEDIO` DECIMAL(15,2) NULL DEFAULT NULL,
	`VALORIMPOSTOMEDIO` DECIMAL(15,2) NULL DEFAULT NULL,
	`INFORMACOESCOMPLEMENTARES` VARCHAR(5000) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`INFORMACOESFISCO` VARCHAR(2000) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`RAZAOSOCIALTRANSPORTADORA` VARCHAR(60) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`MODELO` VARCHAR(10) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`FORMATOIMPRESSAO` VARCHAR(25) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CPFEMITENTE` VARCHAR(11) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`FATURADUPLICATA` BLOB NULL DEFAULT NULL,
	`CONTINGENCIA` CHAR(3) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`INDICADORPAGAMENTO` CHAR(1) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CODOS` INT(11) NULL DEFAULT NULL,
	`CODORCAMENTO` INT(11) NULL DEFAULT NULL,
	`CHECADO` CHAR(3) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CODCONDICIONAL` INT(11) NULL DEFAULT NULL,
	`UFEMBARQUE` VARCHAR(2) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`LOCALEMBARQUE` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CODCCFECF` INT(11) NULL DEFAULT NULL,
	`CODPEDIDOVENDA` INT(11) NULL DEFAULT NULL,
	`ESPECIEPAGAMENTO` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`INFORMACAOFISCAL` VARCHAR(2000) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`IDESTRANGEIRO` VARCHAR(20) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`STATUS` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`MODOFRETE` CHAR(1) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`AVISTA` CHAR(3) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`JAFATURADA` CHAR(3) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`SEQUENCIACCE` INT(11) NULL DEFAULT NULL,
	`CODIGOSTATUSCANCELAMENTO` CHAR(3) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`DATAEHORACANCELAMENTO` TIMESTAMP NULL DEFAULT NULL,
	`PROTOCOLOCANCELAMENTO` VARCHAR(15) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`JUSTIFICATIVA` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`MOTIVOCANCELAMENTO` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`INDICADOR` VARCHAR(100) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`MD5J1` VARCHAR(32) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`VALORTOTALFCPST` DECIMAL(15,2) NULL DEFAULT NULL,
	`NUMERONOTA` VARCHAR(9) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CODPRODUTO` INT(11) NULL DEFAULT NULL,
	`INDCONSUMIDORFINAL` CHAR(3) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CODNOTAMANUAL` INT(11) NULL DEFAULT NULL,
	`VERIFICADO` CHAR(1) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CNAE` VARCHAR(7) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`CNF` VARCHAR(10) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`NUMEROCOMPRA` VARCHAR(15) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`CONTROLE`) USING BTREE,
	INDEX `FK_TVENDANFE_CODCLIENTE` (`CODCLIENTE`) USING BTREE,
	INDEX `FK_TVENDANFE_CODOPERACAO` (`CODOPERACAO`) USING BTREE,
	INDEX `FK_TVENDANFE_CODTRANSPORTADORA` (`CODTRANSPORTADORA`) USING BTREE,
	INDEX `FK_TVENDANFE_CODVENDEDOR` (`CODVENDEDOR`) USING BTREE,
	INDEX `FK_TVENDANFE_CODPRODUTO` (`CODPRODUTO`) USING BTREE,
	INDEX `SERIE` (`SERIE`) USING BTREE,
	INDEX `NOTA` (`NOTA`) USING BTREE,
	INDEX `DENEGADA` (`DENEGADA`) USING BTREE,
	INDEX `CODNOTAMANUAL` (`CODNOTAMANUAL`) USING BTREE,
	INDEX `CODOS` (`CODOS`) USING BTREE,
	INDEX `CODORCAMENTO` (`CODORCAMENTO`) USING BTREE,
	INDEX `CODCONDICIONAL` (`CODCONDICIONAL`) USING BTREE,
	INDEX `CODCCFECF` (`CODCCFECF`) USING BTREE,
	INDEX `CODPEDIDOVENDA` (`CODPEDIDOVENDA`) USING BTREE,
	INDEX `CANCELADA` (`CANCELADA`) USING BTREE,
	INDEX `IDENTIFICACAOAMBIENTE` (`IDENTIFICACAOAMBIENTE`) USING BTREE,
	CONSTRAINT `FK_TVENDANFE_CODCLIENTE` FOREIGN KEY (`CODCLIENTE`) REFERENCES `tcliente` (`CONTROLE`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `FK_TVENDANFE_CODOPERACAO` FOREIGN KEY (`CODOPERACAO`) REFERENCES `toperacao` (`CONTROLE`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `FK_TVENDANFE_CODTRANSPORTADORA` FOREIGN KEY (`CODTRANSPORTADORA`) REFERENCES `ttransportadora` (`CONTROLE`) ON UPDATE NO ACTION ON DELETE NO ACTION,
	CONSTRAINT `FK_TVENDANFE_CODVENDEDOR` FOREIGN KEY (`CODVENDEDOR`) REFERENCES `tfuncionario` (`CONTROLE`) ON UPDATE NO ACTION ON DELETE NO ACTION
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=437
;
