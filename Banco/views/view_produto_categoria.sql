ALTER VIEW view_produto_categoria AS 
SELECT p.id AS id,
p.nome AS nome, 
p.preco AS preco,
p.descricao AS descricao,
p.quantidade AS quantidade,
p.caminho_imagem AS caminho_imagem,
p.situacao AS situacao,
p.id_subcategoria AS id_subcategoria,
s.nome AS subcategoria,
c.nome AS categoria
FROM tbl_produto AS p 
INNER JOIN tbl_subcategoria AS s ON p.id_subcategoria = s.id 
INNER JOIN tbl_categoria AS c ON s.id_categoria = c.id;

SELECT * FROM view_produto_categoria;