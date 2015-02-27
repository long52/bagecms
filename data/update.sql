




ALTER TABLE `onlinesjtu`.`sjtu_post` ADD COLUMN `time_end` VARCHAR(100) NOT NULL COMMENT '结束时间' AFTER `content`, ADD COLUMN `time_start` VARCHAR(100) NOT NULL COMMENT '开始时间' AFTER `time_end`;