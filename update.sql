--
-- Structure for view `phone_details`
--

CREATE OR REPLACE VIEW `phone_details` AS  
select `prefix`.`id` AS `id`,`prefix`.`code` AS `code`,`prefix`.`county` AS `county`,`prefix`.`city` AS `city`,`prefix`.`usage_id` AS `usage_id`,
`prefix`.`company_id` AS `company_id`,`prefix`.`area_code` AS `area_code`,`prefix`.`p_usage` AS `p_usage`,`prefix`.`company` AS `company`,
`prefix`.`state_id` AS `state_id`,`country`.`name` AS `country_name`,`state`.`name` AS `state_name`,`state`.`time_zone` AS `time_zone`,
`area`.`major_city` AS `major_city` 
from (((`country` join `state`) join `area`) join `prefix`) 
where ((`country`.`id` = `state`.`id`) 
and (`state`.`id` = `prefix`.`state_id`) 
and (`area`.`code` = `prefix`.`area_code`)) ;
