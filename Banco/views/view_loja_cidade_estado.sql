ALTER VIEW view_loja_cidade_estado AS 
SELECT l.id AS id, 
l.logradouro AS logradouro, 
l.cep AS cep, 
l.latitude AS latitude, 
l.longitude AS longitude,
TIME_FORMAT(l.horario_abertura, '%Hh%i') AS horario_abertura,
TIME_FORMAT(l.horario_fechamento, '%Hh%i') AS horario_fechamento,
l.situacao AS situacao,
l.id_cidade AS id_cidade,
c.nome AS cidade,
c.id_estado AS id_estado,
e.nome AS estado,
e.sigla AS sigla
FROM tbl_loja AS l 
INNER JOIN tbl_cidade AS c ON l.id_cidade = c.id 
INNER JOIN tbl_estado AS e ON c.id_estado = e.id;

SELECT * FROM view_loja_cidade_estado;