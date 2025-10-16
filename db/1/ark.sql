
--
-- TABLE: ark
-- 
--  

CREATE TABLE ark (
  id tinyint NOT NULL ,
  nameArk tinytext NOT NULL ,
  discription mediumtext NOT NULL ,
  titlePhoto blob NOT NULL ,
  photo blob NOT NULL 
);

CREATE INDEX ark_id_index  ON ark(id);
ALTER TABLE ark CHANGE id id tinyint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE ark ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
