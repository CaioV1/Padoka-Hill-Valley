DROP PROCEDURE sp_porcentagem_cliques;

DELIMITER !!

CREATE PROCEDURE sp_porcentagem_cliques()
BEGIN

	DECLARE _max_clique INT;

	SELECT SUM(clique) FROM tbl_produto INTO _max_clique;
	
    SELECT nome, TRUNCATE((clique * 100) / _max_clique, 2) AS clique FROM tbl_produto ORDER BY clique DESC LIMIT 10;

END!!

DELIMITER ;

CALL sp_porcentagem_cliques;