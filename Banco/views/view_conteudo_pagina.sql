ALTER VIEW view_conteudo_pagina AS 
SELECT 
c.id AS id, 
c.titulo AS titulo, 
c.caminho_imagem AS caminho_imagem, 
c.texto AS texto, 
c.situacao AS situacao,
c.id_pagina AS id_pagina, 
p.nome AS nome 
FROM tbl_conteudo AS c 
INNER JOIN tbl_pagina AS p ON c.id_pagina = p.id;

SELECT * FROM view_conteudo_pagina;