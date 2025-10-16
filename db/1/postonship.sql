
--
-- TABLE: postOnShip
-- 
--  

CREATE TABLE postOnShip (
  id tinyint NOT NULL ,
  postName tinytext NOT NULL 
);

CREATE INDEX postOnShip_id_index  ON postOnShip(id);
ALTER TABLE postOnShip CHANGE id id tinyint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE postOnShip ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
