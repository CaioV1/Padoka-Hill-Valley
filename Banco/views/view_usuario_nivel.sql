ALTER VIEW view_usuario_nivel AS 
SELECT u.id AS id,
u.login AS login,
u.senha AS senha,
u.nome AS nome,
u.email AS email,
u.telefone AS telefone,
u.celular AS celular,
u.id_nivel AS id_nivel,
n.nome AS nivel ,
u.situacao AS situacao
FROM tbl_usuario AS u INNER JOIN tbl_nivel AS n ON u.id_nivel = n.id;

SELECT * FROM view_usuario_nivel;