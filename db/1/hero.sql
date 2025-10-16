
--
-- TABLE: hero
-- 
--  

CREATE TABLE hero (
  id smallint NOT NULL ,
  devilFruitId SMALLINT NOT NULL ,
  name varchar(30) NOT NULL ,
  discription mediumtext NOT NULL ,
  skill mediumtext NOT NULL ,
  nickname TINYTEXT NOT NULL ,
  reward bigint NOT NULL ,
  homeLandId TINYINT NOT NULL ,
  postId TINYINT NOT NULL ,
  raceId TINYINT NOT NULL ,
  teamId SMALLINT NOT NULL ,
  photo blob NOT NULL 
);

CREATE INDEX hero_id_index  ON hero(id);
ALTER TABLE hero CHANGE id id smallint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE hero ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
ALTER TABLE hero ADD CONSTRAINT  FOREIGN KEY (raceId) REFERENCES race (id);
ALTER TABLE hero ADD CONSTRAINT  FOREIGN KEY (teamId) REFERENCES pirateTeam (id);
ALTER TABLE hero ADD CONSTRAINT  FOREIGN KEY (postId) REFERENCES post (id);
ALTER TABLE hero ADD CONSTRAINT  FOREIGN KEY (devilFruitId) REFERENCES fruit (id);
ALTER TABLE hero ADD CONSTRAINT  FOREIGN KEY (homeLandId) REFERENCES homeLand (id);
