




ALTER TABLE `onlinesjtu`.`sjtu_post` ADD COLUMN `time_end` VARCHAR(100) NOT NULL COMMENT '����ʱ��' AFTER `content`, ADD COLUMN `time_start` VARCHAR(100) NOT NULL COMMENT '��ʼʱ��' AFTER `time_end`;