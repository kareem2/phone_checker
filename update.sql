--
-- Structure for view `phone_details`
--

create or replace view phone_details as
select prefix.*, state.name as state_name, state.time_zone, country.name country_name, area.major_city
from  prefix, state, area, country
where  state.id = prefix.state_id
and area.code = prefix.area_code
and country.id = state.country_id;


create or replace view comments as 
select comment.*, call_type.name as call_type
from comment, call_type
where comment.call_type_id = call_type.id;


INSERT INTO `call_type` (`id`, `name`) VALUES
(1, 'Unknown'),
(2, 'Scam'),
(3, 'Telemarketer'),
(4, 'Harassment'),
(5, 'Survey'),
(6, 'Political Call'),
(7, 'Spam'),
(8, 'Debt Collector'),
(9, 'Prank Call'),
(10, 'Positive');
COMMIT;

create or replace view areacodes AS
SELECT area.state_id, state.name state_name, state.time_zone, area.code, area.major_city, country.name country_name
from area, state, country
where area.state_id = state.id
and country.id = state.country_id;

ALTER TABLE `comment` ADD `prefix_id` INT NOT NULL AFTER `created_at`;

create or replace view states_vw as
select `state`.`id` AS `state_id`,`state`.`name` AS `state_name`,`state`.`time_zone` AS `time_zone`,
`country`.`id` AS `country_id`,`country`.`name` AS `country_name` 
from (`state` join `country`) 
where (`state`.`country_id` = `country`.`id`);	

CREATE or replace VIEW `prefixes`  AS  
select `prefix`.`id` AS `id`,`prefix`.`code` AS `code`,`prefix`.`county` AS `county`,`prefix`.`city` AS `city`,
`prefix`.`usage_id` AS `usage_id`,`prefix`.`company_id` AS `company_id`,`prefix`.`area_code` AS `area_code`,`prefix`.`p_usage` AS `p_usage`,
`prefix`.`company` AS `company`,`prefix`.`state_id` AS `state_id`,`state`.`time_zone` AS `time_zone`,`state`.`name` AS `state_name`,
`area`.`major_city` AS `major_city`,`country`.`name` AS `country_name` 
from (((`prefix` join `state`) join `area`) join `country`) 
where ((`prefix`.`state_id` = `state`.`id`) and (`prefix`.`area_code` = `area`.`code`) and (`state`.`country_id` = `country`.`id`));

CREATE TABLE IF NOT EXISTS `cache_items` (
  `item_id` varbinary(255) NOT NULL,
  `item_data` mediumblob NOT NULL,
  `item_lifetime` int(10) UNSIGNED DEFAULT NULL,
  `item_time` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
