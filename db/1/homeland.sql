
--
-- TABLE: homeLand
-- 
--  

CREATE TABLE homeLand (
  id tinyint NOT NULL ,
  kingdom varchar(60) NOT NULL 
);

CREATE INDEX homeLand_id_index  ON homeLand(id);
ALTER TABLE homeLand CHANGE id id tinyint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE homeLand ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
