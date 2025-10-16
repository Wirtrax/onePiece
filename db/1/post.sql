
--
-- TABLE: post
-- 
--  

CREATE TABLE post (
  id tinyint NOT NULL ,
  post tinytext NOT NULL 
);

CREATE INDEX post_id_index  ON post(id);
ALTER TABLE post CHANGE id id tinyint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE post ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
