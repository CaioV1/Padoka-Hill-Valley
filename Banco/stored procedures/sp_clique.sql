DROP PROCEDURE sp_clique;

DELIMITER !!

CREATE PROCEDURE sp_clique(IN _id INT)
BEGIN

	DECLARE _clique INT;

	SELECT clique FROM tbl_produto WHERE id = _id INTO _clique;
    
    IF _clique IS NULL THEN
		
        SET _clique = 1;
        
	ELSE 
    
		SET _clique = _clique + 1;
        
	END IF;
    
    UPDATE tbl_produto SET clique = _clique WHERE id = _id;

END!!

DELIMITER ;

CALL sp_clique(6);

SELECT * FROM db_padaria.tbl_produto;