
--
-- TABLE: user
-- 
--  

CREATE TABLE user (
  id smallint NOT NULL ,
  login varchar(50) NOT NULL ,
  password varchar(60) NOT NULL ,
  nickname tinytext NOT NULL ,
  status tinyint(3) NOT NULL ,
  avatar blob NOT NULL 
);

CREATE INDEX user_id_index  ON user(id);
ALTER TABLE user CHANGE id id smallint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE user ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
