ALTER VIEW view_destaque_produto AS 
SELECT d.id AS id,
d.info_promo AS info_promo,
d.situacao AS situacao,
d.id_produto AS id_produto,
p.nome AS nome,
p.preco AS preco 
FROM tbl_destaque AS d 
INNER JOIN tbl_produto AS p on d.id_produto = p.id;

SELECT * FROM view_destaque_produto;