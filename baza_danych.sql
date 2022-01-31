/*
 Navicat Premium Data Transfer

 Source Server         : WDPAI_Baza_projektu
 Source Server Type    : PostgreSQL
 Source Server Version : 130005
 Source Host           : ec2-63-34-153-52.eu-west-1.compute.amazonaws.com:5432
 Source Catalog        : d2p6e0mav8l5dj
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 130005
 File Encoding         : 65001

 Date: 31/01/2022 13:38:28
*/


-- ----------------------------
-- Sequence structure for projects_id_project_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."projects_id_project_seq";
CREATE SEQUENCE "public"."projects_id_project_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for conection_user_project
-- ----------------------------
DROP TABLE IF EXISTS "public"."conection_user_project";
CREATE TABLE "public"."conection_user_project" (
  "id_conection" int4 NOT NULL,
  "id_user" int4 NOT NULL,
  "id_project" int4 NOT NULL,
  "id_permission" int4 NOT NULL DEFAULT 1
)
;

-- ----------------------------
-- Records of conection_user_project
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS "public"."permissions";
CREATE TABLE "public"."permissions" (
  "id_permission" int4 NOT NULL,
  "description_permision" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "edit" bool NOT NULL DEFAULT false,
  "viev" bool NOT NULL DEFAULT false
)
;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO "public"."permissions" VALUES (1, 'no_premisions', 'f', 'f');
INSERT INTO "public"."permissions" VALUES (2, 'logged_user', 'f', 't');
INSERT INTO "public"."permissions" VALUES (3, 'admin', 't', 't');

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS "public"."projects";
CREATE TABLE "public"."projects" (
  "id_project" int4 NOT NULL DEFAULT nextval('projects_id_project_seq'::regclass),
  "id_user_deflaut" int4 NOT NULL,
  "title" text COLLATE "pg_catalog"."default" NOT NULL DEFAULT 'Title'::text,
  "description" text COLLATE "pg_catalog"."default" DEFAULT 'place for description'::text,
  "likes" int4 NOT NULL DEFAULT 0,
  "dyslikes" int4 NOT NULL DEFAULT 0,
  "img" varchar(255) COLLATE "pg_catalog"."default",
  "created_at" date
)
;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO "public"."projects" VALUES (1, 1, 'Album Kwiatów', 'kwiaty z arktyki ', 5, 1, '12562602_1257871577573026_177450581_o.jpg', '2022-01-08');
INSERT INTO "public"."projects" VALUES (3, 1, 'Projekt_do bazy danych', 'jakiś tam se opis ', 12, 1, '12562602_1257871577573026_177450581_o.jpg', '2022-01-08');
INSERT INTO "public"."projects" VALUES (15, 1, 'Projekt_próbny', 'xdddddddddddddddd', 1, 1, '22375184_768012130053723_184478358_o.jpg', '2022-01-27');
INSERT INTO "public"."projects" VALUES (14, 1, 'Księżyc', 'nocą', 1, 1, '13262108_538608542994084_1951907620_o.jpg', '2022-01-15');
INSERT INTO "public"."projects" VALUES (5, 1, 'XD', 'wakcje Rzym włochy ', 12, 1, '242105717_3009732142678659_1076630043907050373_n.jpg', '2022-01-09');
INSERT INTO "public"."projects" VALUES (13, 1, 'Jakiś projekt xd ', 'description', 12, 1, 'kolokwia.jpg', '2022-01-10');
INSERT INTO "public"."projects" VALUES (12, 1, 'Jakiś projekt xd ', 'description', 12, 1, 'kolokwia.jpg', '2022-01-10');
INSERT INTO "public"."projects" VALUES (16, 1, 'Zegar ', 'zegarek na rękę ', 0, 0, '16425250_651102031744734_1351518007_n.png', '2022-01-27');
INSERT INTO "public"."projects" VALUES (17, 1, 'Zegar ', 'zegarek na rękę ', 0, 0, '16425250_651102031744734_1351518007_n.png', '2022-01-27');
INSERT INTO "public"."projects" VALUES (18, 1, 'Zegar ', 'zegarek na rękę ', 0, 0, '16425250_651102031744734_1351518007_n.png', '2022-01-28');

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS "public"."user_info";
CREATE TABLE "public"."user_info" (
  "id_user_info" int4 NOT NULL,
  "id_user" int4 NOT NULL,
  "id_permission" int4 NOT NULL DEFAULT 2
)
;

-- ----------------------------
-- Records of user_info
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id_user" int4 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "surname" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "enable" bool NOT NULL DEFAULT false
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (1, 'name_1', 'surname_1', 'email@pk.edu.pl', '1234', 'f');
INSERT INTO "public"."users" VALUES (2, 'jan', 'maria', 'gmail@gmail.com', 'admin', 'f');

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."projects_id_project_seq"
OWNED BY "public"."projects"."id_project";
SELECT setval('"public"."projects_id_project_seq"', 19, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id_user";
SELECT setval('"public"."users_id_seq"', 3, true);

-- ----------------------------
-- Primary Key structure for table conection_user_project
-- ----------------------------
ALTER TABLE "public"."conection_user_project" ADD CONSTRAINT "conection_user_project_pkey" PRIMARY KEY ("id_conection");

-- ----------------------------
-- Primary Key structure for table permissions
-- ----------------------------
ALTER TABLE "public"."permissions" ADD CONSTRAINT "permissions_pkey" PRIMARY KEY ("id_permission");

-- ----------------------------
-- Indexes structure for table projects
-- ----------------------------
CREATE UNIQUE INDEX "projects_id_project_uindex" ON "public"."projects" USING btree (
  "id_project" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table projects
-- ----------------------------
ALTER TABLE "public"."projects" ADD CONSTRAINT "projects_pk" UNIQUE ("id_project");

-- ----------------------------
-- Primary Key structure for table projects
-- ----------------------------
ALTER TABLE "public"."projects" ADD CONSTRAINT "projects_pkey" PRIMARY KEY ("id_project");

-- ----------------------------
-- Primary Key structure for table user_info
-- ----------------------------
ALTER TABLE "public"."user_info" ADD CONSTRAINT "user_info_pkey" PRIMARY KEY ("id_user_info");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pk" PRIMARY KEY ("id_user");

-- ----------------------------
-- Foreign Keys structure for table conection_user_project
-- ----------------------------
ALTER TABLE "public"."conection_user_project" ADD CONSTRAINT "ID_permission" FOREIGN KEY ("id_permission") REFERENCES "public"."permissions" ("id_permission") ON DELETE NO ACTION ON UPDATE NO ACTION;
ALTER TABLE "public"."conection_user_project" ADD CONSTRAINT "ID_project" FOREIGN KEY ("id_project") REFERENCES "public"."projects" ("id_project") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."conection_user_project" ADD CONSTRAINT "ID_user" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id_user") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table projects
-- ----------------------------
ALTER TABLE "public"."projects" ADD CONSTRAINT "ID_creator" FOREIGN KEY ("id_user_deflaut") REFERENCES "public"."users" ("id_user") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table user_info
-- ----------------------------
ALTER TABLE "public"."user_info" ADD CONSTRAINT "ID_permission" FOREIGN KEY ("id_permission") REFERENCES "public"."permissions" ("id_permission") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."user_info" ADD CONSTRAINT "ID_user" FOREIGN KEY ("id_user") REFERENCES "public"."users" ("id_user") ON DELETE CASCADE ON UPDATE CASCADE;
