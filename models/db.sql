-- Active: 1734576880718@@127.0.0.1@3306@portal_wisata_kafe
-- CREATE TABLE utilities(
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   logo VARCHAR(50),
--   name_web VARCHAR(75),
--   keyword TEXT,
--   description TEXT,
--   author VARCHAR(50)
-- );

-- CREATE TABLE auth(
--   id INT AUTO_INCREMENT PRIMARY KEY,
--   image VARCHAR(50),
--   bg VARCHAR(35),
--   model INT DEFAULT 2
-- );

-- CREATE TABLE user_role(
--   id_role INT AUTO_INCREMENT PRIMARY KEY,
--   role VARCHAR(35)
-- );

-- INSERT INTO
--   user_role(role)
-- VALUES
--   ('Administrator'),
--   ('Owner'),
--   ('Member');

-- CREATE TABLE user_status(
--   id_status INT AUTO_INCREMENT PRIMARY KEY,
--   status VARCHAR(35)
-- );

-- INSERT INTO
--   user_status(status)
-- VALUES
--   ('Active'),
--   ('No Active');

-- CREATE TABLE user_menu(
--   id_menu INT AUTO_INCREMENT PRIMARY KEY,
--   icon VARCHAR(50),
--   menu VARCHAR(50)
-- );

-- CREATE TABLE user_sub_menu(
--   id_sub_menu INT AUTO_INCREMENT PRIMARY KEY,
--   id_menu INT,
--   id_active INT,
--   title VARCHAR(50),
--   url VARCHAR(50),
--   FOREIGN KEY (id_menu) REFERENCES user_menu(id_menu) ON UPDATE CASCADE ON DELETE CASCADE,
--   FOREIGN KEY (id_active) REFERENCES user_status(id_active) ON UPDATE NO ACTION ON DELETE NO ACTION
-- );

-- CREATE TABLE user_access_menu(
--   id_access_menu INT AUTO_INCREMENT PRIMARY KEY,
--   id_role INT,
--   id_menu INT,
--   FOREIGN KEY (id_role) REFERENCES user_role(id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
--   FOREIGN KEY (id_menu) REFERENCES user_menu(id_menu) ON UPDATE CASCADE ON DELETE CASCADE
-- );

-- CREATE TABLE user_access_sub_menu(
--   id_access_sub_menu INT AUTO_INCREMENT PRIMARY KEY,
--   id_role INT,
--   id_sub_menu INT,
--   FOREIGN KEY (id_role) REFERENCES user_role(id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
--   FOREIGN KEY (id_sub_menu) REFERENCES user_sub_menu(id_sub_menu) ON UPDATE CASCADE ON DELETE CASCADE
-- );

CREATE TABLE tempat_kafe(
  id_tempat INT AUTO_INCREMENT PRIMARY KEY,
  nama_tempat VARCHAR(50),
  nama_jalan VARCHAR(50),
  peta_lokasi TEXT,
  kontak VARCHAR(14)
);

CREATE TABLE users(
  id_user INT AUTO_INCREMENT PRIMARY KEY,
  -- id_role INT,
  -- id_active INT,
  -- en_user VARCHAR(75),
  -- token CHAR(6),
  username VARCHAR(50), -- name
  no_telpon INT, -- added
  id_tempat INT, -- added
  -- image VARCHAR(100),
  -- email VARCHAR(75),
  -- password VARCHAR(100),
  -- created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  -- updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  -- FOREIGN KEY (id_role) REFERENCES user_role(id_role) ON UPDATE NO ACTION ON DELETE NO ACTION,
  -- FOREIGN KEY (id_active) REFERENCES user_status(id_active) ON UPDATE NO ACTION ON DELETE NO ACTION
  FOREIGN KEY (id_tempat) REFERENCES tempat_kafe(id_tempat) ON UPDATE NO ACTION ON DELETE NO ACTION -- added
);

CREATE TABLE waktu_operasional(
  id_waktu_operasional INT AUTO_INCREMENT PRIMARY KEY,
  id_tempat INT,
  hari VARCHAR(6),
  jam_buka TIME,
  jam_tutup TIME,
  FOREIGN KEY (id_tempat) REFERENCES tempat_kafe(id_tempat) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE menu(
  id_menu INT AUTO_INCREMENT PRIMARY KEY,
  id_tempat INT,
  nama_menu VARCHAR(50),
  harga INT,
  FOREIGN KEY (id_tempat) REFERENCES tempat_kafe(id_tempat) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE galeri(
  id_galeri INT AUTO_INCREMENT PRIMARY KEY,
  id_tempat INT,
  nama_file VARCHAR(225),
  FOREIGN KEY (id_tempat) REFERENCES tempat_kafe(id_tempat) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE admin(
  id_admin INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(25),
  password VARCHAR(25)
);

CREATE TABLE pesanan(
  id_pesanan INT AUTO_INCREMENT PRIMARY KEY,
  id_menu INT,
  id_tempat INT,
  total_harga INT,
  jumlah_menu INT,
  waktu_pesanan DATETIME,
  status_pesanan ENUM('Menunggu', 'Diterima', 'Ditolak'),
  FOREIGN KEY (id_menu) REFERENCES menu(id_menu) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (id_tempat) REFERENCES tempat_kafe(id_tempat) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE melakukan(
  id_melakukan INT AUTO_INCREMENT PRIMARY KEY,
  id_user INT,
  id_pesanan INT,
  FOREIGN KEY (id_user) REFERENCES users(id_user) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (id_pesanan) REFERENCES pesanan(id_pesanan) ON UPDATE CASCADE ON DELETE CASCADE
);