
--
-- TABLE: heropost
-- 
--  

CREATE TABLE heropost (
  id smallint NOT NULL ,
  heroId smallint NOT NULL ,
  postOnShipId tinyint NOT NULL 
);

CREATE INDEX heropost_id_index  ON heropost(id);
ALTER TABLE heropost CHANGE id id smallint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE heropost ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
ALTER TABLE heropost ADD CONSTRAINT  FOREIGN KEY (heroId) REFERENCES hero (id);
ALTER TABLE heropost ADD CONSTRAINT  FOREIGN KEY (postOnShipId) REFERENCES postOnShip (id);
