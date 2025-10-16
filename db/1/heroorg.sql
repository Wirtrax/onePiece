
--
-- TABLE: heroorg
-- 
--  

CREATE TABLE heroorg (
  id smallint NOT NULL ,
  heroId smallint NOT NULL ,
  orgId tinyint NOT NULL 
);

CREATE INDEX heroorg_id_index  ON heroorg(id);
ALTER TABLE heroorg CHANGE id id smallint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE heroorg ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
ALTER TABLE heroorg ADD CONSTRAINT  FOREIGN KEY (orgId) REFERENCES organization (id);
ALTER TABLE heroorg ADD CONSTRAINT  FOREIGN KEY (heroId) REFERENCES hero (id);
