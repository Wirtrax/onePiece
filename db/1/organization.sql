
--
-- TABLE: organization
-- 
--  

CREATE TABLE organization (
  id tinyint NOT NULL ,
  orgName tinytext NOT NULL 
);

CREATE INDEX organization_id_index  ON organization(id);
ALTER TABLE organization CHANGE id id tinyint   NOT NULL AUTO_INCREMENT ;

-- 
ALTER TABLE organization ADD CONSTRAINT new_unique_constraint PRIMARY KEY (id);

-- CHECK Constraints are not supported in Mysql (as of version 5.x)
-- But it'll parse the statements without error 
