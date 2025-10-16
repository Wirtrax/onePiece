
--
-- TABLE: pirateTeam
-- 
--  

CREATE TABLE pirateTeam (
  id smallint NOT NULL ,
  teamName tinytext NOT NULL ,
  discription mediumtext NOT NULL ,
  photo blob NOT NULL ,
  shipName tinytext NOT NULL ,
  overallReward bigint NOT NULL ,
  arkId tinyint NOT NULL 
);

CREATE INDEX pirateTeam_id_index  ON pirateTeam(id);
ALTER TABLE pirateTeam CHANGE id id smallint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE pirateTeam ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 

