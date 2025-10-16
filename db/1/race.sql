
--
-- TABLE: race
-- 
--  

CREATE TABLE race (
  id tinyint NOT NULL ,
  raceName tinytext NOT NULL 
);

CREATE INDEX race_id_index  ON race(id);
ALTER TABLE race CHANGE id id tinyint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE race ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
