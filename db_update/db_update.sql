INSERT INTO `tbl_mst_prodi` (`id_prodi`, `prodi_name`) VALUES 
(0, 'Super Admin'), 
(1, 'TEKNIK INFORMATIKA'), 
(2, 'MESIN PERALATAN PERTANIAN'), 
(3, 'TEKNOLOGI HASIL PERTANIAN');

INSERT INTO `tbl_biodata` (`id_biodata`, `no_card`, `full_name`, `address`, `jk`, `id_prodi`) VALUES ('1', '00000000000000000000', 'Super Admin', 'Super Admin', '1', '0');

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `role`, `id_biodata`) VALUES ('1', 'admin', MD5('admin'), '0', '1');