ALTER VIEW view_promocao_produto AS 
SELECT 
pr.id, 
pr.desconto, 
DATE_FORMAT(pr.data_inicio, '%d/%m/%Y') AS data_inicio, 
DATE_FORMAT(pr.data_fim, '%d/%m/%Y') AS data_fim, 
pr.id_produto, 
pr.situacao, 
p.nome AS nomeProduto, 
p.preco, 
p.quantidade, 
p.caminho_imagem, 
p.descricao 
FROM tbl_promocao AS pr 
INNER JOIN tbl_produto AS p ON pr.id_produto = p.id;

SELECT * FROM view_promocao_produto;