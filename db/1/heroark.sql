
--
-- TABLE: heroark
-- 
--  

CREATE TABLE heroark (
  id smallint NOT NULL ,
  arkId tinyint NOT NULL ,
  heroId smallint NOT NULL 
);

CREATE INDEX heroark_id_index  ON heroark(id);
ALTER TABLE heroark CHANGE id id smallint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE heroark ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
ALTER TABLE heroark ADD CONSTRAINT  FOREIGN KEY (arkId) REFERENCES ark (id);
ALTER TABLE heroark ADD CONSTRAINT  FOREIGN KEY (heroId) REFERENCES hero (id);
