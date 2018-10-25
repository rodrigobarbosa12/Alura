SELECT * FROM mydb.detalhe_resumo dr
LEFT JOIN mydb.tipo_transacao tt ON dr.tipo_transacao = tt.id;


SELECT numero_cartao, count(numero_cartao) as total
FROM kensei.detalhe_comprovante
GROUP BY numero_cartao
ORDER BY total DESC;


SELECT *
FROM kensei.detalhe_comprovante
WHERE numero_cartao = '655000******4591'
ORDER BY data_transacao

SELECT arquivo, count(arquivo) as total FROM conciliadora.arquivos group by arquivo;


select * from mydb.header join detalhe_resumo on header.id = detalhe_resumo.header_id;

SELECT conteudo, count(conteudo) as total FROM conciliadora.arquivos GROUP BY conteudo ORDER BY total DESC;