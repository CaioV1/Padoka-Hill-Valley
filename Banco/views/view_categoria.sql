ALTER VIEW view_categoria AS 
SELECT 
s.id AS id, 
s.nome AS nome, 
s.id_categoria AS id_categoria, 
s.situacao AS situacao, 
c.nome AS categoria 
FROM tbl_subcategoria AS s 
INNER JOIN tbl_categoria AS c ON s.id_categoria = c.id ORDER BY id;

SELECT * FROM view_categoria;