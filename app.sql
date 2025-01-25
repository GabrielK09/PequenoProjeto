SELECT "t"."CONTROLE", "t"."BANDEIRACARTAO", "t"."CANCELADO", "t"."CODCLIENTE", "t"."CODCOMANDA", "t"."CODCOMANDAMEUSG", "t"."CODENDERECO", "t"."DFEENVIADOSITE", "t"."DATAHORAAGENDAMENTO", "t"."DATAHORACADASTRO", "t"."DISPONIVELRETIRADA", "t"."NUMEROMESA", "t"."PARCELAS", "t"."PRIMEIROVENCIMENTO", "t"."TIPOFRETE", "t"."TIPOPAGAMENTO", "t"."VALORDESCONTO", "t"."VALORFRETE", "t"."VALORPAGO"
FROM "TCOMANDAAPROVAR" AS "t"
WHERE ("t"."CODCOMANDA" IS NULL OR (CAST("t"."CODCOMANDA" AS BLOB SUB_TYPE TEXT) = CAST(_UTF8 X'' AS VARCHAR(1) CHARACTER SET UTF8))) AND ("t"."CANCELADO" = _UTF8 X'30')

SELECT "t"."CONTROLE", "t"."CANCELADO", "t"."CODCLIENTE", "t"."CODRESERVAMEUSG", "t"."DATAHORACADASTRO", "t"."DATARESERVA", "t"."ENVIADO", "t"."FINALIZADO", "t"."HORAINICIALRESERVA", "t"."HORAMAXIMACHEGADA", "t"."HORAPREVISAOCHEGADA", "t"."HORARESERVA", "t"."TOTALOCUPANTES"
FROM "TMESARESERVAAPROVAR" AS "t"
WHERE ("t"."ENVIADO" = _UTF8 X'30') AND ("t"."CANCELADO" = _UTF8 X'30')

SELECT "t"."CONTROLE", "t"."AGRUPAPRODCONFERENCIADEMESA", "t"."AGRUPARCOMANDA", "t"."AGRUPARITENSCONFERENCIAMESA", "t"."APARENCIA", "t"."APROVARAUTOPEDIDODELIVERY", "t"."ATIVARBALANCA", "t"."ATIVARPESAGEMRAPIDA", "t"."AUTOAPROVARCONSUMOLOCALMEUSG", "t"."AVISODEFALTADECONSUMO", "t"."BALANCAAOPDV", "t"."BALANCABITSDEDADOS", "t"."BALANCABITSDEPARADA", "t"."BALANCACONTROLEDEFLUXO", "t"."BALANCALEITURAAUTOMATICA", "t"."BALANCAPARIDADE", "t"."BALANCAPORTASERIAL", "t"."BALANCATAXADETRANSMISSAO", "t"."BARRASBUSCARNOESTOQUEPOR", "t"."BARRASDECIMAIS", "t"."BARRASIDENTIFICADOR", "t"."BARRASINICIODALEITURA", "t"."BARRASLER", "t"."BARRASQUANTIDADEDIGITOS", "t"."BORDAVALORMAIOR", "t"."BUSCAPADRAO", "t"."CAMINHOARQUIVOPAINEL", "t"."CODCONFIG", "t"."CODPRODUTOBUFFETKG", "t"."CODPRODUTOBUFFETLIVRE", "t"."CORFONTEPAINEL", "t"."EMITEAOFATURAR", "t"."ESTILOFONTEPAINEL", "t"."ESTILOPAINEL", "t"."EXIGIRIDENTIFICACAOMESA", "t"."FATURARAOGRAVAR", "t"."FONTEPAINEL", "t"."FRASEPADRAOPAINEL", "t"."GERARSENHAABERTURA", "t"."GRAVARNOPAGAMENTO", "t"."IMPRESSAOSIMPLIFICADA", "t"."IMPRESSORA", "t"."IMPRESSORABAR", "t"."IMPRESSORACOZINHA", "t"."IMPRESSORAPADRAOCONFERENCIA", "t"."IMPRIME2VIAS", "t"."IMPRIME2VIASMEUSG", "t"."IMPRIMEAPOSPESAR", "t"."IMPRIMEPEDIDOAOGRAVAR", "t"."IMPRIMEQTDEANTES", "t"."IMPRIMIRCONFERENCIADIRETA", "t"."LANCAITEMAUTOMATICONASELECAO", "t"."LANCAPRODUTOBUFFET", "t"."LIMITEDEVENDAPORMESA", "t"."MARGEMDIREITA", "t"."MARGEMESQUERDA", "t"."MARGEMINFERIOR", "t"."MARGEMSUPERIOR", "t"."MINUTOSMOSTRAAGENDADO", "t"."MODELODABOBINA", "t"."MOSTRAPREVIEW", "t"."MOSTRAINFCOZINHA", "t"."NOMEDAMAQUINA", "t"."OCULTARVALORMESA", "t"."OCULTARVALORTOTAL", "t"."PEDIDOESPACAMENTOPARARECORTE", "t"."PERMITEITENSOUTROCLIENTE", "t"."PORTADAIMPRESSORA", "t"."PORTADAIMPRESSORABAR", "t"."PRODUTOBUFFETKG", "t"."PRODUTOBUFFETLIVRE", "t"."QTDEPEDENTREGADOR", "t"."REINICIARSENHAEM", "t"."SABORVALORMAIOR", "t"."SENHAAOSELECIONARMESA", "t"."SENHASUPCOUVERT", "t"."SENHASUPDESCONTO", "t"."SENHASUPERVISOR", "t"."SENHASUPERVISORMARCARITEM", "t"."SENHASUPERVISORTRANSFERIRITENS", "t"."SENHASUPERVISORTRANSFERIRMESAS", "t"."SEPARARITENSIGUAISMOBILE", "t"."SINCRONIZAMAQUINA", "t"."SINCRONIZAMAQUINAMOBILE", "t"."SOLICITATIPOCONSUMO", "t"."STATUSPADRAO", "t"."SUBTRAIRPESOTARA", "t"."TAMANHOFONTEITENS", "t"."TAMANHOFONTEPAINEL", "t"."TARAPRATO", "t"."TAXADEENTREGA", "t"."TAXADESERVICOS", "t"."TAXADESERVICOENTREGA", "t"."TIMERBALANCA", "t"."TIPOIMPRESSAO", "t"."ULTIMABUSCADECLIENTES", "t"."ULTIMOCAMPOBUSCAESTOQUECOMANDA", "t"."USALOGIN", "t"."USUARIO", "t"."UTILIZARLOGINABERTURAMESA", "t"."UTILIZASELFSERVICE", "t"."VERSAOLOCAL", "t"."ZERARSENHAAOFINALDODIA"
FROM "TCONFIGCOMANDA" AS "t"
WHERE "t"."CODCONFIG" = CAST(? AS INTEGER)
ROWS (1)

SELECT "t"."CONTROLE", "t"."BAIRRO", "t"."CER", "t"."CNPJ", "t"."COOCF", "t"."COOCONFERENCIAMESA", "t"."COORG", "t"."CPF", "t"."CELULAR", "t"."CLIENTE", "t"."CODBARRAS", "t"."CODCLIENTE", "t"."CODCOUVERT", "t"."CODFUNCIONARIO", "t"."CONTROLEBASEMOBILE", "t"."CODPEDIDO", "t"."COMPLEMENTO", "t"."DATAABERTURA", "t"."DATAFECHAMENTO", "t"."DATAEHORAABERTURAORIGEM", "t"."DATAEHORACADASTRO", "t"."DATAHORAMOVIMENTOCOMANDA", "t"."DATAMOVIMENTO", "t"."ENDERECO", "t"."ENVIADOSGNAWEB", "t"."FUNCIONARIO", "t"."HORAABERTURA", "t"."HORAFECHAMENTO", "t"."IMEIMOBILE", "t"."INDICADOR", "t"."MD5", "t"."NUMERO", "t"."NUMEROCONTA", "t"."NUMEROECFCONFERENCIAMESA", "t"."NUMEROMESA", "t"."OBS", "t"."OCUPANTES", "t"."ORIGEMPEDIDO", "t"."PEDIDO", "t"."PERCCOMISSAO", "t"."SEMMOVIMENTO", "t"."SENHACOMANDA", "t"."SERIEECFCF", "t"."SERIEECFRG", "t"."STATUS", "t"."TAXASERVICO", "t"."TAXASERVICOENTREGA", "t"."TELEFONE", "t"."TIPOPEDIDO", "t"."VALORACRESCIMO", "t"."VALORCOMISSAO", "t"."VALORCOUVERT", "t"."VALORCREDITO", "t"."VALORDESCONTO", "t"."VALOROCUPANTE", "t"."VALORPRODUTOS", "t"."VALORTOTAL"
FROM "TCOMANDA" AS "t"
WHERE "t"."CONTROLE" = CAST(? AS INTEGER)
ROWS (1)


