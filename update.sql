--
-- Structure for view `phone_details`
--

create or replace view phone_details as
select prefix.*, state.name as state_name, state.time_zone, country.name country_name, area.major_city
from  prefix, state, area, country
where  state.id = prefix.state_id
and area.code = prefix.area_code
and country.id = state.country_id