/* create table sampleusers (
	fid BIGINT NOT NULL PRIMARY KEY,
	access_token VARCHAR(255) NOT NULL
		);

 */
create table samplescheduled_tasks (
	fid BIGINT NOT NULL,
	message TEXT NOT NULL,
	month INT NOT NULL,
	date INT  NOT NULL,
	year INT NOT NULL,
	hours INT NOT NULL,
	minutes INT NOT NULL,
	posted TINYINT NOT NULL,
	sno BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY
);
