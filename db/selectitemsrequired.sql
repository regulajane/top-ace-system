/** select item needed for a service*/
SELECT distinct(inventoryname) FROM inventory
where
inventoryid IN
(SELECT 	
		 distinct (servicesinventory.inventoryid)
	FROM
		inventory 
		join models using (modelid)
		join joborders using (modelno)
		join servicelogs using (joborderid)
		join servicesinventory using (serviceid)
	where 
		joborderid = 201511042);
        
        
/** copy inventtoryid in inventory table then insert to servicesinventory table*/
INSERT INTO servicesinventory (inventoryid)  SELECT inventoryid FROM top_ace_db.inventory where inventoryname = 'Connecting Rod Bearing';

/** UPDATE serviceid in servicesinvetory table */
UPDATE servicesinventory SET serviceid = 6 where serviceid IS NULL;