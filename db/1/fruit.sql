
--
-- TABLE: fruit
-- 
--  

CREATE TABLE fruit (
  id smallint NOT NULL ,
  name varchar(50) NOT NULL ,
  type varchar(20) NOT NULL ,
  skill tinytext NOT NULL ,
  photo blob NOT NULL 
);

CREATE INDEX fruit_id_index  ON fruit(id);
ALTER TABLE fruit CHANGE id id smallint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE fruit ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
