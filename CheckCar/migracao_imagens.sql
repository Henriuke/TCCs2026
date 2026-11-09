-- Migração: adiciona colunas para armazenar o nome do arquivo de imagem
-- de cada "problema" (Luzes, Pneus, Rádio, Sirene, Giroflex).
-- Rode este arquivo no phpMyAdmin (aba SQL) depois de já ter o banco
-- `checklistdeviaturas` criado.

ALTER TABLE `checklistdesaida`
  ADD COLUMN `ImagemLuzes`  VARCHAR(255) DEFAULT NULL AFTER `ProblemaNasLuzes`,
  ADD COLUMN `ImagemPneus`  VARCHAR(255) DEFAULT NULL AFTER `ProblemaNosPneus`,
  ADD COLUMN `ImagemRadio`  VARCHAR(255) DEFAULT NULL AFTER `ProblemaNoRadioComunicador`,
  ADD COLUMN `ImagemSirene` VARCHAR(255) DEFAULT NULL AFTER `ProblemaNaSirene`,
  ADD COLUMN `ImagemGiroflex` VARCHAR(255) DEFAULT NULL AFTER `ProblemaNoGiroflex`;

ALTER TABLE `checklistdeentrada`
  ADD COLUMN `ImagemLuzes2`  VARCHAR(255) DEFAULT NULL AFTER `ProblemaNasLuzes2`,
  ADD COLUMN `ImagemPneus2`  VARCHAR(255) DEFAULT NULL AFTER `ProblemaNosPneus2`,
  ADD COLUMN `ImagemRadio2`  VARCHAR(255) DEFAULT NULL AFTER `ProblemaNoRadioComunicador2`,
  ADD COLUMN `ImagemSirene2` VARCHAR(255) DEFAULT NULL AFTER `ProblemaNaSirene2`,
  ADD COLUMN `ImagemGiroflex2` VARCHAR(255) DEFAULT NULL AFTER `ProblemaNoGiroflex2`;
